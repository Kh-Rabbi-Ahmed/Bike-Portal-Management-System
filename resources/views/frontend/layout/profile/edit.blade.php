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
           <!--Validation Message-->
           <div class="row">
            <div class="col-md-12">
            @if(session('message'))
            <div class="text-center alert alert-{{ session('type') }}">
                <p class="text-center text-bolder">{{ session('message') }}</p>
            </div>
        @endif
            </div>
        </div>
        <div class="card-header ">
          <p class="text-dark font-weight-bold text-center"> Profile Update</p>
        </div>
        <div class="card-body">
            <form action="{{ route('kbr.user.profile.update',$userEdit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name"   value="{{ $userEdit->name }} ">
                    @error('name') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" class="form-control @error('name')is-invalid @enderror" id="email" name="email"   value="{{ $userEdit->email }} ">
                  @error('email') <span class="text-danger font-italic">{{ $message }}</span> @enderror


                </div>
                <div class="form-group">
                    <label for="image">Upload Photo</label>
                   <input type="file" name="image" id="image" class=" form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Contact Number</label>
                    <input type="number"class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="0{{ $userEdit->phone }}">
                    @error('phone') <span class="text-danger text-italic">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{ $userEdit->address }} </textarea>
                    @error('address') <span class="text-danger text-italic">{{ $message }}</span>@enderror
                </div>



            <div class="card-footer  text-right">
                <a href="{{ route('kbr.user.profile.home') }}" class="btn btn-secondary text-light" data-bs-dismiss="modal">Back</a>
                <button type="submit"   class="btn btn-secondary text-light" >Update</button>
            </div>

        </form>
          </div>
    </div>


</div>

@stop
