<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */


     public function index()  {
                
                $userId = Auth::id();
                $cvs  = Cv::all()->where('user_id',$userId);
                return view('home')->with('cvs', $cvs);
       }
}
