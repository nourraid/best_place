@extends('front_site.layout.master')

@section('content')

    <!--/properties-->
    <section class="locations-1" id="locations">
        <div class="locations py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="heading text-center mx-auto">
                    <h3 class="title-w3l mb-3">Properties</h3>
                </div>
                <div class="row pt-md-5 pt-4">

                    @if($properties->isNotEmpty())
                        @foreach($properties as $property)
                            <div class="col-lg-4 col-md-6 mt-lg-4 pt-lg-0 mt-4 pt-md-2">
                                <div class="w3property-grid">
                                    <a href="{{route('property_details',$property->id)}}">
                                        <div style="height: 250px" class="box16">
                                            <div class="rentext-listing-category"><span> {{\App\Models\Type::find($property->type_id)->name}}</span></div>
                                            <img style="height: 250px" class="img-fluid" src="{{asset('images/property/'.$property->image)}}" alt="">
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

                                            <span class="value"> {{\App\Models\City::find($property->city_id)->name}}  </span>

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

                    @else
                       <h4  class="heading text-center mx-auto" style="color: gray">No property for this type yet!</h4>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!--//properties-->

@endsection
@section('title')
    {{$type->name}}
@endsection
