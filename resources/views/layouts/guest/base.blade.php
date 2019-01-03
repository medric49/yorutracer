<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    @include("includes.links")
    <title>@yield("title","YoruTracer")</title>
    <link rel="stylesheet" href="{{asset('css/guest.css')}}">
    @yield('style')
</head>
<body>
@include('components.guest.header')
@yield('content')

@include('components.guest.footer')
@include("includes.scripts")
@yield('script')
</body>
</html>
