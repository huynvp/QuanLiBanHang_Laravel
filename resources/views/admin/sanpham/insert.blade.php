@extends('../layouts/layout_admin')
@section('title', 'Thêm sản phẩm')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12">
			<form action="{{ route('postInsertSanPham') }}" enctype="multipart/form-data" method="POST">
				@csrf
				<legend>{{ __('Thêm sản phẩm')}}</legend>
			
				<div class="form-group row">
					<div class="col-6">
						<label for="name">{{ __('Tên sản phẩm')}}</label>
						<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('Tên sản phẩm') }}">
						@if($errors->has('name'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="col-6">
						<label for="origin">{{ __('Xuất xứ sản phẩm')}}</label>
						<input type="text" class="form-control {{ $errors->has('origin') ? 'is-invalid' : '' }}" id="origin" name="origin" value="{{ old('origin') }}" placeholder="{{ __('Xuất xứ sản phẩm') }}">
						@if($errors->has('origin'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('origin') }} </strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-4">
						<label for="price">{{ __('Giá bán')}}</label>
						<input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price" value="{{ old('price') }}" placeholder="{{ __('Giá sản phẩm') }}">
						@if($errors->has('price'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('price') }} </strong>
							</span>
						@endif
					</div>
					<div class="col-4">
						<label for="categories">{{ __('Loại')}}</label>
						<select class="form-control" name="categories" id="categories">
							<option value="1">Loại 1</option>
							<option value="1">Loại 1</option>
							<option value="1">Loại 1</option>
							<option value="1">Loại 1</option>
							<option value="1">Loại 1</option>
						</select>
					</div>
					<div class="col-4">
						<label for="producer">{{ __('Nhà sản xuất')}}</label>
						<select class="form-control" name="producer" id="producer">
							<option value="1">Loại 1</option>
							<option value="1">Loại 1</option>
							<option value="1">Loại 1</option>
							<option value="1">Loại 1</option>
							<option value="1">Loại 1</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-12">
						<label for="descript">{{ __('Mô tả sản phẩm') }}</label>
						<textarea name="descript" id="descript"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-12">
						<label for="image_product">{{ __('Hình ảnh sản phẩm') }}</label>
						<input type="file" class="form-control {{ $errors->has('image_product') ? 'is-invalid' : '' }}" name="image_product" id="image_product">
						@if($errors->has('image_product'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('image_product') }} </strong>
							</span>
						@endif
					</div>
				</div>
				<button type="submit" class="btn btn-success">Lưu sản phẩm</button>
			</form>
		</div>
	</div>	
</div>
<script src="../../js/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'descript' );
	document.getElementById("nav-product").classList.add("active");
</script>
@endsection
