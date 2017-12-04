@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')


<div class="row">
    {{-- <div class="card-group"> --}}
        <div class="col-md-10 col-md-offset-1">
            {{-- <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-task">Your Task List</i>
                </div> --}}

               {{--  <div class="panel-body"> --}}
                    @if ($tasks->isEmpty())
                        <p>There are currently no tasks.</p>
                    @else
                    @foreach ($tasks as $task)
                                
                                            {{-- {{ $task->title }} --}}
                                      
  <div class="col-sm-6">

    <div class="col-md-10 col-md-offset-1">

    <div class="card card-cascade" style="/*background-color: #333;*/   margin-bottom: 1em">
        {{-- <div class="card-header">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link active" href="#">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('tasks/' . $task->task_id) }}">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
        </div> --}}
      <!--Card image-->
    <div class="view gradient-card-header blue-gradient">
        <h2 class="h2-responsive">{{ $task->title }}</h2>
        {{-- <p>Subheading</p> --}}
    </div>
    <!--/Card image-->
    <!--Card content-->
    <div class="card-body text-center">
        {{-- <h3 class="card-title">{{ $task->title }}</h3> --}}
        @foreach ($categories as $category)
            @if ($category->id === $task->category_id)

               <h2>{{ $category->name }}</h2>
            @endif
        @endforeach
         </div>
    <!--/.Card content-->
        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
      </div>
    </div>

  </div>

  @endforeach
  {{ $tasks->links() }}

                    @endif
  </div>
</div>


@endsection