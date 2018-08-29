@extends('../layouts/layout_admin')

@section('title', 'Cập nhật sản phẩm')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12">
			<form action="{{ route('postAdminUpdateSanPham') }}" enctype="multipart/form-data" method="POST">
				@csrf
				<legend>{{ __('Thêm sản phẩm')}}</legend>
			
				<div class="form-group row">
					<div class="col-6">
						<label for="name">{{ __('Tên sản phẩm')}}</label>
						<input type="hidden" name="id" value="{{ $product['id_sanpham'] }}">
						<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ $product['ten_sanpham'] }}" placeholder="{{ __('Tên sản phẩm') }}">
						@if($errors->has('name'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="col-6">
						<label for="origin">{{ __('Xuất xứ sản phẩm')}}</label>
						<input type="text" class="form-control {{ $errors->has('origin') ? 'is-invalid' : '' }}" id="origin" name="origin" value="{{ $product['xuatxu'] }}" placeholder="{{ __('Xuất xứ sản phẩm') }}">
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
						<input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price" value="{{ $product['giaban'] }}" placeholder="{{ __('Giá sản phẩm') }}">
						@if($errors->has('price'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('price') }} </strong>
							</span>
						@endif
					</div>
					<div class="col-4">
						<label for="categories">{{ __('Loại')}}</label>
						<select class="form-control" data-show-subtext="true" data-live-search="true" name="categories" id="categories">
							@for($i = 0; $i < count($loai); $i++)
								<option value="{{ $loai[$i]->id_loai }}">{{ $loai[$i]->tenloai }}</option>
							@endfor
						</select>
					</div>
					<div class="col-4">
						<label for="producer">{{ __('Nhà sản xuất')}}</label>
						<select class="form-control" name="producer" id="producer">
							@for($i = 0; $i < count($nsx); $i++)
								<option value="{{ $nsx[$i]->id_nhasanxuat }}">{{ $nsx[$i]->ten_nhasanxuat }}</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-12">
						<label for="descript">{{ __('Mô tả sản phẩm') }}</label>
						<textarea name="descript" id="descript">{{ $product['mota'] }}</textarea>
						@if($errors->has('descript'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('descript') }} </strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-12">
						<label for="image_product">{{ __('Hình ảnh sản phẩm') }}</label>
						<br><img class="img-thumbnail" src="{{ asset('image/product/image' . $product['id_sanpham'] . '.png') }}" alt=""><hr>
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
@endsection

@section('script')
	<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
	<script>
		CKEDITOR.replace( 'descript' );
		document.getElementById("nav-product").classList.add("active");
	</script>
@endsection