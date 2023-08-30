@extends('front_site.layout.master')

@section('details_style')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!------ Include the above in your HEAD tag ---------->

@endsection

@section('content')

    <div class="col-md-6 offset-md-3">
        <span class="anchor" id="formPayment"></span>
        <hr class="my-5">

        <!-- form card cc payment -->
        <div class="card card-outline-secondary">
            <div class="card-body">
                <h3 class="text-center">Search Property</h3>
                <hr>
                <div>
                    @include('admin.layout.masseges')
                </div>
                <form action="{{route('do_search')}}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" name="name" id="search" type="text" placeholder="property name"
                               title="property name"/>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <select class="form-control" name="type_id" size="0">
                                <option selected disabled>Select Type</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>
                                        {{$type->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select class="form-control" name="city_id" size="0">
                                <option selected disabled>Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>
                                        {{$city->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-md-6">
                            <input class="form-control" name="maxPrice" id="search" type="number" placeholder="max price"
                                   title="max price"/>

                        </div>

                        <div class="col-md-6">
                            <input class="form-control" name="minPrice" id="search" type="number" placeholder="min price"
                                   title="min price"/>

                        </div>
                    </div>


                    <hr>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-default btn-lg btn-block">Cancel</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form card cc payment -->

        <br/>
    </div>

@endsection

@section('title')
    search page
@endsection






{{--@extends('front_site.layout.master')--}}

{{--@section('details_style')--}}
{{--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1" />--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge" />--}}
{{--    <meta name="author" content="colorlib.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Lato:400,600,700" rel="stylesheet" />--}}
{{--    <link href="css/main.css" rel="stylesheet" />--}}
{{--@endsection--}}

{{--@section('content')--}}

{{--    <div class="s009">--}}

{{--        <form action="{{route('do_search')}}" method="POST">--}}
{{--            @include('front_site.layout.masseges')--}}

{{--            @csrf--}}
{{--            <div class="inner-form">--}}
{{--                <div class="basic-search">--}}
{{--                    <div class="input-field">--}}
{{--                        <input name="name" id="search" type="text" placeholder="property name" />--}}
{{--                        <div class="icon-wrap">--}}
{{--                            <svg class="svg-inline--fa fa-search fa-w-16" fill="#ccc" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}
{{--                                <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="advance-search">--}}
{{--                    <span class="desc">ADVANCED SEARCH</span>--}}
{{--                    <div class="row">--}}
{{--                        <div class="input-field">--}}
{{--                            <div class="input-select">--}}
{{--                                <select data-trigger="" name="type_id" >--}}
{{--                                    <option selected disabled>Select one</option>--}}
{{--                                    @foreach($types as $type)--}}
{{--                                        <option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>--}}
{{--                                            {{$type->name}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="input-field">--}}
{{--                            <div class="input-select">--}}
{{--                                <select data-trigger="" name="city_id">--}}
{{--                                    <option selected disabled>Select one</option>--}}
{{--                                    @foreach($cities as $city)--}}
{{--                                        <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>--}}
{{--                                            {{$city->name}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="input-field">--}}
{{--                            <div class="input-field">--}}
{{--                                <input name="maxPrice" type="number" placeholder="max price" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="input-field">--}}
{{--                            <div class="input-field">--}}
{{--                                <input name="minPrice"  type="number" placeholder="min price" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row third">--}}
{{--                        <div class="input-field">--}}
{{--                            <div class="result-count">--}}
{{--                                <span>108 </span>results</div>--}}
{{--                            <div class="group-btn">--}}
{{--                                <button class="btn-delete" id="delete">RESET</button>--}}
{{--                                <button type="submit" class="btn-search">SEARCH</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}


{{--    @section('details_js')--}}
{{--        <script src="js/extention/choices.js"></script>--}}
{{--        <script>--}}
{{--            const customSelects = document.querySelectorAll("select");--}}
{{--            const deleteBtn = document.getElementById('delete')--}}
{{--            const choices = new Choices('select',--}}
{{--                {--}}
{{--                    searchEnabled: false,--}}
{{--                    itemSelectText: '',--}}
{{--                    removeItemButton: true,--}}
{{--                });--}}
{{--            deleteBtn.addEventListener("click", function(e)--}}
{{--            {--}}
{{--                e.preventDefault()--}}
{{--                const deleteAll = document.querySelectorAll('.choices__button')--}}
{{--                for (let i = 0; i < deleteAll.length; i++)--}}
{{--                {--}}
{{--                    deleteAll[i].click();--}}
{{--                }--}}
{{--            });--}}

{{--        </script>--}}
{{--    @endsection--}}


{{--@endsection--}}

{{--@section('title')--}}
{{--    search page--}}
{{--@endsection--}}
