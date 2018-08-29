@extends('../layouts/layout_admin')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<div class="container">
	<h3>Chi tiết sản phẩm</h3>
	<div class="row">
		<div class="col-6">
			<img class="img-fluid" src="{{ asset('image/product/image'. $product[0]['id_sanpham'] .'.png') }}" alt="">
			<div class="container-fuild">
				<hr>
				<h5>Mô tả sản phẩm: </h5>
				{!! $product[0]['mota'] !!}
			</div>
		</div>
		<div class="col-6">
			<h3>Thông tin sản phẩm</h3>
			<ul class="list-group">
				<li class="list-group-item">
					Tên sản phẩm: {{$product[0]['ten_sanpham']}}
				</li>
				<li class="list-group-item">
					Lượt xem: {{$product[0]['luotxem']}}
				</li>
				<li class="list-group-item">
					Lượt bán: {{$product[0]['luotban']}}
				</li>
				<li class="list-group-item">
					Xuất xứ: {{$product[0]['xuatxu']}}
				</li>
				<li class="list-group-item">
					Giá bán: {{$product[0]['giaban']}}
				</li>
				<li class="list-group-item">
					Loại: {{$product[0]['tenloai']}}
				</li>
				<li class="list-group-item">
					Nhà sản xuất: {{$product[0]['tensx']}}
				</li>
				<li class="list-group-item">
					<div class="row">
						<div class="col">
							<button class="btn btn-success btn-block">{{ __('Chỉnh sửa sản phẩm') }}</button>
						</div>
						<div class="col">
							<form action="{{ route('deleteAdminSanPham') }}" method="post">
								@csrf
								<input type="hidden" name="sp" value="{{ $product[0]['id_sanpham'] }}">
								<input type="submit" class="btn btn-danger btn-block" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')"{{ __('Xóa sản phẩm') }} />
							</form>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>

@endsection