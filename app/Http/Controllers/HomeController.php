<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
        if(!empty(Auth::user()->role))
        if(Auth::user()->role->name == "tutor"){
            return redirect('/home-tutor');
        }
        else if(Auth::user()->role->name == "student"){
            return redirect('/home-student');
        }
        else if(Auth::user()->role->name == "admin"){
            return redirect('/home-admin');
        }
        else{
            return redirect(url()->previous());
            
        }
        else{
            return redirect(url()->previous());
        }
    }
}
