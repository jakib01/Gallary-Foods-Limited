<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'ip_address',
        'product_quantity',
        'color',
        'size'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); //this will return that the cart model is belongs to User model
    }

    public function order()
    {
        return $this-> belongsTo(order::class); //this will return that the cart model is belongs to order model
    }

    public function product()
    {
        return $this->belongsTo(product::class); //this will return that the cart model is belongs to product model
    }

    public static function totalCarts()
    {
        if (session()->has('user')) {
            if(session()->has('user') !=null){
                $carts = cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();

                 }
                else{
                    $carts = cart::where('user_id', session()->has('user'))
                    ->where('order_id', null)
                    ->orwhere('ip_address',  request()->ip())
                    ->where('order_id', '')
                    ->get();
                    dd('else');
                 }

        }else {
            $carts = cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        }
        return $carts;
    }

    public static function totalItems()
    {
        $carts = cart::totalCarts();

        $total_item = 0;
        foreach ($carts as $cart) {
            $total_item += $cart->product_quantity;
        }
        return $total_item;
    }
}
