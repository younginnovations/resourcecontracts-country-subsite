<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{url('images/favicon.ico')}}">
    <title>{{ get_country('name') }} - Resource Contracts</title>

    <link href="{{url('css/main.min.css')}}" rel="stylesheet">

    <link href="{{url('css/country-style.css')}}" rel="stylesheet">
    <link href="{{url('css/color-country-view.css')}}" rel="stylesheet">

    @yield('css')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script>
        var app_url = '{{ url()}}';
    </script>
    <![endif]-->
</head>
<body data-spy="scroll">
<div id="wrapper">
    <div id="page-wrapper" class="not-front sidebar-collapse-container">
