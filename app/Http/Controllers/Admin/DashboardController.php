<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Table;
use App\Offer;
use App\category;
use App\Meal;
class DashboardController extends Controller
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

    public function dashboard(){
        return view('admin.dashbord');
    }

    public function registered(){
$users =User::all();
    return view('admin.register')->with('users',$users);

}

    public function registerededit(Request $request ,$id){
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);

    }
    public function registeredupdate(Request $request ,$id){
        $users =User::find($id);
        $r=$request->input('name');
        $users->name =  $request->input('txtEmployeeNo');

        $users->usertype = $request->input('usertype');
        $users->update();
        return redirect('/role-register')->with('status','you are update user');

    }


    public function registeredblock(Request $request ,$id){
        $users = User::findOrFail($id);


        if ($users->active==0)
        {
            $users->active=1;
            $users->update();
            return redirect('/role-register')->with('status','you are Active user');

        }
        elseif ($users->active==1)
        {
            $users->active=0;
            $users->update();
            return redirect('/role-register')->with('status','you are block user');

        }


    }

    public function registereddelete(Request $request ,$id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/role-register')->with('status','you are delete user');

    }



    ////////////////////////////////////////////
    ///
    public function reversed(){
        $users =Reverse::all();
        return view('admin.reversed')->with('users',$users);

    }

    public function reversededit(Request $request ,$id){
        $users = Reverse::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);

    }
    public function reversedupdate(Request $request ,$id){
        $users =Reverse::find($id);
        $r=$request->input('name');
        $users->name =  $request->input('txtEmployeeNo');

        $users->usertype = $request->input('usertype');
        $users->update();
        return redirect('/role-register')->with('status','you are update user');

    }

    public function reverseddelete(Request $request ,$id){
        $revers = Reverse::findOrFail($id);
        $revers->delete();
        return redirect('/role-reverses')->with('status','you are delete user');

    }


    public function reversedconfirm(Request $request ,$id){
        $reverse = Reverse::findOrFail($id);


        if ($reverse->confirm==0)
        {
            $reverse->confirm=1;
            $reverse->update();
            return redirect('/role-reverses')->with('status','you are Active user');

        }
        elseif ($reverse->confirm==1)
        {
            $reverse->confirm=0;
            $reverse->update();
            return redirect('/role-reverses')->with('status','you are block user');

        }


    }
    ///////////////////////


    public function profile(Request $request ){
        $id = Auth::user()->id;
        $users = User::findOrFail($id);
        return view('profile')->with('user',$users);

    }


