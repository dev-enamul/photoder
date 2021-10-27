<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('top')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('fontEnd/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontEnd/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontEnd/css/templatemo-style.css')}}">
<!--  
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body>
    <!-- Page Loader -->
 

    @include('fontEnd.layout.include.nav')
   
    @include('fontEnd.layout.include.loader')
    @yield('content')

  @include('fontEnd.layout.include.footer')
    
    <script src="{{asset('fontEnd/js/plugins.js')}}"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>