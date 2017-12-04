@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

{{-- If no tasks display a message --}}

    @if ($tasks->isEmpty())
                        <p>There are currently no tasks.</p>

{{-- Else if there are tasks loop through and display all --}}
                    @else
                     {{ $tasks->links() }}
                    @foreach ($tasks as $task)


<div class="row">
    <div class="col-md-6 col-md-offset-1">
        
    <div class="card text-center" style="padding-bottom:  10px;">
  <div class="card-header">
    Featured
  </div>
  <div class="card-block">
    <h4 class="card-title">{{ $task->title }}</h4>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
</div>
</div>


{{-- End Display of Tasks --}}

@endforeach


@endif

@endsection
