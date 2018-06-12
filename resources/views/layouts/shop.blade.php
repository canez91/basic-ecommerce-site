<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
</head>
<body>
    <div id="app">
    @include('includes.header')

    @include('includes.navigation')
    
    @yield('content')

    @include('includes.footer')
    </div>
</body>
</html>
