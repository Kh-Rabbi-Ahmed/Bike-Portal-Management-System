<?php

namespace App\Models;

use App\Models\backend\Bike;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bookingBike(){
        return $this->belongsTo(Bike::class,'bike_id','id');
    }
    public function bookingUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function bookingDriver(){
        return $this->belongsTo(User::class,'driver_id','id');
    }
    public function bookinInsurance(){
        return $this->belongsTo(Insurance::class,'insurance_id','id');
    }
}
