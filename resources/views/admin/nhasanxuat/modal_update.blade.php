<div class="modal fade" id="UpdateNsxModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId">Sửa nhà sản xuất</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="alert-err-edit">
				</div>
				<form class="col-8 justify-content-center">
					<div class="row form-group">
						<div class="col">
							<label for="name">Tên nhà sản xuất</label>
							<input class="form-control" type="text" id="name-edit" placeholder="Tên nhà sản xuất">
							<input type="hidden" id="id-edit"/>
						</div>
					</div>
					<div class="row form-group">
						<div class="col">
							<label for="address">Địa chỉ</label>
							<input class="form-control" type="text" id="address-edit" placeholder="Địa chỉ nhà sản xuất">
						</div>
					</div>
					<div class="row form-group">
						<div class="col">
							<label for="email">Email</label>
							<input class="form-control" type="email" id="email-edit" placeholder="Email nhà sản xuất">
						</div>
					</div>
					<div class="row form-group">
						<div class="col">
							<label for="phone">Điện thoại</label>
							<input class="form-control" type="text" id="phone-edit" placeholder="Điện thoại nhà sản xuất">
						</div>
					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-edit">Lưu</button>
            </div>
        </div>
    </div>
</div>