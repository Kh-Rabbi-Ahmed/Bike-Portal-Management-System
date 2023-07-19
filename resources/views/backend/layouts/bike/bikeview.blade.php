@extends('backend.master')

@section('title')
        Bike-single-view
@stop

@section('content')
<div class="col-8 offset-2">
        <div class="card ">
            <div class="card-header bg-info">
              <p class="text-light">Bike Single Info.</p>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Bike Image</th>
                        <td><img width="100px;" src="{{url('/uploads/bikes/'.$bike->image)}}" alt=""></td>
                    </tr>
                    <tr>
                        <th>Bike Name</th>
                        <td>{{ $bike->name}}</td>
                    </tr>
                    <tr>
                        <th>Bike Brand</th>
                        <td>{{ $bike->brand}}</td>
                    </tr>
                    <tr>
                        <th>Bike Model</th>
                        <td>{{ $bike->model}}</td>
                    </tr>
                    <tr>
                        <th>Bike Model Year</th>
                        <td>{{ date("Y-m-d",strtotime($bike->year)) }}</td>
                    <tr>
                        <th>Bike Color</th>
                        <td>{{ $bike->color}}</td>
                    </tr>
                    <tr>
                        <th>Bike CC</th>
                        <td>{{$bike->cc}}</td>
                    </tr>
                    <tr>
                        <th>Bike Power in HP</th>
                        <td>{{$bike->power}}</td>
                    </tr>
                    <tr>
                        <th>Bike Torque in NM</th>
                        <td>{{$bike->torque}}</td>
                    </tr>
                    <tr>
                        <th>Bike Odo</th>
                        <td>{{$bike->odo}}</td>
                    </tr>
                    <tr>
                        <th>Bike Number</th>
                        <td>{{$bike->number}}</td>
                    </tr>
                    <tr>
                        <th>Bike Description</th>
                        <td>{{$bike->description}}</td>
                    </tr>
                    <tr>
                        <th>Price/Day</th>
                        <td>{{$bike->price_per_day}}.00 TK</td>
                    </tr>
                    <tr>
                        <th>Discount Price</th>
                        <td>{{$bike->discount_offer}}.00 TK</td>
                    </tr>



                </table>

            </div>
            <div class="card-footer bg-secondary text-right">
                <a href="{{ route('admin.bike.list')}}" class="btn btn-primary">Go Back</a>
            </div>
          </div>

      </div>

@stop
