<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Item;
use App\Order;
use App\Rating;
use App\Reservation;
use App\Type;
use App\Userlater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
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

    public function home()
    {
        return view('home');
    }

    public function siteadd(Request $request)
    {
        $validatedData = $request->validate([
            'city' => ['regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/','max:10'],
            'region' => ['regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/','max:50'],
        ]);
            $user_site = new Userlater();
            $user_site->user_id = Auth::user()->id;
            $user_site->city = $request->city;
            $user_site->region = $request->region;
            $user_site->save();
            session()->flash('site','Success...Site Register');
            return redirect('/home/main');
    }


    public function sitechange()
    {
        return view('sitechange');
    }

    public function sitechangepsot(Request $request)
    {
        $validatedData = $request->validate([
            'city' => ['regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/','max:10'],
            'region' => ['regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/','max:50'],
        ]);

        $user_id=Auth::user()->id;
        $city=$request->city;
        $region=$request->region;
        DB::update('update userlaters set city=?,region=? where user_id=?',[$city,$region,$user_id]);
        session()->flash('siteChange','Success... Site Change');
        return redirect('/home/main');
    }
     public function calculate(){
        $items=DB::select('select * from meals');
        return view('calculate',compact('items'));
     }


}
