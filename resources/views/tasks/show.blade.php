@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" >
                <div class="panel-heading" style="background-color: #6e7bb2;">
                   <h1>{{ $task->title }}</h1> 
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <div class="task-info">
                        <span><h4>{{ $task->message }}</h4>
                        <p></p></span>
                        
                        
                        <h4></h4>
                        <p>Category:     {{ $category->name }}</p>
                        
                        <p>Location:    {{ $location->name }}</p>
                        <p>
                        @if ($task->status === 'Open')
                            Status:  <span class="label label-success">{{ $task->status }}</span>
                        @else
                            Status:  <span class="label label-danger">{{ $task->status }}</span>
                        @endif
                        </p>
                        <p>Opened on: {{ $task->created_at->toDayDateTimeString() }}</p>
                        <p>Last Update: {{ $task->updated_at->diffForHumans() }}</p>
                    </div>

                    <hr>

                    <div class="comments">
                        @foreach ($comments as $comment)
                            <div class="panel panel-@if($task->user->id === $comment->user_id) {{"default"}}@else{{"success"}}@endif">
                                <div class="panel panel-heading">
                                   Note added by:  {{ $comment->user->name }}
                                    <span class="pull-right">{{ $comment->created_at->toDateTimeString() }}</span>
                                </div>

                                <div class="panel panel-body">
                                    {{ $comment->comment }}     
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="comment-form">
                        <form action="{{ url('comment') }}" method="POST" class="form">
                            {!! csrf_field() !!}

                            <input type="hidden" name="task_id" value="{{ $task->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Note</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection