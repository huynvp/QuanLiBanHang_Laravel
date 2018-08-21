<div class="modal fade" id="AddNsxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Thêm nhà sản xuất</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert-danger" id="alert-err"></div>
				<form class="col-8 justify-content-center">
					<div class="row form-group">
						<div class="col">
							<label for="name">Tên nhà sản xuất</label>
							<input class="form-control" type="text" id="name" placeholder="Tên nhà sản xuất">
						</div>
					</div>
					<div class="row form-group">
						<div class="col">
							<label for="address">Địa chỉ</label>
							<input class="form-control" type="text" id="address" placeholder="Địa chỉ nhà sản xuất">
						</div>
					</div>
					<div class="row form-group">
						<div class="col">
							<label for="email">Email</label>
							<input class="form-control" type="email" id="email" placeholder="Email nhà sản xuất">
						</div>
					</div>
					<div class="row form-group">
						<div class="col">
							<label for="phone">Điện thoại</label>
							<input class="form-control" type="text" id="phone" placeholder="Điện thoại nhà sản xuất">
						</div>
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
				<button type="submit" class="btn btn-primary" id="btn-add">Thêm</button>
			</div>
		</div>
	</div>
</div>