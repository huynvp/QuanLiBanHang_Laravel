<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="image/icon.png" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title> @yield('title') - Web bán hàng </title>

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4267B2">
		<div class="container">
			<a href="./" class="navbar-brand">Trang chủ</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					@guest
					@else
					<li class="nav-item">
					 	<a class="nav-link" href="#">Danh sách sản phẩm</a>
					</li>
					<li>
					 	<form action="" class="form-inline my-2 my-lg-0">
							<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
						</form>
					</li>
					@endguest
				</ul>
				<ul class="navbar-nav navbar-toggler-right ml-auto">
					@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{__('Đăng nhập')}}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{__('Đăng kí')}}</a>
						</li>
					@else
						<li class="nav-item dropdown dropdown-menu-right">
							<a class="nav-link dropdown-toggle" href="#" id="navbar-top" data-toggle="dropdown">{{ Auth::user()->name }}</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{ route('changeInfo') }}">{{ __('Thay đổi thông tin cá nhân') }}</a>
								<a class="dropdown-item" href="{{ route('changePassword') }}">{{ __('Đổi mật khẩu') }}</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout')}}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">{{ __('Đăng xuất') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
	<main class="py-4">
		@yield('content')
	</main>
</body>
</html>