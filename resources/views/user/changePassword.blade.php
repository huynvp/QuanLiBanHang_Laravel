@extends('../layouts/layout')

@section('title', 'Đổi mật khẩu')

@section('content')
	<script>
		function check(){
			//alert('123');
			if($('#newpass').val() != $('#renewpass').val()){
				alert($('#newpass').val());
				return false;
			}
			//else return true;
			return false;
		}
	</script>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card">
					<div class="card-header">{{__('Thay đổi mật khẩu')}}</div>
					<div class="card-body">
						<form action="{{ route('changePassword') }}" method="post" accept-charset="utf-8" onsubmit="check()">
							@csrf
							<div class="form-group row">
								<label for="oldpass" class="col-4 col-form-label text-md-right">{{__('Mật khẩu cũ')}}</label>
								<div class="col-6">
									<input class="form-control {{ $errors->has('oldpass') ? 'is-invalid' : '' }}" id="oldpass" type="password" name="oldpass" value="{{ old('oldpass') }}" autofocus>

									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('oldpass') }}</strong>
									</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="newpass" class="col-4 col-form-label text-md-right">{{__('Mật khẩu mới')}}</label>
								<div class="col-6">
									<input class="form-control {{ $errors->has('newpass') ? 'is-invalid' : '' }}" id="newpass" type="password" name="newpass" value="{{ old('newpass') }}" autofocus>

									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('newpass') }}</strong>
									</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="renewpass" class="col-4 col-form-label text-md-right">{{__('Nhập lại mật khẩu mới')}}</label>
								<div class="col-6">
									<input class="form-control {{ $errors->has('renewpass') ? 'is-invalid' : '' }}" id="renewpass" type="password" name="renewpass" value="{{ old('renewpass') }}" autofocus>

									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('renewpass') }}</strong>
									</span>
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-6 offset-4">
									<input class="btn btn-success" onclick="" type="submit" value="{{__('Thay đổi mật khẩu')}}">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection