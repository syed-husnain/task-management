@extends('layouts.admin')
@section('styles')
<link href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />

<style>
    .box {
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }

    .box.box-warning {
        border-top-color: #f39c12;
    }

    .box.collapsed-box .box-body, .box.collapsed-box .box-footer {
        display: none;
    }
    .box .nav-stacked>li {
        border-bottom: 1px solid #f4f4f4;
        margin: 0;
    }
    .box .nav-stacked>li:last-of-type {
        border-bottom: none;
    }
    .box.height-control .box-body {
        max-height: 300px;
        overflow: auto;
    }
    .box .border-right {
        border-right: 1px solid #f4f4f4;
    }
    .box .border-left {
        border-left: 1px solid #f4f4f4;
    }
    .box.box-solid {
        border-top: 0;
    }

    .box.box-solid>.box-header .btn:hover, .box.box-solid>.box-header a:hover {
        background: rgba(0, 0, 0, 0.1);
    }


    .box.box-solid.box-warning {
        border: 1px solid #f39c12;
    }
    .box.box-solid.box-warning .box-header {
        color: #fff;
        background: #f39c12;
        background-color: #f39c12;
    }
    .box.box-solid.box-warning .box-header a, .box.box-solid.box-warning .box-header .btn {
        color: #fff;
    }


    .box.box-solid .box-header .box-tools .btn {
        border: 0;
        box-shadow: none;
    }
    .box.box-solid[class*='bg'] .box-header {
        color: #fff;
    }
    .box .box-group .box {
        margin-bottom: 5px;
    }
    .box .knob-label {
        text-align: center;
        color: #333;
        font-weight: 100;
        font-size: 12px;
        margin-bottom: 0.3em;
    }
    .box>.overlay, .overlay-wrapper .overlay, .box .loading-img, .overlay-wrapper .loading-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%}
    .box .overlay, .overlay-wrapper .overlay {
        z-index: 50;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 3px;
    }
    .box .overlay .fa, .overlay-wrapper .overlay .fa {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -15px;
        margin-top: -15px;
        color: #000;
        font-size: 30px;
    }
    .box .overlay.dark, .overlay-wrapper .overlay.dark {
        background: rgba(0, 0, 0, 0.5);
    }
    .box-header:before, .box-body:before, .box-footer:before, .box-header:after, .box-body:after, .box-footer:after {
        content: " ";
        display: table;
    }
    .box-header:after, .box-body:after, .box-footer:after {
        clear: both;
    }
    .box-header {
        color: #444;
        display: block;
        padding: 10px;
        position: relative;
    }
    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4;
    }
    .collapsed-box .box-header.with-border {
        border-bottom: none;
    }
    .box-header .fa, .box-header.glyphicon, .box-header.ion, .box-header .box-title {
        display: inline-block;
        font-size: 18px;
        margin: 0;
        line-height: 1;
    }
    .box-header.fa, .box-header.glyphicon, .box-header.ion {
        margin-right: 5px;
    }
    .box-header.box-tools {
        position: absolute;
        right: 10px;
        top: 5px;
    }
    .box-header.box-tools [data-toggle="tooltip"] {
        position: relative;
    }
    .box-header.box-tools.pull-right .dropdown-menu {
        right: 0;
        left: auto;
    }
    .btn-box-tool {
        padding: 5px;
        font-size: 12px;
        background: transparent;
        color: #97a0b3;
    }
    .open .btn-box-tool, .btn-box-tool:hover {
        color: #606c84;
    }
    .btn-box-tool.btn:active {
        box-shadow: none;
    }
    .box-body {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        padding: 10px;
    }
    .no-header .box-body {
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    .box-body.table {
        margin-bottom: 0;
    }
    .box-body .fc {
        margin-top: 5px;
    }
    .box-body .full-width-chart {
        margin: -19px;
    }
    .box-body.no-padding .full-width-chart {
        margin: -9px;
    }
    .box-body .box-pane {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 3px;
    }
    .box-body .box-pane-right {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 0;
    }
    .box-footer {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-top: 1px solid #f4f4f4;
        padding: 10px;
        background-color: #fff;
    }
    .direct-chat .box-body {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        position: relative;
        overflow-x: hidden;
        padding: 0;
    }
    .direct-chat.chat-pane-open .direct-chat-contacts {
        -webkit-transform: translate(0,  0);
        -ms-transform: translate(0,  0);
        -o-transform: translate(0,  0);
        transform: translate(0,  0);
    }
    .direct-chat-messages {
        -webkit-transform: translate(0,  0);
        -ms-transform: translate(0,  0);
        -o-transform: translate(0,  0);
        transform: translate(0,  0);
        padding: 10px;
        height: 250px;
        overflow: auto;
    }
    .direct-chat-msg, .direct-chat-text {
        display: block;
    }
    .direct-chat-msg {
        margin-bottom: 10px;
    }
    .direct-chat-msg:before, .direct-chat-msg:after {
        content: " ";
        display: table;
    }
    .direct-chat-msg:after {
        clear: both;
    }
    .direct-chat-messages, .direct-chat-contacts {
        -webkit-transition: -webkit-transform .5s ease-in-out;
        -moz-transition: -moz-transform .5s ease-in-out;
        -o-transition: -o-transform .5s ease-in-out;
        transition: transform .5s ease-in-out;
    }
    .direct-chat-text {
        border-radius: 5px;
        position: relative;
        padding: 5px 10px;
        background: #d2d6de;
        border: 1px solid #d2d6de;
        margin: 5px 0 0 50px;
        color: #444;
    }
    .direct-chat-text:after, .direct-chat-text:before {
        position: absolute;
        right: 100%;
        top: 15px;
        border: solid transparent;
        border-right-color: #d2d6de;
        content: ' ';
        height: 0;
        width: 0;
        pointer-events: none;
    }
    .direct-chat-text:after {
        border-width: 5px;
        margin-top: -5px;
    }
    .direct-chat-text:before {
        border-width: 6px;
        margin-top: -6px;
    }
    .right .direct-chat-text {
        margin-right: 50px;
        margin-left: 0;
    }
    .right .direct-chat-text:after, .right .direct-chat-text:before {
        right: auto;
        left: 100%;
        border-right-color: transparent;
        border-left-color: #d2d6de;
    }
    .direct-chat-img {
        border-radius: 50%;
        float: left;
        width: 40px;
        height: 40px;
    }
    .right .direct-chat-img {
        float: right;
    }
    .direct-chat-info {
        display: block;
        margin-bottom: 2px;
        font-size: 12px;
    }
    .direct-chat-name {
        font-weight: 600;
    }
    .direct-chat-timestamp {
        color: #999;
    }
    .direct-chat-contacts-open .direct-chat-contacts {
        -webkit-transform: translate(0,  0);
        -ms-transform: translate(0,  0);
        -o-transform: translate(0,  0);
        transform: translate(0,  0);
    }
    .direct-chat-contacts {
        -webkit-transform: translate(101%,  0);
        -ms-transform: translate(101%,  0);
        -o-transform: translate(101%,  0);
        transform: translate(101%,  0);
        position: absolute;
        top: 0;
        bottom: 0;
        height: 250px;
        width: 100%;
        background: #222d32;
        color: #fff;
        overflow: auto;
    }
    .contacts-list li {
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        padding: 10px;
        margin: 0;
    }
    .contacts-list li:before, .contacts-list li:after {
        content: " ";
        display: table;
    }
    .contacts-list li:after {
        clear: both;
    }
    .contacts-list li:last-of-type {
        border-bottom: none;
    }
    .contacts-list-img {
        border-radius: 50%;
        width: 40px;
        float: left;
    }
    .contacts-list-info {
        margin-left: 45px;
        color: #fff;
    }
    .contacts-list-name, .contacts-list-status {
        display: block;
    }
    .contacts-list-name {
        font-weight: 600;
    }
    .contacts-list-status {
        font-size: 12px;
    }
    .contacts-list-date {
        color: #aaa;
        font-weight: normal;
    }
    .contacts-list-msg {
        color: #999;
    }
    .direct-chat-warning .right .direct-chat-text {
        background: #f39c12;
        border-color: #f39c12;
        color: #fff;
    }
    .direct-chat-warning .right .direct-chat-text:after, .direct-chat-warning .right .direct-chat-text:before {
        border-left-color: #f39c12;
    }
    .pull-right {
        float: right;
    }

    .direct-chat-msg.right .chat_text { width: 60%; float: right; }
    .direct-chat-msg.left .chat_text { width: 60%; float: left; }
</style>
@endsection
@section('content')


    <div class="row pt-10">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#taskModal">
                Add New Task
              </button>
            <button type="button" class="btn btn-primary pull-right mr-10" data-toggle="modal" data-target="#taskgroupModal">
                Add Group Task
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 pt-20">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs" id="taskgroup" role="taskgrouplist">
                        <li class="nav-item active">
                          <a class="nav-link" id="alltask-tab" data-toggle="tab" data-tab="alltask" href="#alltask" role="tab" aria-controls="alltask" aria-selected="false" aria-expanded="true">All Task</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="grouptask-tab" data-toggle="tab" data-tab="grouptask" href="#grouptask" role="tab" aria-controls="grouptask" aria-selected="false">Group Task</a>
                        </li>
                      </ul>
                </div>
                <div class="tab-content" id="mygroupTabContent">
                    <div class="tab-pane fade active in" id="alltask" role="tabpanel" aria-labelledby="alltask-tab">
                        <div class="panel-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item active">
                                <a class="nav-link list" id="today-tab" data-toggle="tab" data-tab="today" href="#today" role="tab" aria-controls="today" aria-selected="false" aria-expanded="true">Today</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link list" id="tomorrow-tab" data-toggle="tab" data-tab="tomorrow" href="#tomorrow" role="tab" aria-controls="tomorrow" aria-selected="false">Tomorrow</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link list" id="nextweek-tab" data-toggle="tab" data-tab="nextweek" href="#nextweek" role="tab" aria-controls="nextweek" aria-selected="false">Next Week</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link list" id="nearfuture-tab" data-toggle="tab" data-tab="nearfuture" href="#nearfuture" role="tab" aria-controls="nearfuture" aria-selected="false">Near Future</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link list" id="future-tab" data-toggle="tab" data-tab="future" href="#future" role="tab" aria-controls="future" aria-selected="false">Future</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active in" id="today" role="tabpanel" aria-labelledby="today-tab">
                                
                                    <div class="row bootstrap snippets mt-20" id="task_card">
                                        @include('admin.tasks.task-card')
                                    </div>
                                    
                                </div>
                            
                            </div>
        
        
                        </div>
                    </div>
                    <div class="tab-pane fade" id="grouptask" role="tabpanel" aria-labelledby="grouptask-tab">
                        <div class="panel-body">
                            <ul class="nav nav-tabs" id="mygroupTab" role="tablist">
                                <li class="nav-item active">
                                <a class="nav-link grouplist" id="todaygroup-tab" data-toggle="tab" data-tab="todaygroup" href="#todaygroup" role="tab" aria-controls="todaygroup" aria-selected="false" aria-expanded="true">Today</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link grouplist" id="tomorrowgroup-tab" data-toggle="tab" data-tab="tomorrowgroup" href="#tomorrowgroup" role="tab" aria-controls="tomorrowgroup" aria-selected="false">Tomorrow</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link grouplist" id="nextweekgroup-tab" data-toggle="tab" data-tab="nextweekgroup" href="#nextweekgroup" role="tab" aria-controls="nextweekgroup" aria-selected="false">Next Week</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link grouplist" id="nearfuturegroup-tab" data-toggle="tab" data-tab="nearfuturegroup" href="#nearfuturegroup" role="tab" aria-controls="nearfuturegroup" aria-selected="false">Near Future</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link grouplist" id="futuregroup-tab" data-toggle="tab" data-tab="futuregroup" href="#futuregroup" role="tab" aria-controls="futuregroup" aria-selected="false">Future</a>
                                </li>
                        
                            </ul>
                            <div class="tab-content" id="mygrouptaskTabContent">
                                <div class="tab-pane fade active in" id="todaygroup" role="tabpanel" aria-labelledby="todaygroup-tab">
                                
                                    <div class="row bootstrap snippets mt-20" id="taskgroup_card">
                                        @include('admin.tasks.group-task-card')
                                    </div>
                                    
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="" method="post" id="task_form">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="frequency">Frequency</label>
                            <select name="frequency" id="frequency" class="form-control">
                                <option value="">Select Option</option>
                                <option value="daily">Every day</option>
                                <option value="weekly">Every week</option>
                                <option value="monthly">Every month</option>
                                <option value="yearly">Every year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="days_div" style="display: none;">
                        <label>Days <span class="required-star">*</span></label>
                        <select name="days[]" id="days" multiple data-live-search="true" class="selectpicker form-control">
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                        <span class="errors" data-id="days"></span>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6" id="month_div" style="display: none;">
                        <div class="form-group">
                            <label for="month">Month</label>
                            <select name="month" id="month" class="form-control">
                                <option value="">Select Option</option>
                                <option value="january">January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6" id="occurrence_div" style="display: none;">
                        <div class="form-group">
                            <label for="occurrence">Occurrence (Date)</label>
                            <input type="number" min="1" max="31" name="occurrence" id="occurrence" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Start Duration</label>
                            <div class="input-group date previous">
                                
                                <span class="input-group-addon">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                                <input class="form-control" type="text" name="start_date" id="start_date"
                                value="" placeholder="Enter Start Duration"  />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>End Duration</label>
                            <div class="input-group date previous">
                                
                                <span class="input-group-addon">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                                <input class="form-control" type="text" name="end_date" id="end_date" value="" placeholder="Enter End Duration"  />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea  name="description" id="description" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<div class="modal fade" id="taskgroupModal" tabindex="-1" role="dialog" aria-labelledby="taskgroupModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Group Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="" method="post" id="grouptask_form">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="group_id">Group</label>
                            <select name="group_id" id="group_id" class="form-control">
                                <option value="">Select Option</option>
                                @foreach ($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="pull-right mr-10" data-toggle="modal" data-target="#groupModal">
                            Add New
                        </span>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="task_id">Task</label>
                            <select name="task_id" id="task_id" class="form-control">
                                <option value="">Select Option</option>
                                @foreach ($task_selection as $task)
                                    <option value="{{$task->id}}">{{$task->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" id="grouptask_submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="groupModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Group Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="" method="post" id="group_form">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="title">Description</label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="group_submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script>
    $(document).ready(() => {
        const submitBtn = $('form button[type="submit"]');
            $('#submit').click(function() {
                $('#task_form').submit();
                return false;

            });

        $('#task_form').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "{{route('tasks.store')}}",
                    type: "POST",
                    dataType: "json",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                success: function (res) {
                    if(res.status){
                        Swal.fire({
                                icon: 'success',
                                title: 'Created Successfully',
                                confirmButtonText: 'Ok',
                            }).then((result) => {
                                
                                if (result.isConfirmed) {
                                    $("#task_form")[0].reset();
                                    $('span.text-danger').remove();
                                    hideDivs();
                                    $('#days').selectedIndex = -1;
                                    $('#taskModal').modal('hide');

                                }
                        })
                    }
                        
                },
                error: function(response) {
                    $("#submit").prop("disabled", false);
                    errorsGet(response.responseJSON.errors);
                }
            });
        });
    });
    function errorsGet(errors) {
    $('span.text-danger').remove();
        for (x in errors) {

            var formGroup = $('.errors[data-id="' + x + '"],input[name="' + x + '"],select[name="' + x + '"],textarea[name="' + x + '"]').parent();
        
            for (item in errors[x]) {
                formGroup.append(' <span class="text-danger d-block" role="alert"><strong>' + errors[x][item] + '</strong></span>');
            }
        }
    }
