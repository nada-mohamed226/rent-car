<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'type',
        'transmission',
        'seats',
        'price_per_day',
        'image',
        'description',
    ];
}
