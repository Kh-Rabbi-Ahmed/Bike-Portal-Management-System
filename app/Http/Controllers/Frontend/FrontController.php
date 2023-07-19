<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function master(){
        return view('frontend.master');
    }

    public function home(){
        return view('frontend.layout.home');
    }
    public function about(){
        return view('frontend.layout.about');
    }
    public function terms(){
        return view('frontend.layout.terms');
    }
    public function contuctus(){
        return view('frontend.layout.contuctus');
    }
}


