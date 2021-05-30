<?php

namespace App\Http\Controllers;

use App\category;
use App\Mail\OrderShipped;
use App\Meal;
use App\Offer;
use App\Order;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MealController extends Controller
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
   public function category(){
        $category=DB::select('select * from categories');
        return view('category',compact('category'));
   }
    public function addCategory(){
        return view('addCategory');
    }
    public function addCategoryData(Request $request){
        $x= new category();
        $x->nameCategory=$request->nameCategory;
        $x->descriptionCategory=$request->descriptionCategory;
        $x->save();
        return redirect('/home/category');
    }
    //add meal to databases use in admin
    public function meal()
    {
        return view('meal');
    }
    public function addMeal(Request $request,$idCategory)
    {
        $x = new Meal();
        $x->category_id=$idCategory;
        $x->nameMeal =$request->name;
        $x->descriptionMeal =$request->describe;
        $x->image = $request->image;

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $x->image = $filename;
        }

        $x->price = $request->price;
        $x->calories = $request->calories;
        $x->fat = $request->fat;
        $x->protein = $request->brotien;
        $x->carbohydrates = $request->kerbohedrat;
        //    $x->email=Auth::user()->email;
        $x->save();
    }
    // end add meal
    public function contentCategory($idCategory){
        $content=DB::select('select * from meals where category_id=?',[$idCategory]);
        return view('contentCategory',compact('content'));
    }
    public  function orderMeal(){
        $category=DB::select('select * from categories');
        $order=DB::select('select * from meals');
        $site=DB::select('select * from userlaters where user_id=?',[Auth::user()->id]);
        return view('orderPage',compact('order','category','site'));
    }
    public function  orderMealAdd(Request $request){
        try {
            $x = new Order();
            $n = $request->name;
            foreach ($n as $item) {
                $m[] = $item;
            }
            $name = implode(",", $m);
            $x->name = $name;


            $q = $request->quntites;
            foreach ($q as $i) {
                $v[] = $i;

            }
            $quntites = implode(",", $v);
            $x->quntites = $quntites;


            $p = $request->price;
            foreach ($p as $j) {
                $h[] = $j;
            }
            $price = implode(",", $h);
            $x->price = $price;


            $x->user_id = Auth::user()->id;
            $x->site = $request->site;
            $x->total = $request->total;
            $x->time=Carbon::now("Asia/Damascus");
            $x->save();
            Mail::to($request->user())->send(new OrderShipped());
            session()->flash('order','Success...Order Register');
            return redirect('/home/order_page');
        }catch (QueryException $exception){
            session()->flash('orderError','Error...Select your site');
            return redirect('/home');

        }

    }
    public  function recommendations(){
        $site= DB::select('select * from userlaters where id=?',[Auth::user()->id]);
        $offer=DB::select('select * from offers');
        return view('recommendations',compact('site','offer'));
    }
    public function addOrderRecommendations(Request $request){
        try {
            $x = new Order();
            $x->user_id = Auth::user()->id;
            $x->site = $request->site;
            $x->name = $request->name;
            $x->quntites = $request->quntites;
            $x->price = $request->price;
            $x->total = $request->total;
            $x->time = Carbon::now("Asia/Damascus");
            $x->save();
            Mail::to($request->user())->send(new OrderShipped());
            session()->flash('order', 'Success...Order Register');
            return redirect('/home/recommendation_page');
        }catch (QueryException $exception) {
            session()->flash('orderError', 'Error...Select your site');
            return redirect('/home');
        }
    }
    //add offers
    public  function offer(){
        return view('Offer');
    }
    public  function addOffer(Request $request){
        $x= new Offer();
        $x->nameOffer=$request->nameOffer;
        $x->describeOffer=$request->describeOffer;
        $x->oldPrice=$request->oldPrice;
        $x->newPrice=$request->newPrice;
        $x->save();
    }
}
