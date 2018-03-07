<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.header')
    </head>
    <body>
        <div class="content">
            @yield('content')
        </div>
    </body>
    @include('layouts.footer')
</html>
