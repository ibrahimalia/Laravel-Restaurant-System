<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
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
    public  function  evaluation($meal_id){
        $allowRate=DB::select('select user_id from evaluations where user_id=? and meal_id=?',[Auth::user()->id,$meal_id]);
        if ($allowRate == null){
            $show=0;
        }else{
            $show=1;

        }
        return view('evaluation',compact('show'));
    }
    public  function  AddEvaluation(Request $request,$meal_id){
        $x = new Evaluation();
        $x->meal_id =$meal_id;
        $x->user_id =Auth::user()->id;
        $x->rate=$request->rate;
        $x->save();
        //update rate in meals
        $data=DB::select('select rate from evaluations where meal_id=?',[$meal_id]);
        $sum=0;
        $div=0;
        foreach ($data as $d){
            $sum = $sum + $d->rate;
            $div = $div + 1;
        }
            $avg=(float)($sum/$div);
            Meal::where('id', $meal_id)
                ->update(['avgRate' =>$avg]);

        //end update
        session()->flash('evaluation','Success...Evaluation Register');
        return redirect('/home/category');
    }
}
