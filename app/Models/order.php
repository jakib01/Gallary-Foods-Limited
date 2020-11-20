<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $fillable = [
        'user_id',
        'ip_address',
        'payment_id',
        'name',
        'phone_no',
        'shipping_address',
        'email',
        'message',
        'is_paid',
        'is_completed',
        'is_seen_by_admin',
        'transaction_id',
        'total_price',
        'total_price_with_shipping_cost'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);  //this will return that the order model is belongs to User model
    }

    public function carts()
    {
        return $this->hasMany(cart::class); //this will return that the order model is belongs to cart model
    }
}
