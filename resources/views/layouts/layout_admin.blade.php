<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/icon.png') }}"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title> @yield('title') - Quản trị </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	@include('../layouts/navbar_admin')
	<main class="py-4">
		@yield('content')
	</main>
	<!-- Scripts -->
	<script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
	@yield('script')
</body>
</html>