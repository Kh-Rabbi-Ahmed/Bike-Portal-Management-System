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
            <h5 class="card-header">Your Booking History</h5>

          </div>
            <div class="card-body">
                <div class="row">

                    @if(count($bookingHistory) > 0)
                    @foreach($bookingHistory as $key => $history)


                    <div class="col-8">
                     <h3 class="list_title mb_30">{{ $history->bookingBike->name }}</h3>
                     <h6 class="list_title mb_30"><span>Bike Brand:</span>{{ $history->bookingBike->brand }}</h6>
                     <h6 class="list_title mb_30"><span>Bike Engine Number:</span>{{ $history->bookingBike->number }}</h6>
                     <div class="booking-image">

                         <img width="150px" class="img-thumbnail" src="{{ asset('uploads/bikes/'.$history->bookingBike->image) }}" alt="No-Image">

                     </div>
                     <ul class="ul_li_block clearfix"><li>
                         <span>Booking Date:</span> {{  date("Y-M-d",strtotime($history->from_date)) }}</li>
                         <li><span>Return Date:</span>{{  date("Y-M-d",strtotime($history->to_date)) }}</li>
                         <li><span> Rent/Day :</span>{{  $history->price_per_day}}.0 TK</li>
                         <li><span> Bike Discount :</span>{{  $history->bookingBike->discount_offer}}.0 TK</li>
                         <li><span> Booking Insurance :</span>{{  $history->insurance_fee}}.0 TK</li>
                         <li><span>Total Price :</span>{{  $history->total_price}}.0 TK</li>
                         <li><span>Total Days :</span>@php
                          $daysCalculation = (strtotime($history->to_date)-strtotime($history->from_date));
                                 $daysCalculation = round(($daysCalculation / (60 * 60 * 24))+1);
                                echo $daysCalculation." Days";
                             @endphp
                        </li>
                         <li><span>Payment Status:</span> @if($history->due <= 0 )
                             <span class="text-dark">paid <i class="far fa-check-circle text-success"></i></span>
                             @else
                             <span class="text-dark">unpaid <i class="fas fa-times text-danger"></i></span>
                         @endif
                     </li>
                     </ul>


                    </div>

                    <div class="col-4">
                        <div class="status-button">
                           <span class="text-dark font-weight-bold ">Booking: </span>
                     @if($history->status=='confirmed')
                         <a href="#" class="btn btn-success btn-md">{{ Str::ucfirst($history->status) }}</a>
                       @elseif($history->status=='rejected')
                       <a href="#" class="btn btn-danger btn-md">{{ Str::ucfirst($history->status) }}</a>
                       @elseif($history->status=='completed')
                       <a href="#" class="btn btn-primary btn-md">{{ Str::ucfirst($history->status) }}</a>
                       @else
                       <a href="#" class="btn btn-warning btn-md">{{ Str::ucfirst($history->status) }}</a>
                       @endif


                        </div>

                    </div>
                    <hr class="mt-5 " data-aos="fade-up" data-aos-delay="100">
                    @endforeach
                    @else
                    <div class="bg-dark rounded">
                        <span class="text-light p-2 ">No Booking Avaliable.</span>

                    </div>
                    @endif

                   </div>

            </div>
          </div>
    </div>


</div>

@stop
