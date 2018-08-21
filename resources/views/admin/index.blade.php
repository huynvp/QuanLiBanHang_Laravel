@extends('../layouts/layout_admin')
@section('title', 'Trang chủ')

@section('content')

<div class="container">
	<h3>Trang quản trị</h3>

	<div class="row">
		<div class="col-3">
			<div class="card">
				<div class="card-header text-white bg-info">Quản lí sản phẩm</div>
				<div class="card-body">
					<p><strong>Tổng số sản phẩm: </strong></p>
					<p><strong>Số sản phẩm đã xóa: </strong></p>
					<p><strong>Sản phẩm thêm gần đây:</strong> Sam sung galaxy s11</p>
					<a href="{{ route('indexAdminSanPham') }}" class="btn btn-secondary">Quản lí sản phẩm</a>
				</div>
			</div>
		</div>

		<div class="col-3">
			<div class="card">
				<div class="card-header text-white bg-success">Quản lí đơn hàng</div>
				<div class="card-body">
					<div class="list-group">
						<div class="list-group-item">Số đơn hàng đã giao: </div>
						<div class="list-group-item">Số đơn hàng đang giao: </div>
						<div class="list-group-item">Số đơn hàng chưa giao: </div>
						<div class="list-group-item list-group-item-success"><a href="#">Quản lí đơn hàng</a></div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-3">
			<div class="card">
				<div class="card-header text-white bg-danger">Quản lí loại</div>
				<div class="card-body">
					<p><strong>Tổng số loại: </strong></p>
					<p><strong>Số loại đã xóa: </strong></p>
					<p><strong>Loại thêm gần đây</strong></p>
					<a href="" class="btn btn-secondary">Quản lí loại</a></div>
				</div>
		</div>

		<div class="col-3">
			<div class="card">
				<div class="card-header text-white bg-warning">Quản lí nhà sản xuất</div>
				<div class="card-body">
					<p><strong>Tổng số nhà sản xuất: </strong></p>
					<p><strong>Các nhà sản xuất đã xóa: </strong></p>
					<p><strong>Nhà sản xuất thêm gần đây</strong></p>
					<a href="{{ route('indexAdminNhaSanXuat') }}" class="btn btn-secondary">Quản lí nhà sản xuất</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection