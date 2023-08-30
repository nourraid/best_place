@extends('front_site.layout.master')
@section('details_js')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection

@section('details_style')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <style>

        /*****************globals*************/
        body {
            font-family: 'open sans';
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
        }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px;
            }
        }

        .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px;
        }

        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%;
        }

        .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block;
        }

        .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0;
        }

        .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0;
        }

        .tab-content {
            overflow: hidden;
        }

        .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
        }

        .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em;
        }

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .product-title, .price, .sizes, .colors {
            text-transform: UPPERCASE;
            font-weight: bold;
        }

        html[data-theme='dark'] {

        .card {
            background-color: black;
        }

        .ni {
            color: #776969;
        }

        }
        .checked, .sub-span {
            color: #fb7765;
        }

        .product-title, .rating, .product-description, .price, .vote, .sizes {
            margin-bottom: 15px;
        }

        .product-title {
            margin-top: 0;
        }

        .size {
            margin-right: 10px;
        }

        .size:first-of-type {
            margin-left: 40px;
        }

        .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px;
        }

        .color:first-of-type {
            margin-left: 20px;
        }

        .add-to-cart, .like {
            background: #fb7765;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease;
        }

        .add-to-cart:hover, .like:hover {
            background: #b36800;
            color: #fff;
        }

        .not-available {
            text-align: center;
            line-height: 2em;
        }

        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff;
        }

        .orange {
            background: #ff9f1a;
        }

        .green {
            background: #85ad00;
        }

        .blue {
            background: #0076ad;
        }

        .tooltip-inner {
            padding: 1.3em;
        }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        /*# sourceMappingURL=style.css.map */
    </style>

@endsection



@section('content')

    <div style="margin-bottom: 70px;" class="container">
        <div class="card">
            @include('front_site.layout.masseges')
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                                                        <div class="tab-pane active" id="pic-1"><img src="{{asset('images/property/'.$property->image)}}" /></div>

                        </div>
                    </div>
                    <div class="details col-md-6">
                        <h4 class="price"><i class="fas fa-user"></i> <span>
                                @php
                                    $user = \App\Models\User::find($property->user_id)
                                @endphp
                                {{$user->firstName}}
                            </span>
                        </h4>

                        <h3 class="product-title">{{$property->name}}</h3>


                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>

                        <p class="product-description">{{$property->description}}</p>
                        <h4 class="price"><span class="ni">price: </span> <span
                                class="sub-span">${{$property->price}}</span></h4>
                        <h4 class="price"><span class="ni">city: </span> <span
                                class="sub-span">{{\App\Models\City::find($property->city_id)->name}}</span></h4>
                        <h4 class="price"><span class="ni">address: </span> <span
                                class="sub-span">{{$property->address}}</span></h4>
                        <h4 class="price"><span class="ni">type: </span> <span
                                class="sub-span">{{\App\Models\Type::find($property->type_id)->name}}</span></h4>
                        {{--                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong>--}}
                        </p>


                        <div class="action" style="margin-top: 40px;">
                            <form method="post" action="{{route('reserve')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$property->id}}" name="property_id">
                                <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" name="user_id">
                                <button class="add-to-cart btn btn-default" type="submit">Apply for this property
                                </button>

                            </form>

                            <form method="post" action="{{route('add_fav')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$property->id}}" name="property_id">
                                <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}" name="user_id">
                                <button class="like btn btn-default" type="submit"><span class="fa fa-heart"></span>

                            </form>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('title')
    {{$property->name}} details
@endsection
