<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Exception;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances =Insurance::all();
        return \view('backend.layouts.insurance.list', \compact('insurances'));
    }
    public function create()
    {
        return \view('backend.layouts.insurance.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|min:4',
        'company_name' => 'required',
        'insurance_fee' => 'required',
        'coverage' => 'required',
    ]);

        try {
            Insurance::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'insurance_fee' => $request->insurance_fee,
            'coverage' => $request->coverage,
            'status' => $request->status,

        ]);

            session()->flash('type', 'success');
            session()->flash('message', 'Insurance Data Inserted Successfully');
        } catch (Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return \redirect()->back();
        }
        return \redirect()->route('admin.insurance.list');
    }

    public function show($id)
    {
        $insurance  = Insurance::find($id);
        return \view('backend.layouts.insurance.view', \compact('insurance'));
    }

    public function edit($id)
    {

        $insurance  = Insurance::find($id);
        if($insurance)
        return \view('backend.layouts.insurance.edit', \compact('insurance'));
        else
        return \redirect()->back();
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|min:4',
            'company_name' => 'required',
            'insurance_fee' => 'required',
            'coverage' => 'required',
        ]);
        try {
            $insurance = Insurance::find($id);
            $insurance->update([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'insurance_fee' => $request->insurance_fee,
            'coverage' => $request->coverage,
            'status' => $request->status,

        ]);

            session()->flash('type', 'success');
            session()->flash('message', 'Insurance Data Updated Successfully');
        } catch (Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return \redirect()->back();
        }
        return \redirect()->route('admin.insurance.list');


    }


    public function delete($id)
    {
        try {
            $insurance = Insurance::find($id);
            if ($insurance) {
                $insurance->delete();

                session()->flash('type', 'success');
                session()->flash('message', 'Insurance Delete Successfully');
            }
        } catch (Exception $e) {
            session()->flash('type', 'Delete success');
            session()->flash('message', 'Insurance Data Updated Successfully');
            return \redirect()->back();
        }
        return \redirect()->back();
    }

}
