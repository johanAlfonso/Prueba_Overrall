<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aplication</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/datatable/css/jquery.dataTables.min.css')}}">
    
</head>
<body>
    @include('layaouts.partials.navbar')
    <main class="container">
        @yield('content')
    </main>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/vue/vue.global.js') }}"></script>
    <script src="{{ url('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/08cb46cbf1.js" crossorigin="anonymous"></script>
</body>
</html>