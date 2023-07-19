@extends('backend.master')

@section('title')

customer-single-view

@stop
@section('content')

  <div class="row">
      <div class="col-8 offset-2">
        <div class="card text-center">
            <div class="card-header bg-primary">
              <p class="text-light">Customer Single View .</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-justify">

                   <tr>
                       <th>Name</th>
                       <td>{{ $user->name }}</td>
                   </tr>
                   <tr>
                       <th>Image</th>
                       <td><img width="60px" height="60px" src="{{ asset('uploads/users/'.$user->image) }}" alt=""></td>
                   </tr>
                   <tr>
                       <th>Email</th>
                       <td>{{ $user->email }}</td>
                   </tr>
                   <tr>
                       <th>NID Number</th>
                       <td>{{ $user->nid_number }}</td>
                   </tr>
                   <tr>
                       <th>Contact Number</th>
                       <td>+880-{{ $user->phone }}</td>
                   </tr>
                   <tr>
                       <th>Address</th>
                       <td>{{ $user->address }}</td>
                   </tr>
                   <tr>
                       <th>Role</th>
                       <td>{{ Str::ucfirst($user->role) }}</td>
                   </tr>
                </table>

            </div>
            <div class="card-footer bg-primary text-right">
                <a href="{{ route('admin.user.list') }}" class="btn btn-success">Go Back</a>
            </div>
          </div>

      </div>

  </div>

@stop
