<header id="site-header" class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light stroke py-lg-0">
            <h1><a class="navbar-brand" href="{{route('home')}}">
                    Best<span class="sub-color">Place</span>
                </a></h1>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav mx-lg-auto my-2 my-lg-0 navbar-nav-scroll">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#Pages" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Types <span class="fa fa-angle-down ms-1"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(\App\Models\Type::all() as $type)
                                <li><a class="dropdown-item pt-2" href="{{route('typeProperties' , $type->id)}}">{{$type->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('properties')}}">Properties</a>
                    </li>

                </ul>

                <form action="{{route('search')}}">
                    <!--/search-->
                    <button id="trigger-overlay" class="searchw3-icon me-xl-4 me-lg-3" type="submit"><i
                            class="fas fa-search"></i></button>
                </form>
                <form action="{{route('profile')}}">
                    <button id="trigger-overlay" class="searchw3-icon me-xl-4 me-lg-3" type="submit"><i class="fas fa-user"></i></button>
                </form>
                <!-- open/close -->
                <div class="overlay overlay-slidedown">
                    <button type="button" class="overlay-close"><i class="fas fa-times"></i></button>
                    <nav class="w3l-formhny">
                        <h5 class="mb-3">Search here</h5>
                        <form action="#" method="GET" class="d-sm-flex search-header">
                            <input class="form-control me-2" type="search" placeholder="Search here..."
                                   aria-label="Search" required>
                            <button class="btn btn-style btn-primary" type="submit">Search</button>
                        </form>
                    </nav>
                </div>
                <!--//search-->
            </div>
            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>

            <!-- //toggle switch for light and dark theme -->
        </nav>
    </div>
</header>
@php
    $x = url()->current()
@endphp

    @if(Str::contains($x , 'home'))
        <section class="w3l-main-slider banner-slider" id="home">
            <div class="owl-one owl-carousel owl-theme">
                <div class="item">
                    <div class="slider-info banner-view banner-top1">
                        <div class="container">
                            <div class="banner-info header-hero-19">
                                <p class="w3hny-tag">Real Estate is our life</p>
                                <h3 class="title-hero-19">The creativity of the new world.</h3>
                                <a href="{{route('about')}}" class="btn btn-style btn-primary mt-4">Read More <i class="fas fa-angle-double-right ms-2"></i></a>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </section>

    @else
        <div class="inner-banner py-5">
            <section class="w3l-breadcrumb text-left py-sm-5 ">
                <div class="container">
                    <div class="w3breadcrumb-gids">
                        <div class="w3breadcrumb-left text-left">
                            <h2 class="inner-w3-title mt-sm-5 mt-4 text-center">@yield('title')</h2>

                        </div>
                        <div class="w3breadcrumb-right">
                            <ul class="breadcrumbs-custom-path">
                                <li><a href="index.html">Home</a></li>
                                <li class="active"><span class="fas fa-angle-double-right mx-2"></span>@yield('title')</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    @endif

