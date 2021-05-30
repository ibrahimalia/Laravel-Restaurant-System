<?php

namespace App\Http\Controllers;

use App\Mail\OrderTable;
use App\Reserve;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TableController extends Controller
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

    public function table(){
        return view('Add_Table');
    }
    public function addTable(Request $request){
        $x=new Table();
        $x->capacity=$request->capacity;
        $x->tableFee=$request->tableFee;
        $x->save();
    }
    public function searchTable(Request $request){
        $date=$request->date;
        if ($date!=null){
            $result=DB::select('select * from tables where tables.id not in (select reserves.table_id from reserves where date=? )',[$date]);
        }else{
            $result=[];
        }
        return view('SearchTable',compact('result','date'));
    }
    public function reserveTable($date){
            return view('Reservation');
    }
    public function reserveTableAdd(Request $request,$date,$table_id){
            $x = new Reserve();
            $x->table_id = $table_id;
            $x->user_id = Auth::user()->id;
            $x->date = $date;
            $x->time = $request->time;
            $x->save();
            Mail::to($request->user())->send( new OrderTable());
            session()->flash('table','Success...Order Register');
            return redirect('/home/main');

    }
}
