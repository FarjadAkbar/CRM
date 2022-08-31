<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Category;
use App\Models\Projects;
use App\Models\ProjectCategory;
use App\Models\ClientFiles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Auth::user()->hasPermission('task-access')) abort(403);
        if (Auth()->user()->hasRole('team-lead') || Auth()->user()->hasRole('employee')) {
            $tasks = Tasks::whereIn('category_id', auth()->user()->category_list())->get();
        } else {
            $tasks = Tasks::all();
        }
        return view('admin.tasks.index', compact('tasks'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!Auth::user()->hasPermission('create-task')) abort(403);
        if (Auth()->user()->hasRole('manager')) {
            $project = Projects::whereIn('assign_id', Auth()->user())->get();
        } else {
            $project = Projects::where('brand_id', '!=', '')->get();
        }
        $category = Category::select('id', 'name')->get();
        return view('admin.tasks.create', compact('project', 'category'));
    }

    public function taskproject($id)
    {
        $project = Projects::find($id);
        return view('admin.tasks.create', compact('id', 'project'));
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
        $request->validate([
            'project_id' => 'required',
            'category' => 'required',
            'due_date' => 'required',
            // 'files' => 'clamav'
        ]);

        try {
            if (!isset($request->brand_id)) {
                $brand = Projects::select('brand_id')->where('id', '=', $request->project_id)->first();
                $brand_id = $brand->brand_id;
            } else {
                $brand_id = $request->brand_id;
            }
            $task = new Tasks();
            $task->project_id = $request->project_id;
            $task->brand_id = $brand_id;
            $task->category_id = $request->category;
            $task->user_id = Auth::id();
            $task->duedate = $request->due_date;
            $task->description = $request->description;

            $task->save();

            $projectCategory = new ProjectCategory();
            $projectCategory->project_id = $task->project_id;
            $projectCategory->category_id = $task->category_id;

            $category = $task->category->name;

            $users = User::whereHas(
                'category',
                function ($q) use ($category) {
                    $q->where('name', $category);
                }
            )->get();

            if (count($users) > 0) {
                foreach ($users as $u) {
                    $this->notify([
                        'id' => $request->task,
                        'message' => "new task created"
                    ], $u->id);
                }
            }



            if ($request->file('files')) {
                $files = [];
                foreach ($request->file('files') as $key => $file) {
                    $fileName = time() . rand(1, 99) . '.' . $file->extension();
                    $file->move(public_path('files'), $fileName);
                    $path =  public_path('files');
                    $files['name'] = $fileName;
                }
                foreach ($files as $file) {
                    ClientFiles::create([
                        'path' => $path,
                        'name' => $file,
                        'task_id' => $task->id,
                        'user_id' => Auth::id(),
                        'user_check' => 0,
                    ]);
                }
            }


            return back()->with('success', "Insert successfully");
            // dd($request->all());
        } catch (Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if (!Auth::user()->hasPermission('view-task')) abort(403);
        $task = Tasks::find($id);
        return view('admin.tasks.view', compact('task'));
    }

    public function tasknotify($id, $notify)
    {
        if ($notify) {
            auth()->user()->notifications->where('id', $notify)->markAsRead();
        }
        $task = Tasks::find($id);
        return view('admin.tasks.view', compact('task'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (!Auth::user()->hasPermission('edit-task')) abort(403);
        $task = Tasks::find($id);
        $category = Category::select('id', 'name')->get();
        return view('admin.tasks.edit', compact('category', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //        
        $request->validate([
            'category' => 'required',
            'due_date' => 'required',
            // 'files' => 'clamav'
        ]);

        try {
            $task = Tasks::find($id);
            $task->category_id = $request->category;
            $task->user_id = Auth::id();
            $task->status = $request->status;
            $task->duedate = $request->due_date;
            $task->description = $request->description;
            $task->save();

            if ($request->file('files')) {
                $files = [];
                foreach ($request->file('files') as $key => $file) {
                    $fileName = time() . rand(1, 99) . '.' . $file->extension();
                    $file->move(public_path('files'), $fileName);
                    $path =  public_path('files');
                    $files['name'] = $fileName;
                }
                foreach ($files as $file) {
                    ClientFiles::create([
                        'path' => $path,
                        'name' => $file,
                        'task_id' => $task->id,
                        'user_id' => Auth::id(),
                        'user_check' => 0,
                    ]);
                }
            }


            return back()->with('success', "Update successfully");
            // dd($request->all());
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            Tasks::destroy($id);
            return back()->with('success', "Delete successfully");
        } catch (\Exception $e) {
            return back()->with('error', json_encode($e->getMessage()));
        }
    }
}