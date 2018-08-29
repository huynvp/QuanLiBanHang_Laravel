<script>
	var loadData = function(data, page, type = 1) { //1: loadAll, 2: loadSearch
		//console.log(data);

		var strType = ""; 
		if(type == 1) 
			strType = "paginate-data";
		else strType = "paginate-search";
		var xhtml = "",
			pagination = "";
		$(data.data).each(function(index, el) {
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

		for(var i = 1; i <= data.last_page; i++) {
			if(page == i) {
				pagination += '<li class="page-item active"><button class="page-link">'+i+'</button></li>';
			} else {
				pagination += '<li class="page-item"><button data-page="'+i+'" class="page-link '+ strType +'">'+i+'</button></li>';
			}
		}

		$("#data").html(xhtml);
		$("#pagination").html(pagination);
	};

	var loadAll = function(page = 1) {
		$.ajax({
			url: '{{ route('getAllAdminNhaSanXuat') }}?page=' + page,
			type: 'GET',
			dataType: 'json',
		})
		.done(function(data) {
			//console.log(data);
			loadData(data, page);
		})
		.fail(function(err) {
			console.log(err);
		});
	};

	var loadSearch = function(page = 1) {
		$.ajax({
			url: '{{ route('searchAdminNhaSanXuat') }}?page=' + page,
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
			loadData(data, page, 2);

			if(data == "") {
				$("#data").html("<tr><td colspan='6'><b>Không tìm thấy kết quả</b><td></tr>");
			}
		})
		.fail(function() {
			console.log("error");
		});
	}

	$(document).ready(function() {
		loadAll();
	});

	$('#pagination').on('click', '.paginate-data', function() {
		loadAll($(this).data("page"));
	});

	$('#pagination').on('click', '.paginate-search', function() {
		loadSearch($(this).data("page"));
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
			$("#id-edit").val(data.id_nhasanxuat);
			$("#name-edit").val(data.ten_nhasanxuat);
			$("#address-edit").val(data.diachi_nhasanxuat);
			$("#email-edit").val(data.email_nhasanxuat);
			$("#phone-edit").val(data.dienthoai_nhasanxuat);
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
		loadSearch();
	});
</script>