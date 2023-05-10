<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_date       = Carbon::now();
        $taskSelection      = Task::where('user_id',auth()->user()->id)->get();
        $groups             = Group::get();
        $today              = strtolower(Carbon::today()->format('l'));

        $today_tasks = Task::whereDate('start_duration', '<=', now())
                ->whereDate('end_duration', '>=', now())
                ->where('user_id', auth()->user()->id)
                ->orwhereJsonContains('frequency->days', $today)
                ->get();
    
        return view('admin.tasks.create')->with([
            'tasks'             => $today_tasks,
            'task_selection'    => $taskSelection,
            'groups'            => $groups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
       
        $data = [];

        if($request->frequency == 'weekly'){
            $data = [
                'frequency'     => $request->frequency,
                'days'          => $request->days,
                'month'         => null,
                'occurrence'    => null

            ];
        }
        else if($request->frequency == 'monthly'){
            $data = [
                'frequency'     => $request->frequency,
                'days'          => null,
                'month'         => null,
                'occurrence'    => $request->occurrence

            ];
        }
        else if($request->frequency == 'yearly'){
            $data = [
                'frequency'     => $request->frequency,
                'days'          => null,
                'month'         => $request->month,
                'occurrence'    => $request->occurrence

            ];
        }
        else{
            $data = [
                'frequency'     => $request->frequency,
                'days'          => null,
                'month'         => null,
                'occurrence'    => null

            ];
        }
        $task = Task::create([
                'name'              => $request->title,
                'user_id'           => auth()->user()->id,
                'description'       => $request->description,
                'frequency'         => json_encode($data),
                'start_duration'    => Carbon::createFromFormat('d-m-Y', $request->start_date)->format('Y-m-d'),
                'end_duration'      => Carbon::createFromFormat('d-m-Y', $request->end_date)->format('Y-m-d'),
            ]
        );
        if($task){
            return response()->json([
                'status'      => 1,
                'message'     => 'Created Successfully.']);
        }else{
            return response()->json([
                'status'      => 0,
                'message'     => 'Something went wrong.']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
    public function getTasks(Request $request){

        if($request->tab == 'today'){
            $current_date = Carbon::now();
            $today = strtolower(Carbon::today()->format('l'));
            $today_tasks = Task::whereDate('start_duration', '<=', now())
                ->whereDate('end_duration', '>=', now())
                ->where('user_id', auth()->user()->id)
                ->orwhereJsonContains('frequency->days', $today)
                ->get();

        
            return view('admin.tasks.task-card')->with([
                'tasks' => $today_tasks
            ]);
        }else if($request->tab == 'tomorrow'){
            $tomorrow = Carbon::now()->addDay();

            $tomorrowDay = $tomorrow->dayName;
            $day = $tomorrow->format('j');

            $tomorrow_tasks = Task::where(function ($query) use ($tomorrowDay) {
                $query->whereJsonContains('frequency->days', $tomorrowDay);
            })
            ->where('user_id', auth()->user()->id)
            ->orWhere(function ($query) use ($tomorrow) {
                $query->whereDate('start_duration', '<=', $tomorrow)
                      ->whereDate('end_duration', '>=', $tomorrow)
                      ->whereJsonContains('frequency', ['occurrence' => null]);
                      
            })
            ->orWhereJsonContains('frequency', ['occurrence' => $day])
            ->get();



            return view('admin.tasks.task-card')->with([
                'tasks' => $tomorrow_tasks
            ]);

        }else if($request->tab == 'nextweek'){
            // Set the start of next week
            $startNextWeek = Carbon::now()->addDays(2)->startOfWeek();

            // Set the end of next week
            $endNextWeek = Carbon::parse($startNextWeek)->addDays(6)->endOfDay();

            $nextweek = Task::where('user_id', auth()->user()->id)
            ->where(function($query) use($startNextWeek, $endNextWeek) {
                $query->whereBetween('start_duration', [Carbon::parse($startNextWeek)->subDays(2), Carbon::parse($endNextWeek)->subDays(2)])
                    ->orWhereBetween('end_duration', [Carbon::parse($startNextWeek)->subDays(2), Carbon::parse($endNextWeek)->subDays(2)])
                    ->orWhere(function($query) use($startNextWeek,$endNextWeek) {
                        $query->where('start_duration', '<', Carbon::parse($startNextWeek)->subDays(2))
                              ->where('end_duration', '>', Carbon::parse($endNextWeek)->subDays(2));
                    });
            })
            ->get();
            
            return view('admin.tasks.task-card')->with([
                'tasks' => $nextweek
            ]);
        }else if($request->tab == 'nearfuture'){
            // near future means get record next week but current of this month
            $now = Carbon::now();
            $nextWeek = $now->copy()->addWeek();
            $endOfMonth = Carbon::now()->endOfMonth();
            $dayName = $nextWeek->dayName;
            $dayDate = $nextWeek->format('j');

            
            $nearFuture = Task::where('user_id', auth()->user()->id)
            ->where(function ($query) use ($nextWeek, $endOfMonth) {
                $query->whereBetween('start_duration', [$nextWeek, $endOfMonth])
                      ->orWhereBetween('end_duration', [$nextWeek, $endOfMonth])
                      ->orWhere(function ($query) use ($nextWeek, $endOfMonth) {
                          $query->where('start_duration', '<', $nextWeek)
                                ->where('end_duration', '>', $endOfMonth);
                      });
            })
            ->orWhere(function ($query) use ($dayName) {
                $query->whereJsonContains('frequency->days', $dayName);
            })
            ->orWhere(function ($query) use ($dayDate) {
                $query->whereJsonContains('frequency', ['frequency' => 'monthly']);
                $query->whereJsonContains('frequency', ['occurrence' => $dayDate]);
            })
            ->get();
            return view('admin.tasks.task-card')->with([
                'tasks' => $nearFuture
            ]);

        }else if($request->tab == 'future'){
            
            $nextMonth = Carbon::now()->addMonth();
            $endOfMonth = $nextMonth->endOfMonth();
            $dayName = strtolower(Carbon::now()->format('l'));
            $dayDate = Carbon::now()->format('j');
            $currentMonthName = strtolower(Carbon::now()->monthName);
            $future = Task::where('user_id', auth()->user()->id)
            ->where(function ($query) use ($nextMonth, $endOfMonth) {
                $query->whereBetween('start_duration', [$nextMonth, $endOfMonth])
                      ->orWhereBetween('end_duration', [$nextMonth, $endOfMonth])
                      ->orWhere(function ($query) use ($nextMonth, $endOfMonth) {
                          $query->where('start_duration', '<', $nextMonth)
                                ->where('end_duration', '>', $endOfMonth);
                      });
            })
            ->orWhere(function ($query) use ($dayName) {
                $query->whereJsonContains('frequency', ['frequency' => 'daily'])
                    ->whereJsonContains('frequency->days', $dayName);
            })
            ->orWhere(function ($query) use ($dayDate) {
                $query->whereJsonContains('frequency', ['frequency' => 'monthly']);
                $query->whereJsonContains('frequency', ['occurrence' => $dayDate]);
            })
            ->orWhere(function ($query) use ($dayDate,$currentMonthName) {
                $query->whereJsonContains('frequency', ['frequency' => 'yearly'])
                    ->whereJsonContains('frequency', ['month' => $currentMonthName])
                    ->whereJsonContains('frequency', ['occurrence' => $dayDate]);
            })
            ->get();
            return view('admin.tasks.task-card')->with([
                'tasks' => $future
            ]);
        }
        else{
            return view('admin.tasks.task-card')->with([
                'tasks' => []
            ]);
        }
   
    }
    public function status(Request $request){
        $task_id = $request->task_id;
        $task = Task::find($task_id);
        if($task){
            if($task->status == 'Pending'){
                $task->update([
                    'status' => "Completed"
                ]);
            }else{
                $task->update([
                    'status' => "Pending"
                ]);
            }

            return response()->json([
                'status'      => 1,
                'message'     => 'Status update Successfully.'
            ]);
        }
        return response()->json([
            'status'      => 0,
            'message'     => 'Something went wrong.']);
    }
}
