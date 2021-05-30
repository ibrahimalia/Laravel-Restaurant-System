<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('auth/google/callback',[App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home', 'adminController@siteadd');
    Route::get('/home/main', 'adminController@home');
    Route::get('/home/main/calculate', 'adminController@calculate');
    Route::get('/home/sitechange', 'adminController@sitechange');
    Route::post('/home/sitechange', 'adminController@sitechangepsot');
    Route::get('/home/addMeal/{idCategory}','MealController@meal');
    Route::post('/home/addMeal/{idCategory}','MealController@addMeal');
    Route::get('/home/category','MealController@category');
    Route::get('/home/Add_category','MealController@addCategory');
    Route::post('/home/Add_category','MealController@addCategoryData');
    Route::get('/home/content_category/{idCategory}','MealController@contentCategory');
    Route::get('/home/order_page','MealController@orderMeal');
    Route::post('/home/order_page','MealController@orderMealAdd');
    Route::get('/home/Add_Offer','MealController@offer');
    Route::post('/home/Add_Offer','MealController@addOffer');
    Route::get('/home/recommendation_page','MealController@recommendations');
    Route::post('/home/recommendation_page','MealController@addOrderRecommendations');
    Route::get('/home/contact_page','ContactController@contact');
    Route::post('/home/contact_page','ContactController@addContact');
    Route::get('/home/Add_Table_page','TableController@table');
    Route::post('/home/Add_Table_page','TableController@addTable');
    Route::get('/home/Search_Table_page','TableController@searchTable');
    Route::post('/home/Search_Table_page','TableController@searchTable');
    Route::get('/home/Reservation_Table/{date}/{table_id}','TableController@reserveTable');
    Route::post('/home/Reservation_Table/{date}/{table_id}','TableController@reserveTableAdd');
    Route::get('/home/Evaluation_page/{meal_id}','EvaluationController@evaluation');
    Route::post('/home/Evaluation_page/{meal_id}','EvaluationController@AddEvaluation');
    Route::get('/home/Manage_Page','Manage@Manage');
    Route::get('/home/delete_order/{order_id}','Manage@deleteOrder');
    Route::get('/home/delete_table/{table_id}','Manage@deleteTable');
    Route::get('/home/delete_evaluation/{meal_id}','Manage@deleteEvaluation');



});
//Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'dashboard'])->name('dashboard');

