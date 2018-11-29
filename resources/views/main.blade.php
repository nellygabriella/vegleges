<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials._head')
        @yield('stylesheets')
    </head>
   
    <body>
    
        <div class="super-container">
        @include('partials._nav')

        @include('partials._home')
        @include('partials._message')

        @yield('content')

        
        @include('partials._footer')


        
        @include('partials._javascript')
        @yield('scripts')
    </body>
</html>