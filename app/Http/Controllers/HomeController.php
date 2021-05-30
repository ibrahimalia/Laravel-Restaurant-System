<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $site=DB::select('select * from userlaters where user_id=?',[Auth::user()->id]);
        if ($site == null){
            $show=0;
        }else{
            $show=1;
        }
        return view('site',compact('show'));
    }

}
