@extends('backend.master')

@section('title')
insurance-setup
@endsection


@section('content')
    <!-- page start-->
 <div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                <h3 class="text-center font-weight-bold text-uppercase">Insurance Setup Table</h3>
            </header>
            <div class="row">
                <div class="col-md-12">
             @if(session('message'))
                <div class="text-center alert alert-{{ session('type') }}">
                    <p class="text-center text-bolder">{{ session('message') }}</p>
                </div>
            @endif
                </div>
            </div>
            <div class="card-body">
                <div class="adv-table">

                    <a href="{{ route('admin.insurance.create') }}" class="btn btn-primary mb-2">
                        <span class="text-light">Add New</span>
                    </a>


                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Insurance Name</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Insurance Fee</th>
                                <th scope="col">Insurance Coverage</th>
                                <th scope="col">Insurance Status</th>

                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($insurances as $key => $insurance)


                           <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $insurance->name }}</td>
                              <td>{{ $insurance->company_name }}</td>
                              <td>{{ $insurance->insurance_fee.'.00'}} TK.</td>
                             <td><a href="{{ route('admin.insurance.show',$insurance->id) }}" class="text-primary">Click Here</a></td>
                              <td>{{ Str::ucfirst($insurance->status) }}</td>
                              <td class="text-center d-flex">
                                <a class="btn btn-info btn-sm " href="{{ route('admin.insurance.show',$insurance->id) }}"><i class="far fa-eye text-dark"></i></a>
                                <a class="btn btn-success btn-sm ml-1 " href="{{ route('admin.insurance.edit',$insurance->id) }}"><i class="far fa-edit text-dark"></i></a>
                                <a type="submit" class="btn btn-danger btn-sm  mx-1 delete" href=" {{ route('admin.insurance.delete',$insurance->id) }}"><i class="fas fa-trash text-dark"></i></a>
                            </td>
                            </tr>
                            @endforeach
                            <tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- page end-->

@endsection
