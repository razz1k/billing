<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head')
<body>
<div id="app">
    @include('components.header')

    @include('components.main')

    @include('components.footer')
</div>
</body>
</html>
