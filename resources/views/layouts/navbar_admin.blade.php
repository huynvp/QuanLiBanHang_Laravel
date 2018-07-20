<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4267B2">
	<div class="container">
		<a href="{{ route('getIndexAdmin') }}" class="navbar-brand">Trang chủ</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				@if(Auth::guard('admin')->check())
					<li class="nav-item" id="nav-product">
						<a class="nav-link" href="{{ route('indexSanPham') }}">Quản lí sản phẩm</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Quản lí danh mục</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Quản lí loại</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Quản lí nhà sản xuất</a>
					</li>
				
				@endif
			</ul>
			<ul class="navbar-nav navbar-toggler-right ml-auto">
				@if(!Auth::guard('admin')->check())
					<li class="nav-item">
						<a class="nav-link" href="{{ route('getLoginAdmin') }}">{{__('Đăng nhập')}}</a>
					</li>
				@else
					<li class="nav-item dropdown dropdown-menu-right">
						<a class="nav-link dropdown-toggle" href="#" id="navbar-top" data-toggle="dropdown">{{ Auth::guard('admin')->user()->name }}</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{ route('logoutAdmin')}}">{{ __('Đăng xuất') }}
							</a>
						</div>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>