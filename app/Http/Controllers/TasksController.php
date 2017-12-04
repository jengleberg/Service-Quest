<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Task;
use App\Location;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class TasksController extends Controller
{
    // Pulls in auth middleware to only allow authorized users to access the app.
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Index controller function used in web.php admin routes.  
    public function index()
    {
        // variables of database used in blade index view.  
        $tasks = Task::where('status', 'Open')->paginate(10);

        
        $categories = Category::all();
        $locations = Location::all();

        



        // when index function
        return view('tasks.index', compact('tasks', 'categories', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();

        return view('tasks.create', compact('categories', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        // Form validation requiring the following fields
        $this->validate($request, [
            'title'     => 'required',
            'category'  => 'required',
            'location'  => 'required',
            'priority'  => 'required',
            'message'   => 'required'
        ]);

        $task = new Task([
            'title'         => $request->input('title'),
            'user_id'       => Auth::user()->id,
            'task_id'       => strtoupper(str_random(10)),
            'category_id'   => $request->input('category'),
            'location_id'   => $request->input('location'),
            'priority'      => $request->input('priority'),
            'message'       => $request->input('message'),
            'status'        => "Open",
        ]);

        $task->save();

        $mailer->sendTaskInformation(Auth::user(), $task);

        return redirect()->back()->with("status", "Task $task->title has been opened.");

    }

    public function userTasks()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->paginate(10);
        $categories = Category::all();
        $locations = Location::all();

        return view('tasks.usershow', compact('tasks', 'categories', 'locations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($task_id)
    {
        $task = Task::where('task_id', $task_id)->firstOrFail();
        $category = $task->category;
        $location = $task->location;
        $comments = $task->comments;

        return view('tasks.show', compact('task', 'category', 'location', 'comments'));
    }

    public function close($task_id, AppMailer $mailer)
    {
        $task = Task::where('task_id', $task_id)->firstOrFail();

        $task->status = 'Closed';

        $task->save();

        $taskOwner = $task->user;

        $mailer->sendTaskStatusNotification($taskOwner, $task);

        return redirect()->back()->with("status", "The task has been closed.");
    }

    // public function dashboard()
    // {
    //     $tasks = Task::latest()

    //     ->filter(request()->only(['month', 'year']))

    //     ->get();

    //     $archives = task::selectRaw('year(created_at) year, monthname(created_at) month, count(*) total')

    //     ->groupBy('year', 'month')
    //     ->orderedByRaw('min(created_at) desc')
    //     ->get()
    //     ->toArray();

    //     return view ('dashboard', compact('tasks', 'archives'));
    // }

    // public static function archives()
    // {
    //     return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
    //     ->groupBy('year', 'month')
    //     ->orderByRaw('min(created_at) desc')
    //     ->get()
    //     ->toArray();
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
