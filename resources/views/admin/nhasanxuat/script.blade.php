<script>
	var loadData = function(data) {
		//console.log(data);
		var xhtml = "";
		$(data).each(function(index, el) {
			xhtml += "<tr>";
			xhtml += "<td>"+ (index+1) +"</td>";
			xhtml += "<td>"+ el.ten_nhasanxuat +"</td>";
			xhtml += "<td>"+ el.diachi_nhasanxuat +"</td>";
			xhtml += "<td>"+ el.email_nhasanxuat +"</td>";
			xhtml += "<td>"+ el.dienthoai_nhasanxuat +"</td>";
			xhtml += "<td>"+ {{'null'}} +"</td>";
			xhtml += "<td>";
			xhtml += '<div class="dropdown">';
			xhtml += '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" ';
			xhtml += 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Hành động </button>';
			xhtml += '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
			xhtml += '<button class="dropdown-item btn-edit" data-id="'+ el.id_nhasanxuat +'" data-toggle="modal" data-target="#UpdateNsxModal">Cập nhật</button>';
			xhtml += '<button class="dropdown-item btn-del" data-id="'+ el.id_nhasanxuat +'">Xóa</button>';
			xhtml += "</div></div></td></tr>";
		});
		$("#data").html(xhtml);
	};

	var loadAll = function() {
		$.ajax({
			url: '{{ route('getAllAdminNhaSanXuat') }}',
			type: 'GET',
			dataType: 'json',
		})
		.done(function(data) {
			loadData(data);
		})
		.fail(function(err) {
			console.log(err);
		});
	};

	$(document).ready(function() {
		loadAll();
	});

	$('#btn-add').click(function() {
		$.ajax({
			url: '{{ route('postAdminInsertNhaSanXuat') }}',
			type: 'POST',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				name: $('#name').val(),
				phone: $('#phone').val(),
				address: $('#address').val(),
				email: $('#email').val()
			},
		})
		.done(function(data) {
			//console.log(data);
			alert('Thêm nhà sản xuất thành công');

			$('#name').val("");
			$('#phone').val("");
			$('#address').val(""),
			$('#email').val("")

			$('#alert-err').html("");

			loadAll();
		})
		.fail(function(err) {
			//console.log(err.responseJSON);
			var xhtml = "<ul>";
			if(err.responseJSON.errors != undefined) {
				if(err.responseJSON.errors.name != undefined){
					xhtml+= "<li>"+ err.responseJSON.errors.name[0] +"</li>";
				}
				
				if(err.responseJSON.errors.phone != undefined){
					xhtml+= "<li>"+ err.responseJSON.errors.phone[0] +"</li>";
				}

				if(err.responseJSON.errors.email != undefined){
					xhtml+= "<li>"+ err.responseJSON.errors.email[0] +"</li>";
				}

				if(err.responseJSON.errors.address != undefined){
					xhtml+= "<li>"+ err.responseJSON.errors.address[0] +"</li>";
				}
			}

			xhtml += "</ul>";
			$('#alert-err').html(xhtml);
		});
	});	

	$('#data').on('click', '.btn-edit', function() {
		$.ajax({
			url: '{{ route('getOnceAdminNhaSanXuat') }}',
			type: 'get',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				id: $(this).data('id')
			}
		})
		.done(function(data) {
			$("#id-edit").val(data[0].id_nhasanxuat);
			$("#name-edit").val(data[0].ten_nhasanxuat);
			$("#address-edit").val(data[0].diachi_nhasanxuat);
			$("#email-edit").val(data[0].email_nhasanxuat);
			$("#phone-edit").val(data[0].dienthoai_nhasanxuat);
		})
		.fail(function(err) {
			console.log(err);
		})
	});

	$('#btn-edit').click(function() {
		$.ajax({
			url: '{{ route('updateAdminNhaSanXuat') }}',
			type: 'put',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				id: $("#id-edit").val(),
				name: $("#name-edit").val(),
				address: $("#address-edit").val(),
				email: $("#email-edit").val(),
				phone: $("#phone-edit").val()
			}
		})
		.done(function(data) {
			//console.log(data);
			loadData(data);
			alert('Chỉnh sửa ' + $("#name-edit").val() + ' thành công!!');
		})
		.fail(function(err) {
			console.log(err);

			var xhtml = "<ul>";
			if(err.responseJSON.errors != undefined) {
				if(err.responseJSON.errors.name != undefined){
					xhtml+= "<li>"+ err.responseJSON.errors.name[0] +"</li>";
				}
				
				if(err.responseJSON.errors.phone != undefined){
					xhtml+= "<li>"+ err.responseJSON.errors.phone[0] +"</li>";
				}

				if(err.responseJSON.errors.email != undefined){
					xhtml+= "<li>"+ err.responseJSON.errors.email[0] +"</li>";
				}

				if(err.responseJSON.errors.address != undefined){
					xhtml+= "<li>"+ err.responseJSON.errors.address[0] +"</li>";
				}
			}

			xhtml += "</ul>";
			$('#alert-err-edit').html(xhtml);
		})
	});

	$("#data").on('click', '.btn-del', function() {
		$.ajax({
			url: '{{ route('deleteAdminNhaSanXuat') }}',
			type: 'delete',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				id: $(this).data('id')
			}
		})
		.done(function(data) {
			//console.log('success');
			loadAll();
		})
		.fail(function(err) {
			console.log(err);
		});
	});

	$("#btn-search").click(function() {
		$.ajax({
			url: '{{ route('searchAdminNhaSanXuat') }}',
			type: 'GET',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				name: $('#content-search').val()
			},
		})
		.done(function(data) {
			//console.log(data);
			loadData(data);

			if(data == "") {
				$("#data").html("<tr><td colspan='6'><b>Không tìm thấy kết quả</b><td></tr>");
			}
		})
		.fail(function() {
			console.log("error");
		});
		
	});
</script>