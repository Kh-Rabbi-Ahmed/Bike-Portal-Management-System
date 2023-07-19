<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'brand',
        'model',
        'year',
        'color',
        'cc',
        'power',
        'torque',
        'odo',
        'number',
        'description',
        'price_per_day',
        'discount_offer',

    ];
}
