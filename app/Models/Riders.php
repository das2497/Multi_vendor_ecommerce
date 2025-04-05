<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riders extends Model
{
    use HasFactory;

    protected $table = 'riders';

    protected $fillable = [
        'name',
        'email',
        'vehicle',
        'contact_1',
        'contact_2',
        'address',
        'currently_status',
        'state',
    ];
}
