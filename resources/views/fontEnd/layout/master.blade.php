<!DOCTYPE html>
<html>
<head>
    @include('fontEnd.layout.top')
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
<div id="main-wrapper">
<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>
<!-- preloader -->

<div class="uc-mobile-menu-pusher">
<div class="content-wrapper">
@include('fontEnd.layout.nav')


<!-- Feature News Section -->

@yield('mainContent');

@include('fontEnd.layout.footer')
<!-- #content-wrapper -->

</div>
<!-- .offcanvas-pusher -->

<a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

@include('fontEnd.layout.mobile-nav')
<!-- .uc-mobile-menu -->

</div>
<!-- #main-wrapper -->

<!-- jquery Core-->
@include('fontEnd.layout.bottom')
</body>
</html>