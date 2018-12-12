<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    @include("includes.links")
    <title>@yield("title","YoruTracer")</title>
    @yield('style')
</head>
<body>
    @yield('content')

    @include("includes.scripts")
    @yield('script')
</body>
</html>
