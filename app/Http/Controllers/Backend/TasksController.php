<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    { 
        $tasks = Task::all();
        return view('backend.pages.tasks.index',compact('tasks'));
    }

    public function create()
    {
        $status  = Status::all();
        $user  = User::all();
        return view('backend.pages.tasks.create', compact('status','user'));
    }

    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'task' => 'required|max:50',
            'task_detail' => 'required|max:100',
            'start_date' => 'required|date_format:Y-m-d|date',
            'due_date' => 'required|date_format:Y-m-d|date',
            'status' => 'required',
            'assignee' => 'required',
        ]);

        // Create New User
        $task = new Task();
        $task->title = $request->task;
        $task->description = $request->task_detail;
        $task->start_date = $request->start_date;
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->assignee = $request->assignee;
        $task->save();

        session()->flash('success', 'Task has been created !!');
        return redirect()->route('admin.tasks.index');
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
        $status  = Status::all();
        return view('backend.pages.tasks.edit', compact('task', 'status'));
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

        // Validation Data
        $request->validate([
            'task' => 'required|max:50',
            'task_detail' => 'required|max:100',
            'start_date' => 'required|date_format:Y-m-d|date',
            'due_date' => 'required|date_format:Y-m-d|date',
            'status' => 'required',
            'assignee' => 'required',
        ]);


        $task->title = $request->task;
        $task->description = $request->task_detail;
        $task->start_date = $request->start_date;
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->assignee = $request->assignee;
        $task->save();


        session()->flash('success', 'Task has been updated !!');
        return back();
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
        if (!is_null($task)) {
            $task->delete();
        }

        session()->flash('success', 'Task has been deleted !!');
        return back();
    }
}
