<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
    </head>
    <body>
          <!--wrapper -->
        <div id="wrapper">
        @include('layouts.header')

        <div class="content-page">
            @yield('content')

        </div>
       
    </body>
</html>
