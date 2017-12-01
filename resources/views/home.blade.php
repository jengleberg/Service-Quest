@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in!</p>

                    @if (Auth::user()->is_admin)
                        <p>
                            See all <a href="{{ url('admin/tasks') }}">tasks</a>
                        </p>
                    @else
                        <p>
                            See all your <a href="{{ url('tasks/user') }}">tasks</a> or <a href="{{ url('tasks/create') }}">open new task</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
