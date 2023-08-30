@extends('front_site.layout.master')

@section('details_style')
    <style>

        .border-md {
            border-width: 2px;
        }

        .btn-facebook {
            background: #405D9D;
            border: none;
        }

        .btn-facebook:hover, .btn-facebook:focus {
            background: #314879;
        }

        .btn-twitter {
            background: #42AEEC;
            border: none;
        }

        .btn-twitter:hover, .btn-twitter:focus {
            background: #1799e4;
        }



        /*
        *
        * ==========================================
        * FOR DEMO PURPOSES
        * ==========================================
        *
        */

        body {
            min-height: 100vh;
        }

        .form-control:not(select) {
            padding: 1.5rem 0.5rem;
        }

        select.form-control {
            height: 52px;
            padding-left: 0.5rem;
        }

        .form-control::placeholder {
            color: #ccc;
            font-weight: bold;
            font-size: 0.9rem;
        }
        .form-control:focus {
            box-shadow: none;
        }
    </style>
@endsection

@section('details_js')
    <script>
        $(function () {
            $('input, select').on('focus', function () {
                $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
            });
            $('input, select').on('blur', function () {
                $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
            });
        });
    </script>
@endsection
@section('content')

    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="{{asset('images/g6.jpg')}}" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Add your Property</h1>

            </div>


            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                @include('admin.layout.masseges')

                <form method="post" action="{{route('do_add_property')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <!-- property Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend" style="width: 180px;">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                name
                            </span>
                            </div>
                            <input value="{{old('name')}}" id="name" type="text" name="name" placeholder="Property Name" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- description -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend"  style="width: 180px;">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                description
                            </span>
                            </div>
                            <textarea id="description" type="text" name="description" placeholder="description" class="form-control bg-white border-left-0 border-md">{{old('description')}}</textarea>
                        </div>

                        <!-- price -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend"  style="width: 180px;">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                price
                            </span>
                            </div>
                            <input value="{{old('price')}}" id="price" type="number" name="price" placeholder="price" class="form-control bg-white border-left-0 border-md">
                        </div>



                        <!-- imge -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend"  style="width: 180px;">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                property image
                            </span>
                            </div>
                            <input value="{{old('imageName')}}" id="imageName" type="file" name="imageName" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Certificate -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend"  style="width: 180px;">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                Certificate image
                            </span>
                            </div>
                            <input value="{{old('Certificate')}}" id="Certificate" type="file" name="Certificate"  class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- address -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend"  style="width: 180px;">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                address
                            </span>
                            </div>
                            <input value="{{old('address')}}" id="address" type="text" name="address" placeholder="Property address" class="form-control bg-white border-left-0 border-md">
                        </div>


                        <!-- city -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend"  style="width: 180px;">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                city
                            </span>
                            </div>
                            <select id="job" name="city_id" class="form-control custom-select bg-white border-left-0 border-md">
                                <option selected disabled>Select one</option>

                            @foreach($cities as $city)
                                    <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>
                                        {{$city->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- type -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend"  style="width: 180px;">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                type
                            </span>
                            </div>
                            <select id="job" name="type_id" class="form-control custom-select bg-white border-left-0 border-md">
                                <option selected disabled>Select one</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>
                                        {{$type->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>




                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0" >
                                <button class="btn btn-primary btn-block py-2" type="submit" class="font-weight-bold">add property</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<!-- Navbar-->

