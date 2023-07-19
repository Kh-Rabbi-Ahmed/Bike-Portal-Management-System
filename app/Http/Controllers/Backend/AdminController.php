<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Bike;
use App\Models\Booking;
use App\Models\Insurance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        $bike = Bike::all();
        $customer = User::where('role', '=', 'customer')->get();
        $booking = Booking::all();
        $insurance = Insurance::all();

        return view('backend.layouts.dashboard',\compact('bike','customer','booking','insurance'));
    }
    public function login(){
        return \view('backend.auth.login');
    }
    public function Dologin(Request $request){
          $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',

        ]);


        $loginData=$request->only('email','password');
        if(Auth::attempt($loginData)){
            $request->session()->regenerate();
            session()->flash('type','success');
            session()->flash('message','Login Success.');
          return redirect()->route('admin.dashboard');
        }else{
          session()->flash('type','danger');
          session()->flash('message','These credentials do not match our records.');
          return redirect()->back();
      }

    }

    public function logout(){
        Auth::logout();

          session()->flash('type','success');
          session()->flash('message','Logout Successful.');
          return redirect()->route('admin.login');

    }
}
