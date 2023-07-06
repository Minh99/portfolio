<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Start your development with Steller landing page.">
    <meta name="author" content="Devcrud">
    <meta icon="icon" href="{{ asset('assets/imgs/logo.png') }}">
    <title>{{ $teamName }}</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}">
    <!-- Bootstrap + Steller main styles -->
	<link rel="stylesheet" href="{{ asset('assets/css/steller.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/js/slider.js') }}">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    @php($appName = config('app.name'))

    @include('components.header', [$menu, $isDetail, $appName])

    @include('components.detail', [$project, $appName])

    @include('components.footer', [$appName])

    <!-- core  -->
    <script src="{{ asset('assets/vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <!-- bootstrap 3 affix -->
	<script src="{{ asset('assets/vendors/bootstrap/bootstrap.affix.js') }}"></script>

    <!-- steller js -->
    <script src="{{ asset('assets/js/steller.js') }}"></script>

    <script>
        $(document).ready(function() {
            var menus = $('a.nav-link');
            menus.each(function(index, item) {
                $(item).click(function() {
                    console.log($(item).attr('data-go-to'));
                    window.location.href = "/#"+$(item).attr('data-go-to');
                });
            });
        });
    </script>
</body>
</html>
