<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaves;
use App\Applications;
use App\User;
use App\Tasks;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $applications = Applications::all();
        $leaves = Leaves::latest()->get();
        $tasks = Tasks::latest()->limit(5)->get();
        
        if(auth()->user()->type == "admin")
        {
            return view('home')->with([
                'leaves'=>$leaves,
                'applications'=>$applications,
                'users'=>$users,
                'tasks'=>$tasks
            ]);
        }

        elseif(auth()->user()->type == "employee")
        {
            return view('home')->with('leaves',$leaves);
        }

        elseif(auth()->user()->type == "hr")
        {
           
            return view('hr.home')->with([
                'leaves'=>$leaves,
                'applications'=>$applications,
                'users'=>$users
            ]);
        }
        
    }
}
