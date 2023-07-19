@extends('backend.master')

@section('title')
payment-single-view
@stop
@section('content')

  <div class="row">
      <div class="col-10 offset-1">
        <div class="card text-center">
            <div class="card-header ">
              <p class="text-dark">Payment  Single View.</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-justify">
                    <tr>
                        <th>Customer  Name</th>
                        <td>{{ $payment->payBooking->bookingUser->name}}</td>
                    </tr>
                    <tr>
                        <th>Customer  Email</th>
                        <td>{{ $payment->payBooking->bookingUser->email}}</td>
                    </tr>
                    <tr>
                        <th>Customer Contact Number</th>
                        <td>+880-{{ $payment->payBooking->bookingUser->phone}}</td>
                    </tr>
                    <tr>
                        <th>Customer Address</th>
                        <td>{{ $payment->payBooking->bookingUser->address}}</td>
                    </tr>
                    <tr>
                        <th>Bike Name</th>
                        <td>{{ $payment->payBooking->bookingBike->name}}</td>
                    </tr>

                    <tr>
                        <th>Booking Amount</th>
                        <td>{{ $payment->payBooking->total_price}}.00 TK</td>
                    </tr>
                    <tr>
                        <th>Payment Amount</th>
                        <td>{{ $payment->amount}}.00 TK</td>
                    </tr>
                    <tr>
                        <th>Payment Method</th>
                        <td>{{ $payment->payment_method}}</td>
                    </tr>
                    <tr>
                        <th>Tranction  Id</th>
                        <td>{{ $payment->transaction_id}}</td>
                    </tr>
                    <tr>
                        <th>Payment Time</th>
                        <td>{{ date("h:i:s a", strtotime($payment->pay_time)) }}</td>
                    </tr>
                    <tr>
                        <th>Payment Date</th>
                        <td>{{ date("Y-M-D", strtotime($payment->pay_date))}}</td>
                    </tr>


                </table>

            </div>
            <div class="card-footer  text-right">
                <a href="{{ route('admin.payment.list') }}" class="btn btn-secondary">Go Back</a>
            </div>
          </div>

      </div>

  </div>

@stop
