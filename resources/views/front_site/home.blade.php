@extends('front_site.layout.master')

@section('content')
    <!--/w3l-types-->
    <section class="w3l-witemshny-main py-5">
        <div class="container py-md-4">
            <!--/row-1-->
            <div class="witemshny-grids row">
                @foreach($types as $type)
                    <div class="col-xl-2 col-md-4 col-6 product-incfhny mt-4">
                        <div class="weitemshny-grid oposition-relative">
                            <a href="{{route('typeProperties' , $type->id)}}" class="d-block zoom"><img
                                    style=" height: 206px;width: 197px;"
                                    src="{{asset('images/type/'.$type->imageName)}}" alt="" class="news-image"></a>
                            {{--                            <a href="#img" class="d-block zoom"><img src="{{asset('images/type/'.$type->imageName)}}" alt="" class="img-fluid news-image"></a>--}}
                            <div class="witemshny-inf">
                            </div>
                        </div>
                        <h4 class="gdnhy-1 mt-4 text-center"><a style="display: contents;"
                                                                href="{{route('typeProperties' , $type->id)}}">{{$type->name}}</a>
                        </h4>
                    </div>
                @endforeach


            </div>
            <!--//row-1-->

        </div>
    </section>
    <!--//w3l-types-->

    <!--/bottom-3-grids-->
    <div class=" w3l-3-grids py-5" id="grids-3">
        <div class="container py-md-4">
            <div class="row">
                <div class="col-md-6 mt-md-0">
                    <div class="grids3-info position-relative">
                        <a href="#img" class="d-block zoom"><img src="{{asset('assets/images/banner2.jpg')}}" alt=""
                                                                 class="img-fluid news-image"></a>
                        <div class="w3-grids3-info">
                            <h4 class="gdnhy-1"><a href="#img">Buy a Commercial<br>Property</a>
                                <a class="w3item-link btn btn-style mt-4" href="{{route('properties')}}">
                                    Explore Property <i class="fas fa-angle-double-right ms-2"></i>
                                </a>

                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4 grids3-info2">
                    <div class="grids3-info position-relative">
                        <a href="#img" class="d-block zoom"><img src="{{asset('assets/images/banner1.jpg')}}" alt=""
                                                                 class="img-fluid news-image"></a>
                        <div class="w3-grids3-info second">
                            <h4 class="gdnhy-1"><a href="#img">ADD a Commercial<br>Property</a>
                                <a class="w3item-link btn btn-style mt-4" href="{{route('add_property')}}">
                                    Add Property <i class="fas fa-angle-double-right ms-2"></i>
                                </a>
                            </h4>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--//bottom-3-grids-->

    <!--/grids-->
    <section class="w3l-grids-3 py-5" id="about">
        <div class="container py-md-5 py-3">
            <div class="row bottom-ab-grids">
                <div class="w3l-video-left col-lg-6" id="video">
                    <!-- /home-page-video-popup-->
                    <div class="w3l-index5">
                        <div class="position-relative mt-4">
                            <a href="#small-dialog"
                               class="popup-with-zoom-anim play-view text-center position-absolute">
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                            <div id="small-dialog" class="zoom-anim-dialog">
                                <iframe src="{{asset('Explanatory_video/gaduation project(best_place).wmv')}}"
                                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            </div>
                        </div>
                        <!-- //home-page-video-popup-->
                    </div>
                </div>


                <div class="w3ab-left-top col-lg-6 mt-lg-0 mt-5 ps-lg-5">
                    <h6 class="title-subw3hny mb-1">Buy a Property</h6>
                    <h3 class="title-w3l mb-2">Find, Buy & Own Your Dream Property</h3>
                    <p class="my-3"> This is an introductory video on how to use this site easily and safely, with the
                        aim of facilitating the process of buying, booking and displaying your property </p>

                </div>
            </div>
        </div>
    </section>
    <!--//grids-->


    <!-- features section -->
    <section class="w3l-features py-5" id="features">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-content text-center mb-lg-3 mb-4">
                <h6 class="title-subw3hny mb-1">What We Do</h6>
                <h3 class="title-w3l">We're on a Mission to Change
                    View of RealEstate Field.</h3>
            </div>
            <div class="main-cont-wthree-2">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-pen-fancy"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Your One-Stop Shop for Finding Your Dream
                                    Property</a></h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Schedule a Free, No-Obligation
                                    Appointment</a></h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-house-user"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Understand the Value of Your Property</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//features section -->


    <!--/properties-->
    <section class="locations-1" id="locations">
        <div class="locations py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="heading text-center mx-auto">
                    <h6 class="title-subw3hny mb-1">Our Properties</h6>
                    <h3 class="title-w3l mb-3">Latest Properties</h3>
                </div>
                <div class="row pt-md-5 pt-4">

                    @foreach($properties as $property)
                        <div class="col-lg-4 col-md-6 mt-lg-4 pt-lg-0 mt-4 pt-md-2">
                            <div class="w3property-grid">
                                <a href="{{route('property_details',$property->id)}}">
                                    <div style="height: 250px" class="box16">
                                        <div class="rentext-listing-category">
                                            <span> {{\App\Models\Type::find($property->type_id)->name}}</span></div>
                                        <img style="height: 250px" class="img-fluid"
                                             src="{{asset('images/property/'.$property->image)}}" alt="">
                                        <div class="box-content">
                                            <h3 class="title">{{$property->name}}</h3>
                                            <span class="post"> {{$property->address}}</span>

                                        </div>
                                    </div>
                                </a>
                                <div class="list-information space-between">
                                    <ul class="product-features">
                                        <li>
                                            <i class="fas fa-search-location"></i>
                                            <span class="listable-value">

                                            <span
                                                class="value"> {{\App\Models\City::find($property->city_id)->name}}  </span>

                                            <span class="suffix">
                                            </span>
                                        </span>
                                        </li>
                                        <li>
                                            <i class="fas fa-user"></i>
                                            <span class="listable-value">

                                            <span class="value">
                                                 @php
                                                     $user = \App\Models\User::find($property->user_id)
                                                 @endphp
                                                {{$user->firstName}}
                                            </span>

                                            <span class="suffix">
                                            </span>
                                        </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--//properties-->
@endsection

@section('title')
    Home
@endsection
