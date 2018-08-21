@extends('../../layouts/layout_admin')

@section('title', 'Loại sản phẩm')

@section('content')
<div class="container">
	<h3>Loại sản phẩm</h3>
	
	<button class="btn btn-info" data-toggle="modal" data-target="#add-modal">Thêm loại mới</button>
	<hr>
	<div class="col-md-6 col-lg-6 col-sm-12">
		<ul class="list-group" id="data"></ul>
	</div>

	@include('../../admin/loai/modal_add')
</div>
@endsection

@section('script')
	@include('../../admin/loai/script')
@endsection