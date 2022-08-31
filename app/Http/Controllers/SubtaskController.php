<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubTask;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SubtaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Auth::user()->hasPermission('subtask-access')) abort(403);
        if(Auth()->user()->hasRole('team-lead') || Auth()->user()->hasRole('employee')){
            $subtasks = Subtask::where('assign_id', auth()->user()->id)->orWhere('user_id', auth()->user()->id)->get();
        }
        else{
            $subtasks = Subtask::all();
        }
        
        return view('admin.subtask.index', compact('subtasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subtaskbyid($id)
    {
        //
        if (!Auth::user()->hasPermission('create-subtask')) abort(403);
        $task = Tasks::find($id);
        $category = $task->category->name;
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'employee');
            }
        )->whereHas(
            'category', function($q) use ($category){
                $q->where('name', $category);
            }
        )->get();
        
        return view('admin.subtask.create', compact('id', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'due_date' => 'required',
            'description' => 'required',
        ]);

        try{
            SubTask::create([
                'task_id' => $request->task,
                'duedate' => $request->due_date,
                'user_id' => auth()->user()->id,
                'assign_id' => $request->user,
                'description' => $request->description,
            ]);
            return back()->with('success', "Insert successfully");
        }
        catch (Exception $ex){
            return back()->with('error', "Internal Server Error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (!Auth::user()->hasPermission('edit-subtask')) abort(403);
        $subtask = SubTask::find($id);
        $task = Tasks::find($subtask->task_id);
        $category = $task->category->name;
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'employee');
            }
        )->whereHas(
            'category', function($q) use ($category){
                $q->where('name', $category);
            }
        )->get();
        return view('admin.subtask.edit', compact('users', 'subtask'));
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
        try{
            $subtask = SubTask::find($id);
            $subtask->description = $request->description;
            $subtask->assign_id = $request->user;
            $subtask->user_id = auth()->user()->id;
            $subtask->duedate = $request->due_date;
            
            $subtask->save();
            
            return back()->with('success', "Update successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
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
        if (!Auth::user()->hasPermission('delete-subtask')) abort(403);
        try {
            SubTask::destroy($id);
            return back()->with('success', "Delete successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }
}