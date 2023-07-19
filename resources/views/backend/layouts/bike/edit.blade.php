@extends('backend.master')

@section('title')
    Bike-Edit
@stop

@section('content')


      <div class="col-10 offset-1">
                <h3 class="text-center mb-4">Bike Edit</h3>


  <form method="post" action="{{route('admin.bike.update',$bike->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")

  <div class="form-group">
    <label for="image">Bike Image</label>
    <input type="file" class="form-control" id="image" name="image">

  </div>


  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name"  placeholder="Enter Name" value="{{ $bike->name}}">
    @error('name') <span class="text-danger"> {{$message}} </span> @enderror
  </div>
  <div class="form-group">
    <label for="brand">Brand</label>
    <input type="text" class="form-control @error('brand') is-invalid @enderror " id="brand" name="brand"  placeholder="Enter Brand" value="{{$bike->brand}}">
    @error('brand') <span class="text-danger"> {{$message}} </span> @enderror
  </div>


  <div class="form-group">
    <label for="model">Model</label>
    <input type="text" class="form-control @error('model') is-invalid @enderror"  id="model" name="model" placeholder="Enter Model" value="{{$bike->model}}">
    @error('model') <span class="text-danger"> {{$message}} </span> @enderror
  </div>

  <div class="form-group">
    <label for="year">Year</label>
    <input type="date" class="form-control  @error('year') is-invalid @enderror" id="year" name="year" placeholder="Enter Year" value="{{ date("Y-m-y",strtotime($bike->year))}}">
    @error('year') <span class="text-danger"> {{$message}} </span> @enderror
  </div>

  <div class="form-group">
    <label for="color">Color</label>
    <input type="text" class="form-control  @error('color') is-invalid @enderror" id="color" name="color" placeholder="Enter Color" value="{{$bike->color}}">
    @error('color') <span class="text-danger"> {{$message}} </span> @enderror
  </div>

  <div class="form-group">
    <label for="cc">CC</label>
    <input type="text" class="form-control  @error('cc') is-invalid @enderror" id="cc" name="cc" placeholder="Enter CC" value="{{$bike->cc}}">
    @error('cc') <span class="text-danger"> {{$message}} </span> @enderror
  </div>

  <div class="form-group">
    <label for="power">Power</label>
    <input type="text" class="form-control  @error('power') is-invalid @enderror" id="power" name="power" placeholder="Enter Power" value="{{$bike->power}}">
    @error('power') <span class="text-danger"> {{$message}} </span> @enderror
  </div>

  <div class="form-group">
    <label for="torque">Torque</label>
    <input type="text" class="form-control  @error('torque') is-invalid @enderror" id="torque" name="torque" placeholder="Enter Torque" value="{{$bike->torque}}">
    @error('torque') <span class="text-danger"> {{$message}} </span> @enderror
  </div>

  <div class="form-group">
    <label for="odo">Odo</label>
    <input type="number" class="form-control  @error('odo') is-invalid @enderror" id="odo" name="odo" placeholder="Enter Odo" value="{{$bike->odo}}">
    @error('odo') <span class="text-danger"> {{$message}} </span> @enderror
  </div>

  <div class="form-group">
    <label for="number">Number</label>
    <input type="text" class="form-control  @error('number') is-invalid @enderror" id="number" name="number" placeholder="Enter Number" value="{{$bike->number}}">
    @error('number') <span class="text-danger"> {{$message}} </span> @enderror
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control  @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter Description" value="{{$bike->description}}">
    @error('description') <span class="text-danger"> {{$message}} </span> @enderror
  </div>

  <div class="form-group">
    <label for="price_per_day">Price per Day</label>
    <input type="number" class="form-control  @error('price_per_day') is-invalid @enderror" id="price_per_day" name="price_per_day" placeholder="Enter Price " value="{{$bike->price_per_day}}">
    @error('price_per_day') <span class="text-danger"> {{$message}} </span> @enderror
  </div>
  <div class="form-group">
    <label for="discount_offer">Discount Offer</label>
    <input type="number" class="form-control  @error('discount_offer') is-invalid @enderror" id="price_per_day" name="discount_offer"  value="{{$bike->discount_offer}}">
    @error('discount_offer') <span class="text-danger"> {{$message}} </span> @enderror
  </div>





  <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



@stop
