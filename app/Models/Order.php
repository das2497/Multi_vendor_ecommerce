<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_id',
        'customer_id',
        'special_note',
        'total_price',
        'address_id',
        'shipping_cost',
        'payment_option',
        'rider_id',
        'status',
    ];
}
