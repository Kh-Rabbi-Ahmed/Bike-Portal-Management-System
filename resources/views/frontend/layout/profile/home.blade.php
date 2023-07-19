@extends('frontend.master')

@section('content')

<div class="row m-5 bg-secondary">
    <div class="col-3 my-5">
        <div class="card" style="width: 18rem;">
            <h4 class="text-center">Your Profile</h4>
            <img class="card-img-top img-fluid rounded-circle px-5" height="20px" src="{{ asset('uploads/users/'.auth()->user()->image) }}" alt="Card image cap">
            <div class="card-body">
                <ul style="">
                    <li class="pb-1"> <a href="{{ route('kbr.user.profile.home') }}"><i class="fa fa-user"></i> {{ auth()->user()->name }}</a></li>
                    <li class="py-1"><a href="{{ route('kbr.user.booking.history') }}" ><i class="fa fa-book"></i> Booking History</a></li>
                    <li class="py-1"><a href=" {{ route('kbr.user.edit.password') }} " ><i class="fas fa-exchange-alt"></i> Change Password</a></li>
                    <li class="py-1"><a href="{{ route('kbr.user.logout') }}" ><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>

            </div>
          </div>

    </div>
    <div class="col-9 my-5">
        <div class="card">
          <div class=" d-flex justify-content-between">
            <h5 class="card-header">Your Information</h5>
            <a class="btn btn-success mt-2 mr-2" href="{{ route('kbr.user.profile.edit',auth()->user()->id) }}">Edit</a>
          </div>
            <div class="card-body">
              <h5 class="card-title">Name: {{ auth()->user()->name }}</h5>
              <h5 class="card-title">Email: {{ auth()->user()->email }}</h5>
              <h5 class="card-title">Contact Number: {{ auth()->user()->phone }}</h5>
              <h5 class="card-title">NID Number: {{ auth()->user()->nid_number }}</h5>
              <h5 class="card-title">Role: {{ auth()->user()->role }}</h5>
              <h5 class="card-title">Address: {{ auth()->user()->address }}</h5>

            </div>
          </div>
    </div>


</div>

@stop
