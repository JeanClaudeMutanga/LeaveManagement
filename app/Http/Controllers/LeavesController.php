<?php

namespace App\Http\Controllers;

use App\Leaves;
use App\Vacations;
use App\Applications;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function leaves()
    {
       return 123; 
    }

    public function applications()
    {
        return 123; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Leaves::latest()->get();
        return view('admin.leaves')->with('leaves',$leaves);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Leaves::create($request->all());
        $users = User::all();
        $msg = "Leave Type Created Successfully";
        return redirect('/admin/leaves')->with('success',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function show(Leaves $leaves)
    {
        return view('admin.applications')->with('leaves',$leaves);
    }

    public function employees()
    {
        $users = User::latest()->get();
        return view('hr.employees')->with('users',$users);
    }

    public function employee($id)
    {
        $user = User::find($id);
        $admins = User::all();
        $m = $user->manager;
        $manager = User::find($m);
        //return $manager;
        return view('hr.employee')->with([
            'user'=> $user,
            'manager'=> $manager,
            'admins'=> $admins
        ]);
    }
    

    public function single($id)
    {
        $application = Applications::find($id);
        /*
        $start = new Carbon ($application->start);
        $finish = new Carbon ($application->finish);
        $difference = $finish->diff($start)->days;
        return $difference;
        */
        return view('admin.single')->with('application',$application);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function edit(Leaves $leaves)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leaves $leaves)
    {
        //
    }

    public function assign(Request $request, $id)
    {
        $user = User::find($id);
        $user->manager = $request->input('supervisor');
        $user->save();
        $msg = "Assigned Successfully";
        return redirect('/get/employee/'.$user->id)->with('success',$msg);
        
    }

    public function approve($id)
    {
        $leaves = new Vacations();
        $user = auth()->user()->id;
        $decision = "Approved";

        $application = Applications::findOrFail($id);
        $applicant_id = $application->user->id;
        $applicant_leave = $application->leaves_id;
        $applicant_application_id = $application->id;
        $applicant_start = $application->start;
        $applicant_finish = $application->finish;
        $applicant_duration = $application->duration;

        $leaves->user_id = $applicant_id;
        $leaves->leaves_id = $applicant_leave;
        $leaves->applications_id = $applicant_application_id;
        $leaves->start = $applicant_start;
        $leaves->end = $applicant_finish;
        $leaves->duration = $applicant_duration;
        $leaves->save();
      
        $application->decision = $decision;
        $application->decision_by = $user;
        $application->save();

        $msg = "Decision Updated Successfully";
        return redirect('/application/'.$id)->with('success',$msg);
    }

    public function reject(Request $request,$id)
    {
        $user = auth()->user()->id;
        $decision = "Rejected";
        $application = Applications::findOrFail($id);
        $application->decision = $decision;
        $application->decision_notes = $request->input('decision_notes');
        $application->decision_by = $user;
        $application->save();

        $msg = "Decision Updated Successfully";
        return redirect('/application/'.$id)->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leaves $leaves)
    {
        //
    }
}
