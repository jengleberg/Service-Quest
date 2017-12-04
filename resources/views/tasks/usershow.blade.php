@extends('layouts.app')

@section('title', 'My tasks')

@section('content')
<!-- Styles -->
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-task"> My tasks</i>
                </div>

                <div class="panel-body">
                    @if ($tasks->isEmpty())
                        <p>You have not created any tasks.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Task Name</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                    <th>Opened On</th>
                                    <th style="text-align:center" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>
                                        <a href="{{ url('tasks/'. $task->task_id) }}">
                                            {{ $task->title }}
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
                                    <td>{{ $task->updated_at->diffForHumans() }}</td>
                                    <td>{{ $task->created_at->toDayDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ url('tasks/' . $task->task_id) }}" class="btn btn-primary">Add Note</a>
                                    </td>
                                    <td>
                                    <form action="{{ url('close_task/' . $task->task_id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-danger">Close Task</button>
                                    </form>
                                </td>
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