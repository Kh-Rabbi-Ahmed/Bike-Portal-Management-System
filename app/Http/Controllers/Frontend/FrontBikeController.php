<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Bike;
use App\Models\Insurance;
use Illuminate\Http\Request;

class FrontBikeController extends Controller
{
    public function bikes(){
        $bikes = Bike::all();
        return view('frontend.layout.bike.bikes',\compact('bikes'));
    }

    public function singleview($id){
        $bike = Bike::find($id);
        $insurances = Insurance::all();
        return view('frontend.layout.bike.singleview',\compact('bike','insurances'));
    }
}
