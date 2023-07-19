@extends('frontend.master')

@section('title')
    KBR-Terms & Conditions
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
                <h1>Terms And Conditions</h1>
                <ul class="trail-items">
                    <li>
                        <a href="index.html">
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <span>Terms And Conditions</span>
                    </li>
                </ul>
            </div>
        </section>
        <section class="bg-gray pt-100 pb-100">
            <div class="container">
                <div class="entry-content">

                    <h2>Interpretation</h2>
                    <p>The words of which the initial letter is capitalized have meanings defined under the following conditions.</p>
                    <p>The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
                    <h2>Attachments</h2>
                    <p>The items which the customer must bring to recieve the bike :</p>
                    <ul>
                        <li><strong>1 passport size colored photo</strong>  </li>
                        <li><strong>Hard copy of Driving lisence photocopy & NID card's photocopy</strong>   </li>
                        <li><strong>Have to have the own helmet for rider and pillion(if have)</strong>    </li>

                    </ul>
                    <h2>Insurance and Fine </h2>
                    <p class="text-danger">  -In case of any type of crash, damage or any accident, customer have to pay the total repairing charge. On the other hand, If any customer lost the bike, it's his responsibility to fin it or have to pay the full price of the new bike. </p>
                    <p>-If a customer do accident and get hospitialized, KBR will provide 50% of medical charge if the customer having insurance.</p>


                </div>
            </div>
        </section>

@stop
