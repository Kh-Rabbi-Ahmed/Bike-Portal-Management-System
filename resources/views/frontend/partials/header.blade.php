<header>
    <div class="top-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-2 my-auto d-none d-lg-block">
                    <div class="logo">
                        <a href="{{ route('kbr.home') }}" class="custom-logo-link" rel="home">
                            <img width="512" height="114" src="{{ asset('frontend/assets/images/logo.png')}}" class="custom-logo" alt="Sayara">


                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 my-auto d-none d-lg-block">
                    <div class="ajax-search-form">
                        <input type="text" name="s" id="keyword" placeholder="Search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    <div id="datafetch"></div>
                </div>


                </div>
            </div>
        </div>
        <div class="site-header ">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-7 col-md-9 my-auto">
                        <div class="primary-menu d-none d-lg-inline-block">
                            <nav class="desktop-menu">
                                <ul id="menu-primary" class="menu">
                                    <li class="menu-item"><a href="{{ route('kbr.home') }}"> Home</a></li>

                                        <li class="menu-item"><a href="{{ route('kbr.bikes') }}"> Bikes </a></li>

                                    <li class="menu-item"><a href="about.html">Blog</a></li>
                                    <li class="menu-item"><a href="{{ route('kbr.terms') }}">Terms & Conditions</a></li>
                                    <li class="menu-item"><a href="{{ route('kbr.about') }}">About Us</a></li>
                                    <li class="menu-item"><a href="{{ route('kbr.contuctus') }}">Contact Us</a></li>

                                </ul>

                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-3 p-0 text-right my-auto">
                        <div class="header-btn d-none d-flex ">
                           @auth
                           <a class="mx-1" href="{{ route('kbr.user.profile.home') }}">Profile</i></a>
                            <a href="{{ route('kbr.user.logout') }}">Logout</i></a>

                          @else
                          <a class="mx-1" href="{{ route('kbr.user.login.form') }}">Login </a>
                          <a class="mx-1" href="{{ route('kbr.user.registration') }}">Register </a>

                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
