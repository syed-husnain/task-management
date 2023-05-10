@forelse($tasks as $task)
<div class="col-md-4">
    <div class="box box-warning direct-chat direct-chat-warning">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $task->name }}</h3><br>
            <span class="badge badge-success">{{$task->status}}</span>
        </div>
        <div class="box-body">
            <div class="direct-chat-messages">
                <div class="msg_history">
                    <p> {{ $task->description }} </p>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="javascript:void(0)" data-task_id="{{$task->id}}" class="btn btn-primary mark-button">Mark as Complete</a>
        </div>
    </div>
</div>
@empty
<h3>No Record Found</h3>
@endforelse