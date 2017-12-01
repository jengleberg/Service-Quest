@extends('layouts.app')

@section('title', 'My tasks')

@section('content')
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
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
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