</script>
<script>
    $(document).ready(function() {
      $('#frequency').change(function() {
        hideDivs();
        if ($(this).val() == 'weekly') {
          $('#days_div').show();
        }else if($(this).val() == 'monthly'){
            
            $('#occurrence_div').show();
        }
        else if($(this).val() == 'yearly'){
            $('#month_div').show();
            $('#occurrence_div').show();
        }
         else {
            hideDivs();
        }
      });

    });
    function hideDivs(){
        $('#days_div').hide();
        $('#month_div').hide();
        $('#occurrence_div').hide();
    }
  </script>
  <script>
    $(document).ready(function() {
      // Listen for click events on the tab links
      $('.nav-link.list').click(function() {
            // Activate the corresponding tab panel
            $($(this).attr('href')).tab('show');
            const elementTaskCard  = document.querySelector('#task_card');
            let parentAttr = elementTaskCard.parentElement;
            parentAttr.setAttribute('id', $(this).data("tab"));
            parentAttr.setAttribute('aria-labelledby', $(this).data("tab")+'-'+'tab');
           
            $.ajax({
                method: "post",
                url: "{{route('tasks.get-tasks')}}",
                data: {
                    _token: '{{ csrf_token() }}',
                    tab: $(this).data("tab")
                   
                },
                success: function (res) {
                    elementTaskCard.innerHTML = res;
                }
            });
      });
    });
    </script>
  <script>
   $(document).ready(function() {
     
        $('.mark-button').on('click', function() {
           
            var taskId = $(this).data('task_id');
            $.ajax({
                url: "{{route('tasks.status')}}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_id: taskId
                   
                },
                success: function(res) {
                
                    if(res.status){
                        Swal.fire({
                                icon: 'success',
                                title: 'Status update Successfully',
                                confirmButtonText: 'Ok',
                            }).then((result) => {
                                
                                if ($('.nav-item').hasClass('active')) {
                                    const elementTaskCard  = document.querySelector('#task_card');
                                    var activeTab = $('.nav-item.active a').data('tab');
                                    $.ajax({
                                        method: "post",
                                        url: "{{route('tasks.get-tasks')}}",
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            tab: activeTab
                                        
                                        },
                                        success: function (res) {
                                            elementTaskCard.innerHTML = res;
                                        }
                                    });
                                    
                                }
                                
                        })
                    }
                },
                error: function(response) {
                 
                }
            });
        });
    });

    </script>
    {{-- Add Group Script Section --}}
    <script>
        $(document).ready(() => {
            const submitBtn = $('form button[type="submit"]');
                $('#group_submit').click(function() {
                    $('#group_form').submit();
                    return false;
    
                });
    
            $('#group_form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{route('groups.store')}}",
                        type: "POST",
                        dataType: "json",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                    success: function (res) {
                        if(res.status){
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Created Successfully',
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    
                                    if (result.isConfirmed) {
                                        $("#group_form")[0].reset();
                                        $('span.text-danger').remove();
                                      
                                        $('#groupModal').modal('hide');
                                        location.reload();
    
                                    }
                            })
                        }
                            
                    },
                    error: function(response) {
                        $("#submit").prop("disabled", false);
                        errorsGet(response.responseJSON.errors);
                    }
                });
            });
        });
    
    </script>
    <script>
        $(document).ready(() => {
            const submitBtn = $('form button[type="submit"]');
                $('#grouptask_submit').click(function() {
                    $('#grouptask_form').submit();
                    return false;
    
                });
    
            $('#grouptask_form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{route('group_tasks.store')}}",
                        type: "POST",
                        dataType: "json",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                    success: function (res) {
                        if(res.status){
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Task Added in group Successfully',
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    
                                    if (result.isConfirmed) {
                                        $("#grouptask_form")[0].reset();
                                        $('span.text-danger').remove();
                                      
                                        $('#taskgroupModal').modal('hide');
                                        location.reload();
    
                                    }
                            })
                        }
                            
                    },
                    error: function(response) {
                        $("#grouptask_submit").prop("disabled", false);
                        errorsGet(response.responseJSON.errors);
                    }
                });
            });
        });
    
    </script>
<script>
    $(document).ready(function() {
        // Listen for click events on the tab links
        $('.nav-link.grouplist').click(function() {
            // Activate the corresponding tab panel
            $($(this).attr('href')).tab('show');
            const elementTaskCard  = document.querySelector('#taskgroup_card');
            let parentAttr = elementTaskCard.parentElement;
            parentAttr.setAttribute('id', $(this).data("tab"));
            parentAttr.setAttribute('aria-labelledby', $(this).data("tab")+'group-'+'tab');
            
            $.ajax({
                method: "post",
                url: "{{route('group_tasks.get-group-tasks')}}",
                data: {
                    _token: '{{ csrf_token() }}',
                    tab: $(this).data("tab")
                    
                },
                success: function (res) {
                    elementTaskCard.innerHTML = res;
                }
            });
        });
    });
</script>
@endsection
