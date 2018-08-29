@extends('../layouts/layout_admin')

@section('title', 'Nhà sản xuất')

@section('content')
	<div class="container">
		<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#AddNsxModal">
			Thêm nhà sản xuất mới
		</button>
		<hr>
		<h3>Nhà sản xuất</h3>

		<div class="float-right">
			<form action="">
				<div class="form-group form-inline">
					<input id="content-search" style="margin-right: 7px" class="form-control-sm" type="text" placeholder="Tìm kiếm">
					<button id="btn-search" type="button" class="btn btn-success btn-sm">Tìm kiếm</button>
				</div>
			</form>
		</div>
		
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Số thứ tự</th>
						<th>Tên</th>
						<th>Địa chỉ</th>
						<th>Email</th>
						<th>Điện thoại</th>
						<th>Số sản phẩm</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody id="data"></tbody>
			</table>

			<ul class="pagination pagination-lg justify-content-center" id="pagination"></ul>
		</div>
		@include('../../admin/nhasanxuat/modal_insert')
		@include('../../admin/nhasanxuat/modal_update')
	</div>
@endsection

@section('script')
	@include('../../admin/nhasanxuat/script')
@endsection