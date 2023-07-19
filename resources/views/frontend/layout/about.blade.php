@extends('frontend.master')

@section('title')
 KBR- About
 @stop


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
                <h1>KBR - About Us</h1>

            </div>
        </section>
        <section class="pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                        <h1 class="pb-2 font-weight-bold">About  Khan Bike Rental </h1>
                        <p>The more we drive the car the better they seem to operate operate. No noise, just stopping power! Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae. consequatur,</p>
                        <p class="pb-3">vel illum qui dolorem eum fugiat quo voluptas nulla pariatur erit qui in ea voluptate verit qui in ea voluptate vele.</p>

                    </div>
                    <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                        <img src="{{ asset('frontend/assets/images/car.png') }}" alt="Image">
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-70 pb-70 bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="counter">
                            <h1>120</h1>
                            <p>Stores around the world</p>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div class="counter">
                            <h1>2,036</h1>
                            <p>Satisfied customers</p>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="counter">
                            <h1>3,012</h1>
                            <p>Auto Parts</p>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                        <div class="counter">
                            <h1>234</h1>
                            <p>Awards</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimonial-section pt-100 pb-150 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4">
                        <div class="testimonials">
                            <div class="testimonial-img">
                                <img src="{{ asset('frontend/assets/images/t-3.jpg') }}" alt="Jessica Moore">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-8">
                        <div class="testimonials-nav">
                            <div class="testimonial-content">
                                <p> IF you have a bike, then you have freedom. We're here to provide you freedom</p>
                                <div class="testi-bottom">
                                    <div class="client-info">
                                        <h4> <a href=""> Sumaia Mumu</a></h4>
                                        <span> CEO of KBR</span>
                                    </div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>

 @stop

