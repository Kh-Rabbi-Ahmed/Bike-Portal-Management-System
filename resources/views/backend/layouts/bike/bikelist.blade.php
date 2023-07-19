@extends('backend.master')

@section('title')
      Bike-list
@stop



@section('content')

<div class="row">
      <div class="col-12 offset">
            <h3 class="text-center mb-2">Bike List</h3>
<!--Success msg-->
            @if(session('success'))
            <div class="text-center alert alert-success">
                <p class="text-center text-bolder">{{session('success')}}</p>

            </div>

            @endif

          <a href="{{route('admin.bike.create')}}" class="btn btn-secondary mb-3">Create New</a>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Bike Image</th>
      <th scope="col">Name</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>

      <th scope="col">Number Plate</th>
      <th scope="col">Price/day</th>
      <th scope="col">Discount Price</th>
      <th class="text-center" scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  @foreach($data as $key=>$e)
    <tr>
      <th scope="row">  {{$key+1}}</th>
      <td><img width="100px;" src="{{url('/uploads/bikes/'.$e->image)}}" alt=""></td>
      <td>{{$e->name}}</td>
      <td>{{$e->brand}}</td>
      <td>{{$e->model}}</td>
      <td>{{$e->number}}</td>
      <td>{{$e->price_per_day}}.00 TK</td>
      <td>{{$e->discount_offer}}.00 TK</td>

      <td class="d-flex">
          <a class="btn btn-primary mx-1" href="{{route('admin.bike.show',$e->id)}}"> View</a>
          <a class="btn btn-success mx-1" href="{{route('admin.bike.edit',$e->id)}}"> Edit</a>
          <form action="{{ route('admin.bike.delete',$e->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mx-1 delete">Delete</button>

          </form>

      </td>
    </tr>


    @endforeach



  </tbody>
</table>
  {{$data->links()}}

      </div>






</div>

@stop
