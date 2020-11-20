<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\cart;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{
//    public function cartFunc(){
//
//        return view('frontend.cart.cart');
//    }

    public function index()
    {
        return view('frontend.cart.cart');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required'
        ],
            [
                'product_id.required' => 'Please give a product'
            ]);

        if (session()->has('user')) {
            $cart = cart::where('user_id', session()->has('user'))
                ->where('product_id', $request->product_id)
                ->where('order_id', NULL)
                ->first();
        }else {
            $cart = cart::where('ip_address', request()->ip())
                ->where('product_id', $request->product_id)
                ->where('order_id', NULL)
                ->first();
        }

        if (!is_null($cart)) {
            $cart->increment('product_quantity');
        }else {
            $cart = new Cart();
            if (session()->has('user')) {
                $cart->user_id = session('userId');
            }
            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();
        }

        session()->flash('success', 'Product has added to cart !!');
        return back();
    }


//    public function update(Request $request, $id)
//    {
//        $cart = Cart::find($id);
//        if (!is_null($cart)) {
//            $cart->product_quantity = $request->product_quantity;
//            $cart->save();
//        }else {
//            return redirect()->route('carts');
//        }
//        session()->flash('success', 'Cart item has updated successfully !!');
//        return back();
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        $cart = cart::find($id);
//        if (!is_null($cart)) {
//            $cart->delete();
//        }else {
//            return redirect()->route('carts');
//        }
//        session()->flash('success', 'Cart item has deleted !!');
//        return back();
//    }

    public function details()
    { $ip=request()->ip();
         if (session()->has('user')) {
           /* $carts = cart::where('user_id', ession()->has('usser'))
                ->orWhere('ip_address', request()->ip())
                ->where('order_id', NULL)
                ->get();
            */
            $id=session('userId');
            $carts= DB::select("SELECT p.id as pid,p.title,c.id as cid,p.price,c.product_quantity,p.slug,p.size,p.color,pi.image FROM products p inner join carts c on p.id=c.product_id  inner join product_images pi on p.id=pi.product_id
            where  (user_id=$id or ip_address='$ip') and (order_id is NULL or order_id='') group by p.id");
        }else {
            //$carts = cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
            $carts= DB::select("SELECT p.id as pid,p.title,c.id as cid,p.price,c.product_quantity,p.slug,p.size,p.color,pi.image  FROM products p inner join carts c on p.id=c.product_id
                                  inner join product_images pi on p.id=pi.product_id where ip_address='$ip' and order_id is NULL or order_id='' group by p.id ");
        }
        //if($carts != null){
        //dd($cart);
           return view('frontend.cart.cart')->with(compact('carts'));
        //}

    }
    public function UnitChange(Request $request){
         $this->autoRender = false;
        //$user = $this->Auth->user();
        //$session = $this->request->getSession();
            $data =  $request->input('unit');
            $cart_id =  (int)$request->input('cart_id');
            if( $data != null && $data != '' && $data > 0 && $cart_id != NULL && $cart_id !='')
            {
                DB::update('update carts set
                            product_quantity = ?
                            where id = ?',
                            [$data,
                            $cart_id]);
                Session::flash('message', 'Cart Updated Successfully!!!!');


                 //$sql="SELECT supplier_comp_name FROM suppliers WHERE supplier_comp_code ='$q' Limit 1";
                 //$query = $conn->execute($sql);
                 //$result = $query->fetchAll('assoc');
                 return response()->json('Cart Updated Successfully!!!!');
            }else{
                return response()->json('Cart Updated Faild!!!!');
            }
    }
    public function deletecart(Request $request){
            $this->autoRender = false;
            $cart_id =  (int)$request->input('cart_id');
            DB::table('carts')->where('id', $cart_id)->delete();
            return response()->json('Cart Updated Successfully!!!!');
    }
    public function colorchange(Request $request){
         $this->autoRender = false;
        //$user = $this->Auth->user();
        //$session = $this->request->getSession();
            $data =  $request->input('color');
            $cart_id =  (int)$request->input('cart_id');
            if( $data != null && $data != '' && $data != 'Choose one' && $cart_id != NULL && $cart_id !='')
            {
                DB::update('update carts set
                            color = ?
                            where id = ?',
                            [$data,
                            $cart_id]);
                Session::flash('message', 'Cart Updated Successfully!!!!');


                 //$sql="SELECT supplier_comp_name FROM suppliers WHERE supplier_comp_code ='$q' Limit 1";
                 //$query = $conn->execute($sql);
                 //$result = $query->fetchAll('assoc');
                 return response()->json('Cart Updated Successfully!!!!');
            }else{
                return response()->json('Cart Updated Faild!!!!');
            }
    }
    public function sizechange(Request $request){
         $this->autoRender = false;
        //$user = $this->Auth->user();
        //$session = $this->request->getSession();
            $data =  $request->input('size');
            $cart_id =  (int)$request->input('cart_id');
            if( $data != null && $data != '' && $data != 'Choose one' && $cart_id != NULL && $cart_id !='')
            {
                DB::update('update carts set
                            size = ?
                            where id = ?',
                            [$data,
                            $cart_id]);
                Session::flash('message', 'Cart Updated Successfully!!!!');


                 //$sql="SELECT supplier_comp_name FROM suppliers WHERE supplier_comp_code ='$q' Limit 1";
                 //$query = $conn->execute($sql);
                 //$result = $query->fetchAll('assoc');
                 return response()->json('Cart Updated Successfully!!!!');
            }else{
                return response()->json('Cart Updated Faild!!!!');
            }
    }
}
