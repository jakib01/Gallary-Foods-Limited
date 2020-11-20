<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductCategoryMappingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\OrderController;
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

//Route::get('/',[pagesController::class, 'homeFunc']);
//Route::get('/products','pagesController@products');

Route::get('/',[CategoryController::class, 'categoryFunc'])->name('home');  //home page featching data from DB

Route::get('/subcategory/{id}', [ProductCategoryMappingController::class, 'subcategoryFunc']);  //show all subcategory from a category
Route::get('/productslist/{c_id}', [ProductCategoryMappingController::class, 'productslistFunc'])->name('productlist'); //show all product from a subcategory
route::get('/product/{slug}',[ProductController::class,'show']);

// Cart Routes
Route::group(['prefix' => 'carts'], function(){
    Route::get('/', [CartController::class, 'details'])->name('carts.details');
    Route::post('/store', [CartController::class,'store'])->name('carts.store');
    Route::post('/update/{id}', 'Frontend\CartsController@update')->name('carts.update');
    Route::post('/delete/{id}', 'Frontend\CartsController@destroy')->name('carts.delete');
});
//Route::get('/cart', [CartController::class, 'cartFunc']);  //single product show

// Checkout Routes
Route::group(['prefix' => 'order'], function(){
    Route::get('/', [OrderController::class,'index'])->name('orders');
    Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
});


//route::get('/signup',[pagesController::class, 'signupFunc']);
route::view('/signup','frontend/pages/signup');
route::post('/signup',[RegistrationController::class, 'RegistrationUser']);
route::post('/signup/introducerValidate',[RegistrationController::class, 'introducerValidate']);
route::post('/unitupdate',[CartController::class, 'UnitChange']);
route::post('/deletecart',[CartController::class, 'deletecart']);
route::post('/colorupdate',[CartController::class, 'colorchange']);
route::post('/sizeupdate',[CartController::class, 'sizechange']);





//login with all session -------------------------------------------------------------------------------------------------------------------------------------------


route::post('/user',[LoginController::class, 'userLoginFunc']);
route::post('/updateuser',[LoginController::class, 'edituserprofileFunc']);

route::get('/login',function(){
        if(session()->has('user'))
        {
            return redirect ('profile');
        }
        return view('frontend/pages/login'); //showing the login page
    });
route::get('/logout',function(){
        if(session()->has('user'))
        {
            session()->pull('user');
        }
        return redirect('login');
    });

route::get('/afterloginhome',[LoginController::class, 'afterloginFunc']); //for the user profile view finction
route::get('/userprofile',[LoginController::class, 'userprofileFunc']); //for the user profile view finction
route::get('/edituserprofile',[LoginController::class, 'edituserprofileFunc']); //for the user profile view finction





route::get('/productsNavbar',[pagesController::class, 'productsNavbarFunc'])->name('productsNavbar'); //for the user profile view finction
route::get('/aboutNavbar',[pagesController::class, 'aboutNavbarFunc'])->name('aboutNavbar'); //for the user profile view finction




//login with session End -------------------------------------------------------------------------------------------------------------------------------------------




//single product display -------------------------------------------------------------------------------------------------------------------------------------------



//End single product display -------------------------------------------------------------------------------------------------------------------------------------------
