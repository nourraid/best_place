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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" crossorigin="anonymous">
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

        ion-avatar img  {
            width:100% !important;
            height : 100% !important;
            max-width: 150px !important;  //any size
        max-height: 150px !important; //any size
        margin: auto;
        }



        .profile-pic-div{
            margin: auto;
            margin-bottom: 45px;
            position: relative;

            height: 150px;
            width: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 1px solid grey;
            overflow: hidden;

        }

        #photo{
            height: 100%;
            width: 100%;
        }

        #file{
            display: none;
        }

        #uploadBtn{
            height: 40px;
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            color: wheat;
            line-height: 30px;
            font-family: sans-serif;
            font-size: 15px;
            cursor: pointer;
            display: none;
        }

    </style>

</head>

<body>
<section class="gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
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

                                <p>create new account</p>

                                <form action="{{route('user_register')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="profile-pic-div">
                                        <img src="{{asset('images/userAvatar.png')}}" id="photo">
                                        <input value="{{old('userImage')}}" type="file" id="file" name="userImage">
                                        <label for="file" id="uploadBtn"><i class="fa fa-camera"></i></label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  value="{{old('fname')}}" type="text" id="form2Example11" class="form-control"
                                               placeholder="first name" name="fname"/>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input   value="{{old('mname')}}"  type="text" id="form2Example11" class="form-control"
                                               placeholder="middle name" name="mname"/>

                                    </div>
                                    <div class="form-outline mb-4">
                                        <input  value="{{old('lname')}}" type="text" id="form2Example11" class="form-control"
                                               placeholder="last name" name="lname"/>

                                    </div>
                                    <div class="form-outline mb-4">
                                        <input  value="{{old('email')}}" type="email" id="form2Example11" class="form-control"
                                               placeholder="email address" name="email"/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input value="{{old('password')}}"  name="password" type="password" id="form2Example22" class="form-control"  placeholder="password" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input value="{{old('mobileNumber')}}"  name="mobileNumber" type="number" id="form2Example22" class="form-control"  placeholder="mobile number" />
                                    </div>


                                    <div class="form-outline mb-4">
                                        <label for="inputStatus">Cities</label>
                                        <select name="city_id" id="inputStatus" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>
                                                    {{$city->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" style="
                                            width: 100%;padding: 18px; font-family: cursive;">register</button>
                                        </div>



                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">already have an account?</p>
                                        <a href="{{route('login')}}">
                                            <button   type="button" class="btn btn-outline-danger">Log in</button></a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4" style="width: 100%;">
                                    <h4 class="mb-4 text-center"style="color: white;font-size: 57px; font-family: cursive;">Register</h4>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    //declearing html elements

    const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');

    //if user hover on img div

    imgDiv.addEventListener('mouseenter', function(){
        uploadBtn.style.display = "block";
    });

    //if we hover out from img div

    imgDiv.addEventListener('mouseleave', function(){
        uploadBtn.style.display = "none";
    });

    //lets work for image showing functionality when we choose an image to upload

    //when we choose a foto to upload

    file.addEventListener('change', function(){
        //this refers to file
        const choosedFile = this.files[0];

        if (choosedFile) {

            const reader = new FileReader(); //FileReader is a predefined function of JS

            reader.addEventListener('load', function(){
                img.setAttribute('src', reader.result);
            });

            reader.readAsDataURL(choosedFile);

            //Allright is done

            //please like the video
            //comment if have any issue related to vide & also rate my work in comment section

            //And aslo please subscribe for more tutorial like this

            //thanks for watching
        }
    });
</script>
</body>
</html>
