@extends('frontend.master')


@section('title')

KBR- Register Here

@stop


@section('content')

<section class="pt-100 pb-100 bg-gray">
    <div class="container">
        <div class="row ">

            <div class="col-lg-8 wow fadeInRight offset-2" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="row">
                    <div class="col-md-8 offset-2">
                      @if(session('message'))
                      <div class="alert alert-{{ session('type') }}">
                           <p class="text-center font-weight-bolder text-dark">{{ session('message') }}</p>
                      </div>
                    @endif

                    </div>

                </div>
                <h2 class="mb-4 text-center">Register Here</h2>
                <form action=" {{ route('kbr.user.register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-lg-between">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 offset-2 offset-sm-2" data-aos="fade-up" data-aos-delay="500">
                            <div class="form_item">
                                <input type="text" name="name" placeholder="Your Name*" class=" form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name') <span class="text-danger ">{{ $message }}</span> @enderror
                            </div>
                            <div class="form_item">
                                <input type="email" name="email" placeholder="Your Email*"
                                class=" form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email') <span class="text-danger ">{{ $message }}</span> @enderror
                            </div>

                            <div class="form_item">
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Phone Number*">
                                @error('phone') <span class="text-danger ">{{ $message }}</span> @enderror
                            </div>
                            <div class="form_item">
                                <input type="number" name="nid_number" class="form-control @error('nid_number') is-invalid @enderror" value="{{ old('nid_number') }}" placeholder="NID Number(123-9)*">
                                @error('nid_number') <span class="text-danger ">{{ $message }}</span> @enderror
                            </div>


                            <div class="form_item">
                                <input type="password" name="password" placeholder="Password*"
                                class=" form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                                @error('password') <span class="text-danger ">{{ $message }}</span> @enderror
                            </div>
                            <div class="form_item">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password*"
                                class=" form-control @error('password') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                                @error('password') <span class="text-danger ">{{ $message }}</span> @enderror
                            </div>
                            <div class="form_item">
                                <input type="file" name="image"   class=" form-control">

                            </div>
                            <div class="form_item">
                                <input type="text" name="address" value="{{ old('address') }}" placeholder="Address*" class="form-control">
                            </div>
                            <button type="submit" class="custom_btn bg_default_red text-uppercase mb-0">
                                Register

                            </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@stop
