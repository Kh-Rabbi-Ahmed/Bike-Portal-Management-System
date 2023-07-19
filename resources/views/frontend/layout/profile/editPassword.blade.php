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

          </div>
          <div class="card-body">
            <form action="{{ route('kbr.user.update.password') }}" method="post" >
                @csrf

                <div class="form-group">
                    <label for="name">Current Password</label>
                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror"  id="password"    value="">
                    @error('old_password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="name">New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password_confirmation"   value="">
                    @error('password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="name">Confirm Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password"   value="">
                    @error('password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                </div>


          </div>



        <div class="card-footer  text-right">

            <button type="submit"  class="btn btn-secondary">Change Password</button>
        </div>

    </form>
          </div>
    </div>


</div>

@stop
