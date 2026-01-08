<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ strip_tags($application['description']) }}" />
    <title>{{ $title }} | {{ $application['name'] }}</title>

    <!-- DEVELOPED BY BEKENWEB (https://bkn.my.id) -->

    <!--=====FAB ICON=======-->
    <x-home.head></x-home.head>
</head>

<body class="homepage1-body">

<!--===== PRELOADER STARTS =======-->
<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon">
            <img src="{{ $application['logo'] }}" alt="">
        </div>
    </div>
</div>
<!--===== PRELOADER ENDS =======-->

<!-- ===================== HEADER TOP AREA START =====================-->
<x-home.header-top></x-home.header-top>
<!-- ===================== HEADER TOP AREA END =====================-->

<!--=====HEADER START=======-->
<x-home.header></x-home.header>
<!--=====HEADER END =======-->

<!--===== MOBILE HEADER STARTS =======-->
<x-home.mobile-header></x-home.mobile-header>
<!--===== MOBILE HEADER STARTS =======-->

{{ $slot }}

<!--===== CTA STARTS =======-->
{{--<x-home.cta></x-home.cta>--}}
<!--===== CTA ENDS =======-->

<!--===== FOOTER AREA STARTS =======-->
<x-home.footer></x-home.footer>
<!--===== FOOTER AREA ENDS =======-->

<!-- scroll top -->
<div class="paginacontainer">
    <div class="progress-wrap progress-wrap5">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>
</div>


<!--===== JS SCRIPT LINK =======-->
<x-home.scripts></x-home.scripts>

</body>
</html>
