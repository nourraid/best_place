@yield('details_js')

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

    @yield('details_style')

</head>

<body>

@include('front_site.layout.menu')
@yield('content')
@include('front_site.layout.footer')
</body>
</html>
