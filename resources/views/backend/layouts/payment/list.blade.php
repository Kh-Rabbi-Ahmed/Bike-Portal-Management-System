@extends('backend.master')

@section('title')
payment-manage
@endsection


@section('content')
    <!-- page start-->
 <div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                <h3 class="text-center font-weight-bold text-uppercase">Payment History </h3>

                <div class="row">
                    <div class="col-md-12">
                 @if(session('message'))
                    <div class="text-center alert alert-{{ session('type') }}">
                        <p class="text-center text-bolder">{{ session('message') }}</p>
                    </div>
                @endif
                    </div>
                </div>

                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">




                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Booking User Name</th>
                                <th scope="col">Transaction Number</th>
                                <th scope="col">Payment Amount</th>
                                <th scope="col">Payment Time</th>
                                <th scope="col">Payment Date</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $key =>$payment )
                           <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $payment->payBooking->bookingUser->name}}</td>
                            <td>{{ $payment->transaction_id }}</td>
                            <td>{{ $payment->amount }}.00 TK</td>
                            <td>{{ date("h:i:s a", strtotime($payment->pay_time)) }}</td>
                            <td>{{ date("Y-M-d",strtotime($payment->pay_date ))}}</td>
                            <td>{{ $payment->payment_method }}</td>
                              <td class="text-center d-flex justify-content-center">
                                <a class="btn btn-info btn-sm " href="{{ route('admin.payment.show',$payment) }}">
                                    <i class="far fa-eye text-dark"></i>
                                </a>
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

