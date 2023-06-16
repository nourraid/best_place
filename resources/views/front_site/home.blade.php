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
                            <a  class="d-block zoom"><img style="height: 206px;width: 197px;" href="#img" src="{{asset('images/g1.jpg')}}" alt="" class="news-image"></a>
{{--                            <a href="#img" class="d-block zoom"><img src="{{asset('images/type/'.$type->imageName)}}" alt="" class="img-fluid news-image"></a>--}}
                            <div class="witemshny-inf">
                            </div>
                        </div>
                        <h4 class="gdnhy-1 mt-4"><a href="#img">{{$type->name}}</a>
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
                        <a href="#img" class="d-block zoom"><img src="{{asset('assets/images/banner2.jpg')}}" alt="" class="img-fluid news-image"></a>
                        <div class="w3-grids3-info">
                            <h4 class="gdnhy-1"><a href="#img">Buy a Commercial<br>Property</a>
                                <a class="w3item-link btn btn-style mt-4" href="#">
                                    Explore Property <i class="fas fa-angle-double-right ms-2"></i>
                                </a>

                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4 grids3-info2">
                    <div class="grids3-info position-relative">
                        <a href="#img" class="d-block zoom"><img src="{{asset('assets/images/banner1.jpg')}}" alt="" class="img-fluid news-image"></a>
                        <div class="w3-grids3-info second">
                            <h4 class="gdnhy-1"><a href="#img">ADD a Commercial<br>Property</a>
                                <a class="w3item-link btn btn-style mt-4" href="#">
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



@endsection

@section('title')
    Home
@endsection
