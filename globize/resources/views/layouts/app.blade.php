<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Globize</title>

    <!-- Styles -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />


    <link href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet">

    <link href="{{ asset('global/plugins/socicon/socicon.css') }}" rel="stylesheet">
    <link href="{{ asset('global/css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/css/plugins.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    <!-- Scripts -->        
    <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>        
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script src="{{ asset('global/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('global/plugins/js.cookie.min.js') }}"></script>
    <script src="{{ asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('global/plugins/jquery.blockui.min.js') }}"></script>
    <script src="{{ asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('global/scripts/app.min.js') }}"></script>

    <!-- these are just for the demo page / options -->
    <link href="{{ asset('worldmap/include/spectrum.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('worldmap/include/jquery.switchButton.css')}}" rel="stylesheet" type="text/css" /> -->    
    
    <script src="{{ asset('worldmap/include/spectrum.js')}}"></script>
    <!-- <script src="{{ asset('worldmap/include/jquery.switchButton.js')}}"></script> -->
    <script src="{{ asset('worldmap/include/simple-slider.js') }}"></script>
    <script src="{{ asset('worldmap/include/Detector.js') }}"></script>


    <!-- required for the application -->
    <script src="{{ asset('worldmap/data.js') }}"></script>
    <script src="{{ asset('worldmap/grid.js') }}"></script>

    <!-- ref:js build/encom-globe.min.js -->
    <script src="{{ asset('worldmap/build/encom-globe-login.js') }}"></script>
    <script src="{{ asset('worldmap/index-login.js') }}"></script>
    <!-- endref -->        
</head>
@yield('content')

    <!-- <script src="{{ asset('js/login.js') }}"></script> -->

</body>
</html>
