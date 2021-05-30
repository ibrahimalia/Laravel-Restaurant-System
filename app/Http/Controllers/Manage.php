<?php

namespace App\Http\Controllers;

use App\Meal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Manage extends Controller
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
    public function Manage(){
        $time=Carbon::now("Asia/Damascus");
        $meal=DB::select('select * from orders where user_id=?',[Auth::user()->id]);
        $table=DB::select('select * from reserves where user_id=?',[Auth::user()->id]);
        $evaluation=DB::select('select * from  meals,evaluations where meals.id=evaluations.meal_id and evaluations.user_id=?',[Auth::user()->id]);
        return view('Manage',compact('meal','table','evaluation','time'));
    }
    public function deleteOrder($order_id){
        DB::delete('delete from orders where id=? and user_id=?',[$order_id,Auth::user()->id]);
        session()->flash('delete','Success...Delete order');
        return redirect('/home/Manage_Page');
    }
    public function deleteTable($table_id){
        DB::delete('delete from reserves where id=? and user_id=?',[$table_id,Auth::user()->id]);
        session()->flash('delete','Success...Delete order');
        return redirect('/home/Manage_Page');
    }
    public function deleteEvaluation($meal_id){
        $x=DB::delete('delete from evaluations where meal_id=? and user_id=?',[$meal_id,Auth::user()->id]);
        $data=DB::select('select rate from evaluations where meal_id=?',[$meal_id]);
        if ($data != null){
        $sum=0;
        $div=0;
        foreach ($data as $d){
            $sum = $sum + $d->rate;
            $div = $div + 1;
        }
            $avg=(float)($sum/$div);
            Meal::where('id', $meal_id)
                ->update(['avgRate' =>$avg]);

        }else{
            Meal::where('id', $meal_id)
                ->update(['avgRate' =>0]);
        }
        session()->flash('delete','Success...Delete order');
        return redirect('/home/Manage_Page');


    }
}
