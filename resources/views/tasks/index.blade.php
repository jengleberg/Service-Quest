@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')

<!-- Styles -->
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #6e7bb2;">
                    <i class="fa fa-task">Your Task List</i>
                </div>

                <div class="panel-body">
                    @if ($tasks->isEmpty())
                        <p>There are currently no tasks.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Task Name</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Last Updated</th>
                                    <th>Opened On</th>
                                    <th style="text-align:center" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>
                                        {{ $task->title }}
                                        {{-- <a href="{{ url('tasks/'. $task->task_id) }}"> --}}
                                            
                                        </a>
                                    </td>
                                    <td>
                                    @foreach ($categories as $category)
                                        @if ($category->id === $task->category_id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                    @foreach ($locations as $location)
                                        @if ($location->id === $task->location_id)
                                            {{ $location->name }}
                                        @endif
                                    @endforeach

                                    </td>
                                    <td>
                                    @if ($task->status === 'Open')
                                        <span class="label label-success">{{ $task->status }}</span>
                                    @else
                                        <span class="label label-danger">{{ $task->status }}</span>
                                    @endif
                                    </td>
                                    <td>{{ $task->priority }}</td>
                                    <td>{{ $task->updated_at->diffForHumans() }}</td>
                                    <td>{{ $task->created_at->toDayDateTimeString() }}</td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <td>
                                        <a href="{{ url('tasks/' . $task->task_id) }}" class="btn btn-info">View / Update Task</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('admin/close_task/' . $task->task_id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger">Close Task</button>
                                        </form>
                                    </td>
                                    </div>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                           
                        {{ $tasks->links() }}

                    @endif
                    <form>
                        <a href="{{ url('tasks/create') }}" class="btn btn-success btn-lg btn-block">Create New Task</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection