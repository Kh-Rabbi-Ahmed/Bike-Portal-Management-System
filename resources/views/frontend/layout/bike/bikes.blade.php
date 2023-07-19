@extends('frontend.master')

@section('content')


<div class="off-canvas-menu-bar">
<div class="container">
<div class="row">
<div class="col-6 my-auto">
<a href="index.html" class="custom-logo-link" rel="home"><img src="assets/images/logo.png" class="custom-logo" alt="Sayara"></a> </div>
<div class="col-6">
<div class="mobile-nav-toggler"><span class="fal fa-bars"></span></div>
</div>
</div>
</div>
</div>

<div class="off-canvas-menu">
<div class="menu-backdrop"></div>
<i class="close-btn fa fa-close"></i>
<nav class="mobile-nav">
<div class="text-center pt-3 pb-3">
<a href="index.html" class="custom-logo-link" rel="home"><img src="assets/images/logo.png" class="custom-logo" alt="Sayara"></a> </div>
<ul class="navigation">

</ul>
</nav>
</div>
<section class="breadcrumbs">
<div class="container">
<h1>Available Bikes Here</h1>


</div>
</section>
<section class="pt-100 pb-100 border p-4">





    <div class="row">

      @foreach($bikes as  $item)
      <div class="col-xl-4">
        <div class="product-item wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.4s">
            <div class="product-item-image">
                <a href="shop-single.html">
                    <img src="{{ asset('uploads/bikes/'.$item->image) }}" alt="Image">
                </a>
            </div>
            <div class="product-item-content">

                <a href="shop-single.html">
                    <ul>
                        <li>Name: {{ $item->name }}</li>
                        <li>Brand: {{ $item->brand }}</li>
                        <li>Model: {{ $item->model }}</li>
                        <li>Bike Discount Offer: {{ $item->discount_offer }}.00 TK</li>
                        <li>Bike Price/Day: {{ $item->price_per_day }}.00 TK</li>
                        @if($item->discount_offer <= 0)
                        <li> Total Price/Day:
                            <span> {{ $item->price_per_day }}</span>
                        </li>
                        @else
                       <li >Total Price/Day :
                        <span> <span><del class="text-danger">{{ $item->price_per_day }}.00TK</del></span> {{ $item->price_per_day - $item->discount_offer }}.00 Tk</span>
                       </li>
                        @endif

                    </ul>
                </a>

            </div>
            <div class="product-item-overlay">
                <a  href="{{ route('kbr.bikes.singleview',$item->id) }}" class="button ajax_add_to_cart">See Details</a> </div>
                <a class="ajax-quick-view-popup" href="quick-view-popup.html">
                    <i class="fas fa-search-plus"></i>
                </a>
            </div>
        </div>

      @endforeach

    </div>
</section>



@stop
