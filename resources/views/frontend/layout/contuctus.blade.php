@extends('frontend.master')


@section('title')

KBR- Contuct US

@stop


@section('content')

<section class="pt-100 pb-100 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 pr-lg-5 pr-0 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="contact-info">
                    <div class="iconbox-item mb-3">
                        <div><i class="fal fal fa-phone-alt"></i></div>
                        <div>
                            <h5>Call us</h5>
                            <p>+8801992717387
                            </p>
                        </div>
                    </div>
                    <div class="iconbox-item mb-3">
                        <div><i class="fal fal fa-mailbox"></i></div>
                        <div>
                            <h5>Mail Box</h5>
                            <p><a href="https://themebing.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bedbc6dfd3ced2dbfed3dfd7d290ddd1d3db">Khanbikerental@gmail.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="iconbox-item mb-3">
                        <div><i class="fal fal fa-map-marker-alt"></i></div>
                        <div>
                            <h5>Location</h5>
                            <p>Gazipur Chowrasta, Gazipur, Bangladesh
                            </p>
                        </div>
                    </div>
                    <hr>
                    <strong class="pb-2 d-block">Opening Hours</strong>
                    <ul class="mb-0">
                        <li>Saturday to Wednesday: 8am-10pm</li>
                        <li>Thursday: 8am-4pm</li>
                        <li>Friday: 6pm-9pm</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                <h2 class="mb-4">Leave us a Message</h2>
                <form action="#" method="post" class="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" placeholder="Full name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="subject" placeholder="Subject">
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@stop
