<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'unique_id',
        'shop',
        'name',
        'description',
        'category',
        'sub_category',
        'price',
        'qty',
        'sold',
        'ratings',
        'brand',
        'img1',
        'img2',
        'img3',
    ];
}
