<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address_book extends Model
{
    use HasFactory;

    protected $table = 'address_books';

    protected $fillable = [
        'customer_id',
        'receiver_name',
        'address_1',
        'zone',
        'contact_1',
        'contact_2',
        'state',
    ];
}
