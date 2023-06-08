<!DOCTYPE HTML>
<html>
  <head>
    @include('frontend.partials.head')
  </head>
  <body>
    
    @include('frontend.partials.header')
    
    <!-- END head -->

    @yield('content-fe')


  
    
    @include('frontend.partials.footer')

    @include('frontend.partials.foot')
   
  </body>
</html>