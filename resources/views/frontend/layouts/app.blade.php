<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <title>App</title>
</head>

<body>
    @include('frontend.layouts.header')
    <div style="margin-top:150px">
        @yield('content')
    </div>
    @include('frontend.layouts.footer')
</body>

<script src="{{ asset('script/jquery.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@yield('script')

</html>
