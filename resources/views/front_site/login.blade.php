<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RealHouzing - Real Estate Category Bootstrap Responsive Template | Home :: W3layouts</title>
    <!-- google fonts -->
    {{--    {{asset('css/font-awesome.css')}}--}}
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;600;700&display=swap')}}" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style-starter.css')}}">

    <style>

        .gradient-custom-2 {
            /* fallback for old browsers */
            background: white;

            /* Chrome 10-25, Safari 5.1-6 */
            background: #fa553f;

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: #fa553f;
        }

        @media (min-width: 768px) {

        }
        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>

</head>

<body>
<section class="gradient-form" style="background-color: #eee;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <h1>Best<span class="sub-color">Place</span>                                        </h1>

                                    <h4 class="mt-1 mb-5 pb-1"></h4>
                                </div>
                                @include('front_site.layout.masseges')

                                <p>Please login to your account</p>

                                <form action="{{route('user_authenticate')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input name="email" value="{{old('email')}}" type="email" id="form2Example11" class="form-control"
                                               placeholder="email address" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="password" type="password" id="form2Example22" class="form-control"  placeholder="password" />
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" style="width: 100%;padding: 10px; font-family: cursive;">Log
                                            in</button>
                                        <br/>
                                        <a class="text-muted" href="#!">Forgot password?</a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <a href="{{route('register')}}">
                                        <button   type="button" class="btn btn-outline-danger">Create new</button></a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4" style="width: 100%;">
                                <h4 class="mb-4 text-center"style="color: white;font-size: 57px; font-family: cursive;">LogIn</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
