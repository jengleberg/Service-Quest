@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-task"> Tasks</i>
                </div>

                <div class="panel-body">
                    @if ($tasks->isEmpty())
                        <p>There are currently no tasks.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                    <th style="text-align:center" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>
                                    @foreach ($categories as $category)
                                        @if ($category->id === $task->category_id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('tasks/'. $task->task_id) }}">
                                            #{{ $task->task_id }} - {{ $task->title }}
                                        </a>
                                    </td>
                                    <td>
                                    @if ($task->status === 'Open')
                                        <span class="label label-success">{{ $task->status }}</span>
                                    @else
                                        <span class="label label-danger">{{ $task->status }}</span>
                                    @endif
                                    </td>
                                    <td>{{ $task->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('tasks/' . $task->task_id) }}" class="btn btn-primary">Comment</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('admin/close_task/' . $task->task_id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger">Close</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tasks->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection