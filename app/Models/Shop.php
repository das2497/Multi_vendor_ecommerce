<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';
    protected $fillable = [
        'unique_id',
        'name',
        'email',
        'category',
        'contact',
        'address',
        'zone',
        'img',
        'status'
    ];
}
