<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
//    public function products()
    public function categoryFunc()
    {
        $categories_item = DB::table('categories')->select('id','name','image','parent_id','created_at','updated_at')->where('parent_id', '0')->get();
        return view('home')->with(compact('categories_item'));
    }
}