/////////////////////table controller ////////////////

    public function tabelshow(){
       // $users =User::all();
        $table =Table::all();
            return view('admin.table')->with('table',$table);
        
        }
        
            public function  tabeledit(Request $request ,$id){
                $table = Table::findOrFail($id);
                return view('admin.table-edit')->with('table',$table);
        
            }
            public function  tabelupdate(Request $request ,$id){
                $table =Table::find($id);
                $r=$request->input('name');
                $table->capacity =  $request->input('capacity');
        
                $table->tableFee = $request->input('tableFee');
                $table->update();
                return redirect('/role-table-show')->with('status','you are update Table');
        
            }

            public function addtable(Request $request){
                $about=new Table;
                $about->capacity=$request->input('capacity');
                $about->tableFee=$request->input('tableFee');
                $about->save();
                return redirect('/role-table-show')->with('status','you are add Table sucess')->with('statuscode','success');

        
            }

            public function tabledelete(Request $request ,$id){
                $Table = Table::findOrFail($id);
                $Table->delete();
                return redirect('/role-table-show')->with('status','you are delete Table');
        
            }




            ///////////////////
            /////////////////////offer controller ////////////////

    public function offersshow(){
        // $users =User::all();
         $offers =Offer::all();
             return view('admin.offers')->with('offers',$offers);
         
         }
         
             public function  offersedit(Request $request ,$id){
                 $offers = Offer::findOrFail($id);
                 return view('admin.offers-edit')->with('offers',$offers);
         
             }
             public function offersupdate(Request $request ,$id){
                 $offers =Offer::find($id);
                 $r=$request->input('name');
                 $offers->nameOffer=$request->input('nameOffer');
                 $offers->describeOffer=$request->input('describeOffer');
                 $offers->oldPrice=$request->input('oldPrice');
                 $offers->newPrice=$request->input('newPrice');
                 $offers->update();
                 return redirect('/role-offers-show')->with('status','you are update offers');
         
             }
 
             public function addoffers(Request $request){
                 $offers=new Offer;
                 $offers->nameOffer=$request->input('nameOffer');
                 $offers->describeOffer=$request->input('describeOffer');
                 $offers->oldPrice=$request->input('oldPrice');
                 $offers->newPrice=$request->input('newPrice');
                 $offers->save();
                 return redirect('/role-offers-show')->with('status','you are add offers sucess')->with('statuscode','success');
 
         
             }
 
             public function offersdelete(Request $request ,$id){
                 $offers = Offer::findOrFail($id);
                 $offers->delete();
                 return redirect('/role-offers-show')->with('status','you are delete offers');
         
             }
             ///////////////





            /////////////////////categories controller ////////////////

            public function categoriesshow(){
                // $users =User::all();
                 $categories =category::all();
                     return view('admin.categories')->with('categories',$categories);
                 
                 }
                 
                     public function  categoriesedit(Request $request ,$id){
                         $categories = category::findOrFail($id);
                         return view('admin.categories-edit')->with('categories',$categories);
                 
                     }
                     public function categoriesupdate(Request $request ,$id){
                         $categories =category::find($id);
                         $r=$request->input('name');
                         $categories->nameCategory=$request->input('nameCategory');
                         $categories->descriptionCategory=$request->input('descriptionCategory');

                         $categories->update();
                         return redirect('/role-categories-show')->with('status','you are update Category');
                 
                     }
         
                     public function addcategories(Request $request){
                         $categories=new category;
                         $categories->nameCategory=$request->input('nameCategory');
                         $categories->descriptionCategory=$request->input('descriptionCategory');

                         $categories->save();
                         return redirect('/role-categories-show')->with('status','you are add Category sucess')->with('statuscode','success');
         
                 
                     }
         
                     public function categoriesdelete(Request $request ,$id){
                         $categories = category::findOrFail($id);
                         $categories->delete();
                         return redirect('/role-categories-show')->with('status','you are delete Category');
                 
                     }
                     ///////////////





                        /////////////////////Meal controller ////////////////

    public function mealsshow(Request $request ,$idCategory){
        // $users =User::all();
        // $meals =Meal::all();
         $meals=DB::select('select * from meals where category_id=?',[$idCategory]);
         return view('admin.meals')->with('meals',$meals)->with('idCategory',$idCategory);
         
         }
         
             public function  mealsedit(Request $request ,$id){
                 $meals = Meal::findOrFail($id);
                 return view('admin.meals-edit')->with('meals',$meals);
         
             }
             public function mealsupdate(Request $request ,$id){
                 $meals =Meal::find($id);
            
                 $meals->category_id=$request->category_id;
                 $meals->nameMeal =$request->name;
                 $meals->descriptionMeal =$request->describe;
                // $meals->image = $request->image;
         
                 if ($request->hasFile('image'))
                 {
                     $file = $request->file('image');
                     $extension = $file->getClientOriginalExtension();
                     $filename = time() . '.' . $extension;
                     $file->move('uploads/', $filename);
                     $meals->image = $filename;
                     $meals->image = $request->image;
                 }

         
                 $meals->price = $request->price;
                 $meals->calories = $request->calories;
                 $meals->fat = $request->fat;
                 $meals->protein = $request->brotien;
                 $meals->carbohydrates = $request->kerbohedrat;
                 //    $x->email=Auth::user()->email;
                 $meals->update();
$c=$request->category_id;
return redirect()->route('Meals', [$c])->with('status','you are update category');

               // return redirect()->route('/role-meals-show', ['idCategory' => $c]);
               //  return redirect('/role-meals-show', ['idCategory' => 1])->with('status','you are update offers');
         
             }
 


             public function addmeals(Request $request,$idCategory)
             {
                 $meals = new Meal();
                 $meals->category_id=$idCategory;
                 $meals->nameMeal =$request->name;
                 $meals->descriptionMeal =$request->describe;
                 $meals->image = $request->image;
         
                 if ($request->hasFile('image'))
                 {
                     $file = $request->file('image');
                     $extension = $file->getClientOriginalExtension();
                     $filename = time() . '.' . $extension;
                     $file->move('uploads/', $filename);
                     $meals->image = $filename;
                 }
         
                 $meals->price = $request->price;
                 $meals->calories = $request->calories;
                 $meals->fat = $request->fat;
                 $meals->protein = $request->brotien;
                 $meals->carbohydrates = $request->kerbohedrat;
               
                 $meals->save();
                 return redirect()->route('Meals', [$idCategory])->with('status','you are add Meals sucess')->with('statuscode','success');;
                // return redirect('/role-meals-show')->with('status','you are add offers sucess')->with('statuscode','success');

             }


             public function addmeals2(Request $request,$idCategory){
                $meals = new Meal();
                $meals->category_id=$idCategory;
                $meals->nameMeal =$request->name;
                $meals->descriptionMeal =$request->describe;
                $xmeals->image = $request->image;
        
                if ($request->hasFile('image'))
                {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('uploads/', $filename);
                    $meals->image = $filename;
                }
        
                $meals->price = $request->price;
                $meals->calories = $request->calories;
                $meals->fat = $request->fat;
                $meals->protein = $request->brotien;
                $meals->carbohydrates = $request->kerbohedrat;
                //    $x->email=Auth::user()->email;
                $meals->save();
            
                 return redirect('/role-meals-show')->with('status','you are add Meals sucess')->with('statuscode','success');
 
         
             }
 
             public function mealsdelete(Request $request ,$id){
                 $meals = Meal::findOrFail($id);
                 $idCategory=$meals->category_id;
                 $meals->delete();
                 return redirect()->route('Meals', [$idCategory])->with('status','you are delete Meals');
         
             }
             ///////////////

}
