<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Metronic Admin Theme #1 | Blank Page Layout</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for blank page layout" name="description" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/layout/css/layout.css') }}" rel="stylesheet" type="text/css" />
    @stack('css')
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
<div class="page-wrapper">
    @include('layout.main.header.header')
    <div class="page-container">
        @include('layout.main.sidebar.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                {{--@include('layout.main.breadcrumbs')--}}
                <h1 class="page-title">{{ $title or 'Title' }}</h1>
                @yield('content')
            </div>
        </div>
        @include('layout.main.quickbar.quickbar')
    </div>
    {{--@include('layout.main.footer')--}}
</div>
{{--@include('layout.main.quicknav')--}}
<!--[if lt IE 9]>
<script src="{{ asset('/layout/js/ie.js') }}"></script>
<![endif]-->
<script src="{{ asset('/layout/js/layout.js') }}" type="text/javascript"></script>
@stack('js')
</body>
</html>