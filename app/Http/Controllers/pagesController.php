<?php

namespace App\Http\Controllers;

//use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pagesController extends Controller
{
 function signupFunc()
    {
       return view('frontend.pages.signup');
    }

    public function loginFunc()
    {
        return view('frontend.pages.login');
    }


    public function productsNavbarFunc()
    {
        $categories_item = DB::table('categories')->select('id','name','image','parent_id','created_at','updated_at')->where('parent_id', '0')->get();
        return view('frontend.navbarChanges.productsNavbar.productsNavbar')->with(compact('categories_item'));
    }

    public function aboutNavbarFunc()
    {
        $categories_item = DB::table('categories')->select('id','name','image','parent_id','created_at','updated_at')->where('parent_id', '0')->get();
        return view('frontend.navbarChanges.aboutNavbar.aboutNavbar')->with(compact('categories_item'));
    }

}