Route::middleware([ 'admin','active'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/Add_Home', [App\Http\Controllers\Admin\AddHomeController::class,'addHome']);
    Route::post('/Add_Home', [App\Http\Controllers\Admin\AddHomeController::class,'addHouse']);


    Route::get('/role-register', [App\Http\Controllers\Admin\DashboardController::class,'registered'] );
    Route::get('/role-register-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class,'registerededit'] );
    Route::put('/role-register-update/{id}', [App\Http\Controllers\Admin\DashboardController::class,'registeredupdate'] );
    Route::delete('/role-register-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class,'registereddelete'] );
    Route::put('/role-register-block/{id}', [App\Http\Controllers\Admin\DashboardController::class,'registeredblock'] );

////////////////
Route::get('/role-table-show', [App\Http\Controllers\Admin\DashboardController::class,'tabelshow'] );
Route::post('/role-add-table', [App\Http\Controllers\Admin\DashboardController::class,'addtable'] );
Route::get('/role-table-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class,'tabeledit'] );
Route::put('/role-table-update/{id}', [App\Http\Controllers\Admin\DashboardController::class,'tabelupdate'] );
Route::delete('/role-table-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class,'tabledelete'] );
///////////////OFFERD ROUTE //////////////
Route::get('/role-offers-show', [App\Http\Controllers\Admin\DashboardController::class,'offersshow'] );
Route::post('/role-add-offers', [App\Http\Controllers\Admin\DashboardController::class,'addoffers'] );
Route::get('/role-offers-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class,'offersedit'] );
Route::put('/role-offers-update/{id}', [App\Http\Controllers\Admin\DashboardController::class,'offersupdate'] );
Route::delete('/role-offers-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class,'offersdelete'] );

    ////////////

///////////////categories ROUTE //////////////
Route::get('/role-categories-show', [App\Http\Controllers\Admin\DashboardController::class,'categoriesshow'] );
Route::post('/role-add-categories', [App\Http\Controllers\Admin\DashboardController::class,'addcategories'] );
Route::get('/role-categories-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class,'categoriesedit'] );
Route::put('/role-categories-update/{id}', [App\Http\Controllers\Admin\DashboardController::class,'categoriesupdate'] );
Route::delete('/role-categories-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class,'categoriesdelete'] );

    /////////////
///////////////Meal ROUTE //////////////
Route::get('/role-meals-show/{idCategory}', [App\Http\Controllers\Admin\DashboardController::class,'mealsshow'] )->name('Meals');
Route::post('/role-add-meals/{idCategory}', [App\Http\Controllers\Admin\DashboardController::class,'addmeals'] );
Route::get('/role-meals-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class,'mealsedit'] );
Route::put('/role-meals-update/{id}', [App\Http\Controllers\Admin\DashboardController::class,'mealsupdate'] );
Route::delete('/role-meals-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class,'mealsdelete'] );

    ////////////


    Route::get('/role-reverses', [App\Http\Controllers\Admin\DashboardController::class,'reversed'] );
    Route::get('/role-reverses-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class,'reversededit'] );
    Route::put('/role-reverses-update/{id}', [App\Http\Controllers\Admin\DashboardController::class,'reversedupdate'] );
    Route::delete('/role-reverses-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class,'reverseddelete'] );
    Route::put('/role-reverses-confirm/{id}', [App\Http\Controllers\Admin\DashboardController::class,'reversedconfirm'] );

    ////////////////


    Route::get('/abouts', [App\Http\Controllers\Admin\AboutusController::class,'index'] );
    Route::post('/save-abouts', [App\Http\Controllers\Admin\AboutusController::class,'store'] );
    Route::get('/about-edit/{id}', [App\Http\Controllers\Admin\AboutusController::class,'aboutedit'] );
    Route::put('/about-update/{id}', [App\Http\Controllers\Admin\AboutusController::class,'aboutupdate'] );
    Route::delete('/about-delete/{id}',  [App\Http\Controllers\Admin\AboutusController::class,'aboutdelete'] );
    Route::get('/service-cat',  [App\Http\Controllers\Admin\ServiceController::class,'index'] );
    Route::get('/service-cat-create',  [App\Http\Controllers\Admin\ServiceController::class,'create'] );
    Route::post('/save-service', [App\Http\Controllers\Admin\ServiceController::class,'store'] );
    Route::get('/service-edit/{id}', [App\Http\Controllers\Admin\ServiceController::class,'serviceedit'] );
    Route::put('role-servece-update/{id}', [App\Http\Controllers\Admin\ServiceController::class,'serviceupdate'] );
    Route::delete('/service-delete/{id}',   [App\Http\Controllers\Admin\ServiceController::class,'servicedelete'] );
    Route::get('/Add_Card',   [App\Http\Controllers\Admin\AddCard::class,'displayCard'] );
    Route::post('/Add_Card',   [App\Http\Controllers\Admin\AddCard::class,'AddCard'] );
    Route::get('/Order_Card',   [App\Http\Controllers\Admin\OrderCard::class,'orderCard'] );
    Route::get('/Delete/{idUser}/{idCard}',   [App\Http\Controllers\Admin\OrderCard::class,'delete'] );
    Route::get('/Update/{idUser}/{idCard}',   [App\Http\Controllers\Admin\OrderCard::class,'accept'] );
    Route::get('/Order_Confirm',   [App\Http\Controllers\Admin\OrederConfirm::class,'confirm'] );
    Route::get('/UpdateConfirm/{idUser}/{idHouse}',   [App\Http\Controllers\Admin\OrederConfirm::class,'accept'] );
    Route::get('/DeleteConfirm/{idUser}/{idHouse}',   [App\Http\Controllers\Admin\OrederConfirm::class,'delete'] );



    Route::get('/role-house', [App\Http\Controllers\HouseController::class,'index'] );
    Route::get('/role-house-edit/{id}', [App\Http\Controllers\HouseController::class,'houseedit'] );
    Route::put('/role-house-update/{id}', [App\Http\Controllers\Admin\HouseController::class,'houseupdate'] );
    Route::delete('/role-house-delete/{id}', [App\Http\Controllers\Admin\HouseController::class,'housedelete'] );



});
