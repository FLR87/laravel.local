<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $tasks = Task::all()->toArray()->paginate(5);
        $tasks = Task::paginate(5);
//        return view('tasks.index', compact('tasks'));
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'task' => 'required'
        ]);

        Task::create($task);

        return back()->with('success', 'Task has been added');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        if (view()->exists('tasks'))
        $tasks = DB::table('tasks')->first();
        dd($tasks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit',compact('task','id'));
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
        $task = Task::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'task' => 'required'
        ]);
        $task->name = $request->get('name');
        $task->email = $request->get('email');
        $task->task = $request->get('task');
        $task->save();
        return redirect('tasks')->with('success','Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('tasks')->with('success','Task has been deleted');
    }
}
