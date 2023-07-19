<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    public function index(){

        $data=Bike::paginate(4);
        return view('backend.layouts.bike.bikelist',compact('data'));
    }
    public function create(){
        return view('backend.layouts.bike.bikecreate');
    }

    public function store(request $request){

        $request-> validate([

           'image'=> 'required|image',
           'name'=> 'required|min:2|max:10',
           'brand'=> 'required|min:2|max:10',
           'model'=> 'required|min:2|max:10',
           'year'=> 'required|min:2|max:10',
           'color'=> 'required|min:2|max:100',
           'power'=> 'required|min:2|max:10',
           'torque'=> 'required|min:2|max:10',
           'odo'=> 'required|min:2|max:10',
           'number'=> 'required|min:2|max:10',
           'description'=> 'required|min:2|max:10',
           'price_per_day'=> 'required',
           'discount_offer'=> 'required',


        ]);

        $filename =" ";
        if($request->hasFile('image')){
            $image = $request->file('image');
            if($image->isValid()){
                $filename = date('Ymdhms').'.'.$image->getClientOriginalExtension();
                $image->storeAs('bikes',$filename);
            }
        }
        Bike::create([
            'image' => $filename,
            'name' => $request-> name,
            'brand' => $request-> brand,
            'model' => $request-> model,
            'year' => $request-> year,
            'color' => $request-> color,
            'cc' => $request-> cc,
            'power' => $request-> power,
            'torque' => $request-> torque,
            'odo' => $request-> odo,
            'number' => $request-> number,
            'description' => $request-> description,
            'price_per_day' => $request-> price_per_day,
            'discount_offer' => $request-> discount_offer,
        ]);
        return redirect()->route('admin.bike.list')->with('success','Data Inserted Successfully');
        }
        //bike single view function
        public function show($id){
            $bike = Bike::find($id);
            return view('backend.layouts.bike.bikeview',compact('bike'));
        }
        public function edit($id){
            $bike = Bike::find($id);
            return view('backend.layouts.bike.edit',compact('bike'));
        }
        public function update(Request $request, $id){


            $request-> validate([


                'name'=> 'required|min:2|max:10',
                'brand'=> 'required|min:2|max:10',
                'model'=> 'required|min:2|max:10',
                'year'=> 'required|min:2|max:10',
                'color'=> 'required|min:2|max:100',
                'power'=> 'required|min:2|max:10',
                'torque'=> 'required|min:2|max:10',
                'odo'=> 'required|min:2|max:10',
                'number'=> 'required|min:2|max:10',
                'description'=> 'required|min:2|max:10',
                'price_per_day'=> 'required',
                'discount_offer'=> 'required',
             ]);

            $bike = Bike::find($id);

            if($request->hasFile('image')){
                $file = $request->file('image');
                if($file->isValid()){
                    $filename = date('Ymdhms').'.'.$file->getClientOriginalExtension();
                    $file->storeAs('bikes',$filename);
                }
                if (file_exists(public_path('uploads/bikes/'.$bike->image)))
                unlink(public_path('uploads/bikes/'.$bike->image));
            }else{
                $filename = $bike->image;
            }

         $bike->update([
                'image' => $filename,
                'name' => $request-> name,
                'brand' => $request-> brand,
                'model' => $request-> model,
                'year' => $request->year,
                'color' => $request-> color,
                'cc' => $request-> cc,
                'power' => $request-> power,
                'torque' => $request-> torque,
                'odo' => $request-> odo,
                'number' => $request-> number,
                'description' => $request-> description,
                'price_per_day' => $request-> price_per_day,
                'discount_offer' => $request-> discount_offer,
            ]);
            return redirect()->route('admin.bike.list')->with('success','Data Update Successfully');

        }

        public function delete($id){
            $bike = Bike::find($id);

            if(file_exists(public_path('uploads/bikes/'.$bike->image))) unlink(public_path('uploads/bikes/'.$bike->image));
             $bike->delete();

             return redirect()->back()->with('success','Data Deleted Successfully');
        }// thereshould be some tricks






}
