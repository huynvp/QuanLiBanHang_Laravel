@extends('../layouts/layout_admin')
@section('title', 'Đăng nhập')

<!--Auth::guard('admin')->attempt(['username' => 'admin', 'password' => 'admin'])-->
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-6">
			<div class="card">
				<div class="card-header">{{ _('Đăng nhập quản trị viên') }}</div>
				<div class="card-body">
				<form action="{{ route('postLoginAdmin') }}" method="post">
					@csrf
					<div class="row form-group">
						<div class="col-4">
							<label for="username">Tên đăng nhập</label>
						</div>
						<div class="col-8">
							<input class="form-control" id="username" name="username" type="text" autofocus>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-4">
							<label for="password">Mật khẩu</label>
						</div>
						<div class="col-8">
							<input class="form-control" id="password" name="password" type="password">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-6 offset-4">
							<input type="submit" class="btn btn-success" value="Đăng nhập">
						</div>
					</div>
				</form>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection