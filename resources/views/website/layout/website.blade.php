<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kais Diving :: @yield('title')</title>

    @include('website.parts.defaultHead')

</head>

<body>
<div class="preloader">
    <img src="{{asset('assets/images/preloader.png')}}" class="preloader__image" alt="">
</div><!-- /.preloader -->
<div class="page-wrapper">

    @include('website.parts.header')

    @yield('content')

    @include('website.parts.footer')

</div><!-- /.page-wrapper -->

@include('website.parts.sideMenu')

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

@include('website.parts.bottomScripts')

</body>

</html>
