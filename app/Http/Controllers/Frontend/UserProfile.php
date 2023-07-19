<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Rules\UserPassword;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class UserProfile extends Controller
{
   public function index(){
       return \view('frontend.layout.profile.home');
   }
   //user profile editshow method
   public function profileEdit($id){
    $userEdit = User::find(\auth()->user()->id);
    return \view('frontend.layout.profile.edit',\compact('userEdit'));
}

 //user profile update method
 public function profileUpdate(Request $request,$id){
    $user = User::find(\auth()->user()->id);
    if (!$user) return redirect()->back();

    $request->validate([
        'name' => 'required|string|min:4',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
    ]);


    try{
        if($request->hasFile('image')){
            $file = $request->file('image');
            if($file->isValid()){
                $filename = date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('users',$filename);
            }
            if (file_exists(public_path('uploads/users/'.$user->image)))
            unlink(public_path('uploads/users/'.$user->image));
        }else{
            $filename = $user->image;
        }


        $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'image' =>$filename,
        'address' =>$request->address,

        ]);

        session()->flash('type','success');
        session()->flash('message','Update Success');
    }catch(Exception $e){
        session()->flash('type','danger');
        session()->flash('message',$e->getMessage());
        return redirect()->back();
    }
    return redirect()->back();


}

public function bookingHistory(){
    $bookingHistory = Booking::with('bookingBike')->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();

    return view('frontend.layout.profile.bookingHistory',\compact('bookingHistory'));
}

//user passwordshow method
public function password()
{

  return \view('frontend.layout.profile.editPassword');

}


//user update password method
public function updatePassword(Request $request)
{
   $this->validate($request,[
       'old_password' => ['required', new UserPassword()],
       'password'=> 'required|min:6|confirmed'
   ]);

   try{

       auth()->user()->update([
            'password' => \bcrypt($request->password),
       ]);

       Auth::logout();

       session()->flash('type','success');
       session()->flash('message','Password Updated, Please Login Again.');
       return redirect()->route('kbr.user.login.form');


   }catch(Throwable $exception){
       return redirect()->back();
   }


}

}
