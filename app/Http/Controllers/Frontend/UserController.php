<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registrationFrom(){
        return view('frontend.layout.user.registrationForm');
    }
    public function register (Request $request){

        $request->validate([
          'name' => 'required|string|min:4',
          'email' => 'required|email|unique:users',
          'phone' => 'required|min:11|max:11|unique:users',
          'nid_number' => 'required|min:11|max:16|unique:users',
          'password' => 'required|min:6|max:16',
          'password' => 'required|min:6|max:16|confirmed',

        ]);


        try{

              $filename = " ";
          if($request->hasFile('image')){
              $image = $request->file('image');
              if($image->isValid()){
                  $filename = date('Ymdhms').'.'.$image->getClientOriginalExtension();
                  $image->storeAs('users',$filename);
              }
          }

         $user = User::create([
              'name' => $request->name,
              'email' => $request->email,
              'phone' => $request->phone,
              'role' => 'customer',
              'password' =>bcrypt($request->password),
              'image' =>$filename,
              'nid_number' =>$request->nid_number,
              'address' =>$request->address,
              ]);
              //mail Notification



              session()->flash('type','success');
              session()->flash('message','Your Registration is Successfull,Now You Can Login');
        }catch(Exception $e){
          session()->flash('type','danger');
          session()->flash('message',$e->getMessage());
          return \redirect()->back();

        }
        return \redirect()->back();


      }
    public function loginForm(){

        return view('frontend.layout.user.loginFrom');
    }
    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
          ]);

          $loginData=$request->only('email','password');
          if(Auth::attempt($loginData)){


            session()->flash('type','success');
            session()->flash('message','Login Success.');
            return redirect()->intended(route('kbr.home'));
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
        return redirect()->route('kbr.user.login.form')->with('success','Logout Successful.');

    }
}
