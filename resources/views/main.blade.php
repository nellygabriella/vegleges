<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials._head')
    </head>
   
    <body>
    
    <div class="super-container">

        <header class="header d-flex flex-row">
            @include('partials._nav')
        </header>


        @include('partials._home')
        @include('partials._message')

       @yield('content')

        <footer class="footer">
            @include('partials._footer')
        </footer>
    </div>



        
        @include('partials._javascript')
        @yield('scripts')
    </body>
</html>