<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role','=','customer')->get();
        return view('backend.layouts.user.list',\compact('users'));
    }

    public function createCustomer(Request $request){
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|max:11|unique:users',
            'nid_number' => 'required|min:11|max:16|unique:users',
            'password' => 'required|min:6|max:16',
            'password' => 'required|min:6|max:16|confirmed',
            'address' => 'required',
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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nid_number' => $request->nid_number,
            'role' => 'customer',
            'password' =>bcrypt($request->password),
            'image' =>$filename,
            'address' =>$request->address,
            ]);

            session()->flash('type','success');
            session()->flash('message','Customer Data Inserted Successfully');
      }catch(Exception $e){
        session()->flash('type','danger');
        session()->flash('message',$e->getMessage());
        return \redirect()->back();

      }
      return \redirect()->back();
    }
    public function show($id){
        $user = User::find($id);
       return \view('backend.layouts.user.show',\compact('user'));

    }

    public function editCustomer($id){
        $customer  = User::find($id);
        if($customer)
        return \view('backend.layouts.user.edit',\compact('customer'));
        else
        return \redirect()->back();


    }
    public function updateCustomer(Request $request, $id){

        $user = User::find($id);
        if (!$user) return redirect()->back();
    $request->validate([
        'name' => 'required|string|min:4',
        'email' => 'required',
        'phone' => 'required',
        'nid_number' => 'required',
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
        'nid_number' => $request->nid_number,
        'image' =>$filename,
        'address' =>$request->address,

        ]);
        session()->flash('type','success');
        session()->flash('message','Customer Data Updated Successfully');
    }catch(Exception $e){
        session()->flash('type','danger');
        session()->flash('message',$e->getMessage());
        return redirect()->route('admin.user.list');
    }
    return redirect()->route('admin.user.list');

    }



    public function delete($id){
        try{
         $user = User::find($id);
         if($user){

            if (file_exists(public_path('uploads/users/'.$user->image))) {
                unlink(public_path('uploads/users/'.$user->image));
            }
             $user->delete();

         session()->flash('type', 'success');
         session()->flash('message', 'User Delete Successfully');
         }
        }catch(Exception $e){
         session()->flash('type', 'danger');
         session()->flash('message', $e->getMessage());
         return \redirect()->route('admin.user.list');
        }
        return \redirect()->route('admin.user.list');

     }

}
