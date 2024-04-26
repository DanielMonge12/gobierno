<!DOCTYPE html>
<html>
  <head>
  @vite(['resources/css/styles2.css','resources/js/scripts.js'])
    <title>@yield('tittle')</title>
    <link rel="icon" href="{{ asset('images/VVKTlogo.jpg') }}">
    
  </head>
  <body>
  @yield('content')

  </body>
</html>