<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
//    public function productFunc(){
//
//        return view('frontend.product.singleproduct');
//    }


//    public function showimageFunc( Request $request)
//    {
////        $data = $request->input();
//        $image = DB::table('product_images')->select('image')->where(['image'=> $request->image])->first();
//        return view('frontend.product.singleproduct')->with(compact(image));
////        $images= \App\Models\product:: orderBy('id','asc')->get();
////        return view('frontend.product.singleproduct')->with(compact('images'));
//    }

    public function show($slug){
        $product = \App\Models\product::where('slug', $slug)->first();
        if (!is_null($product)) {
             $images = DB::select("Select image from product_images where product_id=$product->id");
             $colors = DB::select("Select color from products where id=$product->id");
            return view('frontend.product.singleproduct')->with(compact('product','images','colors'));
        }
        else{
            session()->flash('error','no product found');
//            return redirect()->route('productlist');
//            return redirect('/');
            echo $product;
        }
    }
}
