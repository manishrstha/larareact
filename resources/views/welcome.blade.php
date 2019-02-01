<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('uploads/logo/logo.png')}}">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- meta scrf token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="/">
    <!-- Site Title -->
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!--cdns -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> 
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/app.css">
</head>
<body>  
    <div id="root">
    </div>
    <noscript>
        <div class="container-fluid fixed-top h-100 w-100 bg-dark d-flex align-items-center justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="alert alert-danger p-3 mt-3">
                    Please Enable javscript in your browser or upgrade your browser !.
                </div>
            </div>
        </div>
    </noscript>
    <!-- End footer Area -->    
    <script src="{{url('/')}}/js/app.js"></script>
</body>
</html>
