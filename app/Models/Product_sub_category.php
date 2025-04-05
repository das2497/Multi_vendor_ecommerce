<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_sub_category extends Model
{
    use HasFactory;

    protected $table = 'product_sub_categories';

    protected $fillable = [
        'name',
        'main_category',
        'img'
    ];
}
