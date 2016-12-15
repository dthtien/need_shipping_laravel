<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ns.index');
    }
    public function admin()
    {
       if(Auth::check()){ 
            if(Auth::user()->level==1)
            {
            return view('admin.dashboard');
           } else
           {
            return redirect('index');
           }
       }
           else
           {
            return redirect('login');
    }
    }
}
