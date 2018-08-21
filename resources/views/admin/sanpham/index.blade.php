@extends('../layouts/layout_admin')

@section('title', 'Sản phẩm')

@section('content')
	<div class="container">
		<h3>Quản lí sản phẩm</h3>
		<a href="{{ route('getAdminInsertSanPham') }}" class="btn btn-warning btn-sm">Thêm sản phẩm mới</a>
		<table class="table table-bordered table-responsive table-hover table-striped">
			<thead class="bg-dark text-white">
				<th>Số thứ tự</th>
				<th>Tên</th>
				<th>Giá bán</th>
				<th>Lượt bán</th>
				<th>Loại</th>
				<th>Nhà sản xuất</th>
				<th>Xem chi tiết</th>
				<th>Cập nhật sản phẩm</th>
			</thead>

			@foreach($product as $index => $value)
				<tr>
					<td>{{ $index+1 }}</td>
					<td>{{ $value['ten_sanpham'] }}</td>
					<td>{{ $value['giaban'] }} vnd </td>
					<td>{{ $value['luotban'] }}</td>
					<td>{{ $value['tenloai'] }}</td>
					<td>{{ $value['tensx'] }}</td>
					<td><a href="{{ route('detailAdminSanPham', ['id' => $value['id_sanpham']]) }}">Xem chi tiết</a></td>
					<td><a href="{{ route('getAdminUpdateSanPham', ['id' => $value['id_sanpham']]) }}">Cập nhật sản phẩm</a></td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection
