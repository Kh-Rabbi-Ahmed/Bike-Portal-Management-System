@extends('frontend.master')


@section('title')

KBR- Login Here

@stop


@section('content')

<section class="pt-100 pb-100 bg-gray">
    <div class="container">
        <div class="row ">

            <div class="col-lg-6 offset-3" data-wow-duration="2s" data-wow-delay="0.2s">
                @if(session('message'))
                <p class="text-center py-2  alert alert-{{ session('type') }}">{{ session('message') }}</p>
                @endif
                <h4 class="text-center">User Login </h4>
                <form action="{{ route('kbr.user.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                      @error('email') <span class="text-danger ">{{ $message }}</span> @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                      @error('password') <span class="text-danger ">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>


            </div>
        </div>
    </div>
</section>



@stop
