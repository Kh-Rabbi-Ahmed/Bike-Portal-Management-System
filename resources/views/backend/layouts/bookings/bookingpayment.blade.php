@extends('backend.master')

@section('title')

Payment-History

@stop
@section('content')


  <div class="row my-3">
      <div class="col-md-5 col-sm-12">



      </div>
      <div class="col-md-12 col-sm-12">


            <div class="card ">
                <div class="card-header d-flex  justify-content-between ">
                 <h5 class="text-dark text-center">Payment History</h5>
                 <a class="btn btn-info" href="{{ route('admin.booking.payment.show',$booking->id) }}">Do Payment</a>
                </div>
                <div id="printArea">
                    <div class="card-body">
                       <div class="">
                        <h5 class="text-center text-dark font-weight-bold">Your Invoice</h5>


                       </div>
                        <div class="text-center">
                            {{-- <h4><span class="text-danger font-weight-bold">Sarker</span> <span class="text-dark font-weight-bold">Cars</span></h4> --}}
                            <div class="logo">


                            </div>
                            <ul style="font-size: 15px" class="list-group list-group-flush text-left  p-3">
                                <li class=" d-flex justify-between font-weight-bolder fx-2">Customer Name :
                                    <span class="text-dark  pl-2">{{ucfirst( $booking->bookingUser->name )}}</span>
                                </li>
                                <li class="  font-weight-bolder fx-2">Customer Email :
                                    <span class="text-dark  pl-2">{{ Str::ucfirst($booking->bookingUser->email) }}</span>
                                </li>
                                <li class="  font-weight-bolder fx-2">Customer Phone :
                                    <span class="text-dark  pl-2">{{ '+880-'.$booking->bookingUser->phone }}</span>
                                </li>
                                <li class="  font-weight-bolder"> Bike Name :
                                    <span class="text-dark pl-2">{{ $booking->bookingBike->name }}</span>
                                </li>
                                <li class="  font-weight-bolder"> Bike Barnd :
                                    <span class="text-dark pl-2">{{ $booking->bookingBike->brand }}</span>
                                </li>
                                <li class="  font-weight-bolder"> Bike Engine :
                                    <span class="text-dark pl-2">{{ $booking->bookingBike->car_engine }}</span>
                                </li>
                                <li class="  font-weight-bolder"> Rent/Day :
                                    <span class="text-dark pl-2">{{ $booking->bookingBike->price_per_day }}.00 TK.</span>
                                </li>
                                <li class="  font-weight-bolder"> Bike Discount Offer :
                                    <span class="text-dark pl-2">{{ $booking->bookingBike->discount_offer.'.00 TK' }}</span>
                                </li>
                                <li class="  font-weight-bolder"> Booking Insurance Fee :
                                    <span class="text-dark pl-2">{{ $booking->bookingBike->insurance_fee.'.00 TK' }}</span>
                                </li>
                                <li class="  font-weight-bolder"> Booking Date :
                                    <span class="text-dark pl-2">{{ date('Y-m-d', strtotime($booking->from_date)) }}</span>
                                </li>
                                <li class="  font-weight-bolder"> Return Date :
                                    <span class="text-dark pl-2">{{ date('Y-m-d', strtotime($booking->to_date)) }}</span>
                                </li>

                                <li class="  font-weight-bolder"> Total Amount :
                                    <span class=" pl-2" >{{ $booking->total_price }}.00 TK.</span>
                                </li>
                                <li class="  font-weight-bolder"> Due Amount :
                                    <span class="text-dark pl-2">{{ $booking->due }}.00 TK.</span>
                                </li>


                            </ul>
                        </div>
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Tranaction Id</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Pyament Method</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment )


                                <tr>
                                    <td>{{ $payment->transaction_id }}</td>
                                    <td>{{ date("h:i:s a", strtotime($payment->pay_time)) }}</td>
                                    <td>{{ date("Y-m-D", strtotime($payment->pay_date)) }}</td>
                                    <td>{{ $payment->amount }}.00 TK</td>
                                    <td class="text-center">{{ $payment->payment_method }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>


                    </div>

                </div>
                <div class="card-footer  bg-info">
                    <a class="btn btn-secondary" href="{{ route('admin.booking.manage') }}"> Back</a>
                    <button type="button" onclick="printDiv()" class="btn btn-secondary text-white" >
                        Print/Download
                    </button>
                </div>

              </div>



      </div>

  </div>

  <script type="text/javascript">

    function printDiv(){
        var printContents = document.getElementById("printArea").innerHTML;
        var orginalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = orginalContents;
    }

</script>


@stop
