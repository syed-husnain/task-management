<?php

namespace App\Http\Controllers;

use App\Models\GroupTask;
use App\Http\Requests\StoreGroupTaskRequest;
use App\Http\Requests\UpdateGroupTaskRequest;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task;

class GroupTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupTaskRequest $request)
    {
        GroupTask::create([
            'group_id'  => $request->group_id,
            'task_id'   => $request->task_id
        ]);
        return response()->json([
            'status'      => 1,
            'message'     => 'Created Successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupTask  $groupTask
     * @return \Illuminate\Http\Response
     */
    public function show(GroupTask $groupTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupTask  $groupTask
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupTask $groupTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupTaskRequest  $request
     * @param  \App\Models\GroupTask  $groupTask
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupTaskRequest $request, GroupTask $groupTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupTask  $groupTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupTask $groupTask)
    {
        //
    }
    public function getGroupTasks(Request $request){

        if($request->tab == 'todaygroup'){
            $current_date = Carbon::now();
            $today = strtolower(Carbon::today()->format('l'));
            $today_tasks = Group::with('tasks')
            ->whereHas('tasks', function ($query) use ($today) {
                $query->whereDate('start_duration', '<=', now())
                ->whereDate('end_duration', '>=', now())
                ->where('user_id', auth()->user()->id)
                ->orwhereJsonContains('frequency->days', $today);
            })->get();
            return view('admin.tasks.group-task-card')->with([
                'groups' => $today_tasks
            ]);
        }else if($request->tab == 'tomorrowgroup'){
            $tomorrow = Carbon::now()->addDay();

            $tomorrowDay = $tomorrow->dayName;
            $day = $tomorrow->format('j');

            $tomorrow_tasks = Group::with('tasks')
            ->whereHas('tasks', function ($query) use ($tomorrowDay,$tomorrow,$day) {
               
                    $query->whereJsonContains('frequency->days', $tomorrowDay)
                        ->where('user_id', auth()->user()->id)
                        ->orWhere(function ($query) use ($tomorrow) {
                            $query->whereDate('start_duration', '<=', $tomorrow)
                                ->whereDate('end_duration', '>=', $tomorrow)
                                ->whereJsonContains('frequency', ['occurrence' => null]);
                                
                        })
                        ->orWhereJsonContains('frequency', ['occurrence' => $day]);
            })
            ->get();



            return view('admin.tasks.group-task-card')->with([
                'groups' => $tomorrow_tasks
            ]);

        }else if($request->tab == 'nextweekgroup'){
            // Set the start of next week
            $startNextWeek = Carbon::now()->addDays(2)->startOfWeek();

            // Set the end of next week
            $endNextWeek = Carbon::parse($startNextWeek)->addDays(6)->endOfDay();

            $nextweek = Group::with('tasks')
            ->whereHas('tasks',function($query) use($startNextWeek, $endNextWeek) {
                $query->where('user_id', auth()->user()->id)
                ->whereBetween('start_duration', [Carbon::parse($startNextWeek)->subDays(2), Carbon::parse($endNextWeek)->subDays(2)])
                    ->orWhereBetween('end_duration', [Carbon::parse($startNextWeek)->subDays(2), Carbon::parse($endNextWeek)->subDays(2)])
                    ->orWhere(function($query) use($startNextWeek,$endNextWeek) {
                        $query->where('start_duration', '<', Carbon::parse($startNextWeek)->subDays(2))
                              ->where('end_duration', '>', Carbon::parse($endNextWeek)->subDays(2));
                    });
            })
            ->get();
            
            return view('admin.tasks.group-task-card')->with([
                'groups' => $nextweek
            ]);
        }else if($request->tab == 'nearfuturegroup'){
            // near future means get record next week but current of this month
            $now = Carbon::now();
            $nextWeek = $now->copy()->addWeek();
            $endOfMonth = Carbon::now()->endOfMonth();
            $dayName = $nextWeek->dayName;
            $dayDate = $nextWeek->format('j');

            
            $nearFuture = Group::with('tasks')
            ->whereHas('tasks',function ($query) use ($nextWeek, $endOfMonth,$dayName,$dayDate) {

                $query->where(function ($query) use ($nextWeek, $endOfMonth) {
                    $query->where('user_id', auth()->user()->id)
                    ->whereBetween('start_duration', [$nextWeek, $endOfMonth])
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
                });
            })
            ->get();
            return view('admin.tasks.group-task-card')->with([
                'groups' => $nearFuture
            ]);

        }else if($request->tab == 'future'){
            
            $nextMonth = Carbon::now()->addMonth();
            $endOfMonth = $nextMonth->endOfMonth();
            $dayName = strtolower(Carbon::now()->format('l'));
            $dayDate = Carbon::now()->format('j');
            $currentMonthName = strtolower(Carbon::now()->monthName);

            $future = Group::with('tasks')
            ->whereHas('tasks',function ($query) use ($nextMonth, $endOfMonth,$dayName,$dayDate,$currentMonthName) {
                $query->where('user_id', auth()->user()->id)
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
                });
            })
            ->get();
            return view('admin.tasks.group-task-card')->with([
                'groups' => $future
            ]);
        }
        else{
            return view('admin.tasks.group-task-card')->with([
                'groups' => []
            ]);
        }
   
    }
}
