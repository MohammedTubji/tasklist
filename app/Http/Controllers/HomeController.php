<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $tasks = Task::orderBy('created_at')->get();
     return view('home',compact('tasks'));
}

public function store(Request $request){

    $request->validate([
        'name' => 'required|max:255',
    ]);

    $task = new Task();
    $task->name = $request->name ;
    $task->save();

    return redirect()->back();
}

public function destory($id){
    $task = Task::find($id);
    $task->delete();
    return redirect()->back();
}

public function edit($id){
    $task = Task::findOrFail($id);
    $tasks = Task::orderBy('created_at')->get();
    return view('home',compact('task','tasks'));
}

public function update(Request $request,$id){


    $request->validate([
        'name' => 'required|max:255',
    ]);
    $affected = Task::find($id);
    $affected->name = $request->name;
    $affected->updated_at = now();
    $affected->save();

    return redirect('/');
}
}
