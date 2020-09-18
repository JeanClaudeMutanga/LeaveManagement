<?php

namespace App\Http\Controllers;

use App\Leaves;
use App\Vacations;
use App\Applications;
use App\User;
use App\Tasks;
use App\Todos;
use App\Assignments;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.employees')->with('users',$users);
    }

    public function tasks()
    {
        return view('admin.tasks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    public function assign(Request $request,$id)
    {
        $status = "Pending";
        $assign = new Assignments();
        $assign->user_id = $request->input('user_id'); 
        $assign->tasks_id = $id;
        $assign->status = $status;
        $assign->save();

        $msg="Assignment Successful";
        return redirect('/admin/get/task/'.$id)->with('success',$msg);
    }

    public function create_task(Request $request)
    {
        Tasks::create($request->all());
        $msg = "Task Created Successfully";
        return redirect('/admin/tasks')->with('success',$msg);
    }

    public function create_todo(Request $request,$id)
    {
        Todos::create($request->all());
        $msg = "Todo Created";
        return redirect('/admin/get/task/'.$id)->with('success',$msg);
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

    public function task($id)
    {
        $users = User::all();
        $task = Tasks::findOrFail($id);
        return view('admin.task')->with([
            'task' => $task,
            'users' => $users
        ]);
    }

    public function employee($id)
    {
        $user = User::find($id);
        $admins = User::all();
        $m = $user->manager;
        $manager = User::find($m);
        //return $manager;
        return view('admin.employee')->with([
            'user'=> $user,
            'manager'=> $manager,
            'admins'=> $admins
        ]);
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
