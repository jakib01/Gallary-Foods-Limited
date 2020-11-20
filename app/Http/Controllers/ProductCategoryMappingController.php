<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryMappingController extends Controller
{
    public function subcategoryFunc(Request $request){

        $sub_categories_item = DB::select("SELECT ch.name, c.name as p_name, ch.image, ch.id as c_id  FROM categories c inner join categories ch on c.id=ch.parent_id
        where c.id= $request->id");
        if($sub_categories_item == null){
            return redirect()->route('productlist',$request->id);
        }
        return view('frontend.subcategory.subcategoryproduct')->with(compact('sub_categories_item'));
    }

    public function productslistFunc(Request  $request){
        $sub_categories_item1 = DB::select("SELECT  p.id, p.title, p.slug, p.price, pi.image, c.name as pl_name
            FROM products p
            INNER JOIN product_category_mappings pcm on p.id = pcm.product_id
            INNER join categories c on c.id = pcm.category_id
            INNER JOIN product_images pi on pi.product_id = p.id
            WHERE c.id= $request->c_id group by p.id");
        return view('frontend.productslist.productslist')->with(compact('sub_categories_item1'));
    }
}
