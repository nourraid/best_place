@extends('front_site.layout.master')

<head>
    <title>bestPlace</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Mastering Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>

    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //custom-theme -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('css/JiSlider.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" property=""/>

    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>

    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" property=""/>
    <!-- font-awesome-icons -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <link href="{{asset('//fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800')}}"
          rel="stylesheet">
    <link
        href="{{asset('//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic')}}"
        rel='stylesheet' type='text/css'>

    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //custom-theme -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/JiSlider.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property=""/>

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property=""/>
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
</head>

<style>

    body {
        margin-top: 20px;
        background: #f5f5f5;
    }

    /**
     * Panels
     */
    /*** General styles ***/
    .panel {
        box-shadow: none;
    }

    .panel-heading {
        border-bottom: 0;
    }

    .panel-title {
        font-size: 17px;
    }

    .panel-title > small {
        font-size: .75em;
        color: #999999;
    }

    .panel-body *:first-child {
        margin-top: 0;
    }

    .panel-footer {
        border-top: 0;
    }

    .panel-default > .panel-heading {
        color: #333333;
        background-color: transparent;
        border-color: rgba(0, 0, 0, 0.07);
    }

    form label {
        color: #999999;
        font-weight: 400;
    }

    .form-horizontal .form-group {
        margin-left: -15px;
        margin-right: -15px;
    }

    @media (min-width: 768px) {
        .form-horizontal .control-label {
            text-align: right;
            margin-bottom: 0;
            padding-top: 7px;
        }
    }

    .profile__contact-info-icon {
        float: left;
        font-size: 18px;
        color: #999999;
    }

    .profile__contact-info-body {
        overflow: hidden;
        padding-left: 20px;
        color: #999999;
    }

    .profile-avatar {
        min-height: 168px;
        min-width: 191px;
        width: 200px;
        position: relative;
        margin: 0px auto;
        margin-top: 196px;
        border: 4px solid #f3f3f3;
    }
</style>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@section('content')

    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                @include('admin.layout.masseges')
                <form class="form-horizontal" action="{{route('user.do_change' , $user)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <img style="height: 0px" src="{{asset('images/user/'.$user->userImage)}}" class="img-circle profile-avatar" alt="User avatar">
                        </div>
                        <div class="panel-body text-center">
                            <input type="file" name="userImage" style=" margin: auto;">
                        </div>
                    </div>

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4 class="panel-title">User info</h4>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">first name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fname" class="form-control"
                                           value="{{$user->firstName}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">middle name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="mname" class="form-control" value="{{$user->middleName}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">last name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lname" class="form-control"
                                           value="{{$user->lastName}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputStatus">Cities</label>
                                <select name="city_id" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{$user->city_id == $city->id ? 'selected' : ''}}>
                                            {{$city->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">phoneNumber</label>
                                <div class="col-sm-10">
                                    <input type="number" name="mobileNumber" class="form-control" value="{{$user->mobile_number}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <a href="{{route('profile')}}"> <i class="fa fa-arrow-circle-left"></i> back to profile </a>
                                    <input type="submit" name="edite" class="btn btn-primary" value="Edit">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('title')
    edit information Page
@endsection
