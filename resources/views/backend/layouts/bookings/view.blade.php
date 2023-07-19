@extends('backend.master')

@section('title')

booking-single-view

@stop
@section('content')

  <div class="row">
      <div class="col-8 offset-2">
        <div class="card text-center">
            <div class="card-header ">
              <p class="text-dark fa-2x">Booking Single Info.</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered  text-justify">
                    <tr>
                        <th scope="col">Bike Name</th>
                        <td>{{ $booking->bookingbike->name}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Bike Number Plate</th>
                        <td>{{ $booking->bookingBike->number}}</td>
                    </tr>

                    <tr>
                        <th>Bike  Image</th>
                        <td>
                            <img width="100px" class="img-thumbnail" src="{{ url('/uploads/bikes/'.$booking->bookingBike->image) }}" alt="">
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Booking Date</th>
                        <td>{{ date("Y-M-d",strtotime($booking->from_date)) }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Return Date</th>
                        <td>{{  date("Y-M-d",strtotime($booking->to_date))  }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Total Days</th>
                        <td>
                            @php
                             $daysCalculation = (strtotime($booking->to_date)-strtotime($booking->from_date));
                             $daysCalculation = round(($daysCalculation / (60 * 60 * 24))+1);
                            echo $daysCalculation." Days";
                         @endphp
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Price/Day</th>
                        <td>{{ $booking->price_per_day }} BDT</td>
                    </tr>
                    <tr>
                        <th scope="col">Bike Disscount Amount</th>
                        <td>{{ $booking->bookingBike->discount_offer.'.00' }} BDT</td>
                    </tr>
                    <tr>
                        <th scope="col">Insurance Fee</th>
                        <td>{{ $booking->insurance_fee.'.00' }} BDT</td>
                    </tr>
                    <tr>
                        <th scope="col">Total</th>
                        <td>{{ $booking->total_price}} BDT</td>
                    </tr>
                    <tr>
                        <th scope="col">Customer/User Name</th>
                        <td>{{ $booking->bookingUser->name}} </td>
                    </tr>
                    <tr>
                        <th scope="col">Customer Email</th>
                        <td>{{ $booking->bookingUser->email}} </td>
                    </tr>
                    <tr>
                        <th scope="col">Customer Phone</th>
                        <td>{{ '+880-'.$booking->bookingUser->phone}} </td>
                    </tr>
                    <tr>
                        <th scope="col">Customer Address</th>
                        <td>{{ $booking->bookingUser->address}} </td>
                    </tr>

                    <tr>
                        <th scope="col">Customer Message</th>
                        <td>{{ $booking->details}} </td>
                    </tr>
                    <tr>
                        <th scope="col">Booking Status</th>
                        <td>{{ucfirst($booking->status)}} </td>
                    </tr>





                </table>

            </div>
            <div class="card-footer  text-right">
                <a href="{{ route('admin.booking.manage') }}" class="btn btn-secondary">Go Back</a>
            </div>
          </div>

      </div>

  </div>

@stop
