@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">


<div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          
          <div class="jumbotron" style="background-color: #6e7bb2; color: #FFFFFF">
            <h2>Welcome to Service Quest, {{ Auth::user()->name }}.</h2>
            <p>This is your dashboard.  The Service Quest Dashboard is the launching point for creating new tasks, updating existing tasks and closing tasks.</p>
          </div>
          <div class="row">
            {{-- <div class="col-6 col-lg-4">
              <h2>Heading</h2> --}}
              
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            @if (Auth::user()->is_admin)
            <a href="{{ url('admin/tasks') }}" class="list-group-item list-group-item-action list-group-item-info">View All Open Tasks</a>
            @else
            <a href="{{ url('tasks/user') }}" class="list-group-item list-group-item-action list-group-item-info">View Your Open Tasks</a>
            @endif
            <a href="{{ url('tasks/create') }}" class="list-group-item list-group-item-action list-group-item-success">Open a new Task</a>
            <br>
            <h3>Closed Tasks</h3>
            @foreach ($archives as $stats)
            <a href="{{ url('tasks/resolved') }}" class="list-group-item">{{ $stats['month']. ' ' .$stats['year']. ' '. 'Total:'.' '.$stats['total'] }}</a>
            @endforeach
            
          </div>
        </div><!--/span-->
      </div><!--/row-->


@endsection
