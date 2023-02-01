<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Start your development with Steller landing page.">
    <meta name="author" content="Devcrud">
    <title>Steller Landing page | Free Bootstrap 4.1 landing page</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}">
    <!-- Bootstrap + Steller main styles -->
	<link rel="stylesheet" href="{{ asset('assets/css/steller.css') }}">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    @include('components.header', $menu)

    @each('components.member',  $members, 'member', 'view.empty')

    @include('components.skills')

    @include('components.services')

    {{-- Portfilo --}}
    @include('components.projects')

    @include('components.hireMe')

    @include('components.contact')

    @include('components.footer')

    <!-- core  -->
    <script src="{{ asset('assets/vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <!-- bootstrap 3 affix -->
	<script src="{{ asset('assets/vendors/bootstrap/bootstrap.affix.js') }}"></script>

    <!-- steller js -->
    <script src="{{ asset('assets/js/steller.js') }}"></script>
</body>
</html>
