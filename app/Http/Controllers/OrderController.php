<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        $data = DB::table('users')->select('id','first_name','last_name','phone_no','phone_code','created_at','email','father_name',
//        'mother_name','gender','nominee_name','nominee_relation','occupation','post_code','date_of_birth','country','shipping_address','street_address','nominee_address','avatar')->where(['id'=> $userId])->first();
//        return view('frontend.order.order')->with(compact('data'));
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('frontend.order.order')->with(compact('payments'));
//        return view('frontend.order.order');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'phone_no'  => 'required',
            'shipping_address'  => 'required',
            'payment_method_id'  => 'required'
        ]);

        $order = new order();

        // check transaction ID has given or not
        if ($request->payment_method_id !== 'cash_in') {
            if ($request->transaction_id == NULL || empty($request->transaction_id)) {
                session()->flash('sticky_error', 'Please give transaction ID for your payment');
                return back();
            }
        }

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone_no = $request->phone_no;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->ip_address = request()->ip();
        $order->transaction_id = $request->transaction_id;
        $order->total_price = $request->total_price;
        $order->total_price_with_shipping_cost = $request->total_price_with_shipping_cost;


        if (session()->has('user')) {
            $order->user_id = session('userId');
        }

        $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
        $order->save();

        foreach (cart::totalCarts() as $cart) {
            $cart->order_id = $order->id;
            if (session()->has('user')) {
                $cart->user_id = session('userId');
            }

            $cart->save();
        }

        session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
        return redirect('/');
    }
}
