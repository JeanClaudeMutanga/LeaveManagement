<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaves;
use App\Tasks;
use App\Assignments;
use App\Applications;
use App\Vacations;
use App\Todos;
use App\Updates;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leaves::all();
        return view('employee.applications')->with('leaves',$leaves);
    }

    public function tasks()
    {
        //return auth()->user()->assignments;
        return view('employee.tasks');
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
        $start = new Carbon ($request->input('start'));
        $finish = new Carbon ($request->input('finish'));
        $difference = $finish->diff($start)->days;

        $application = new Applications();
        $application->user_id = $request->input('user_id');
        $application->leaves_id = $request->input('leaves_id');
        $application->title = $request->input('title');
        $application->start = $request->input('start');
        $application->finish = $request->input('finish');
        $application->duration = $difference;
        $application->notes = $request->input('notes');
        $application->decision = $request->input('decision');
        $application->save();
        $msg = "Application Submitted Successfully";
        return redirect('/my/applications')->with('success',$msg);
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

    public function single_task($id)
    {
        $assignment = Assignments::findOrFail($id);
        return view('employee.task')->with('assignment',$assignment);
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

    public function complete_task($id)
    {
        
        
        $todo = Todos::findOrFail($id);
        $task = $todo->tasks_id;
        $status = "Completed";

        //$task_progress = $todo->tasks->status;

        $todo->status = $status;
        $todo->save();

       

        $completed_todos = DB::table('todos')->where([
            'tasks_id' => $task,
            'status'=> $status
        ])->count();

        $all_todos = DB::table('todos')->where('tasks_id',$task)->count();

        //return $completed_todos;

        $percentage_done = ($completed_todos/$all_todos)*100;

        $tasks = Tasks::findOrFail($task);
        $tasks->status = $percentage_done;
        $tasks->save();

        $update = new Updates();
        $update->user_id = auth()->user()->id;
        $update->todos_id = $id;
        $update->tasks_id = $task;
        $update->save();

        //return $percentage_done;
        
        $msg ="Done";
        return redirect('/get/my/task/'.$task)->with('success',$msg);
        

    }

    public function custom(Request $request,$id)
    {
        $tasks = Tasks::findOrFail($id);
        $tasks->status = $request->input('current');
        $tasks->save();

        $update = new Updates();
        $update->user_id = auth()->user()->id;
        $update->tasks_id = $id;
        $update->value = $request->input('current');
        $update->save();

        $assignment = $request->input('assignment');

        $msg ="Updated Successfully";
        return redirect('/get/my/task/'.$assignment)->with('success',$msg);

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
