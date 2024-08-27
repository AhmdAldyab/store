<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('layouts.head')
    </head>
    <body>
        <div class="container p-0" style="background-color: #EEE">
            @include('layouts.header')
            @yield('content')
            @yield('footer')
        </div>
        @include('layouts.footerscripts')
    </body>
</html>
