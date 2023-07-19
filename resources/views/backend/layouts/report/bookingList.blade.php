@extends('backend.master')

@section('title')
Booking Report
@endsection


@section('content')
    <!-- page start-->
 <div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                <h3 class="text-center font-weight-bold">Booking Report</h3>

                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <div class="row">
                        <aside class="col-lg-12">
                            <section class="card bg-light">
                                <div class="card-body">
                                    <form action="{{ route('admin.report.booking') }}" method="GET">
                                    <div class="row ">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="from">From Date</label>
                                                <input type="date" value="{{ $fromDate }}" name="from_date" id="from" class="form-control">

                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="to_date"> To Date</label>
                                                <input type="date" value="{{ $toDate }}" name="to_date" id="to_date" class="form-control">

                                            </div>

                                        </div>
                                        <div class="col-4 my-4 pl-sm-0 ">
                                            <div class="form-group text-center p">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" onclick="printDiv()" class="btn btn-success">Print</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                                </div>
                            </section>
                        </aside>

                    </div>

                    <div id="printArea">


                        <table  class="display table table-bordered table-striped" {{-- id="dynamic-table" --}}>
                            <thead>
                                <tr>
                                    <th scope="col">Sl </th>
                                    <th scope="col">Bike Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">From Date</th>
                                    <th scope="col">To Date</th>
                                    <th scope="col">Price/Day</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( count($bookings) > 0)



                                @foreach ($bookings as $key=>$booking )


                                <tr>
                                  <th scope="row">{{ $key+1 }}</th>
                                  <td>{{ $booking->bookingBike->name}}</td>
                                  <td>{{ $booking->bookingUser->name}}</td>
                                  <td>{{ date("Y-M-d",strtotime($booking->from_date)) }}</td>
                                  <td>{{  date("Y-M-d",strtotime($booking->to_date))  }}</td>
                                  <td>{{ $booking->price_per_day }} BDT.</td>
                                  <td>{{ $booking->total_price}} BDT.</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7"><h4 class="text-danger">No data found on those date!.</h4></td>
                                </tr>

                                @endif


                        </table>

                    </div>
                </div>
            </div>
        </section>
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

<!-- page end-->

@endsection
