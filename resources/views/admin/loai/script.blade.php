<script>
	var loadData = function(data, current_page, last_page) {
		var xhtml = "",
			pagination = "";

		$(data).each(function(index, value) {
			xhtml += '<li class="list-group-item">';
			xhtml += 'Tên loại: ' + value.tenloai;
			xhtml += ' <div class="btn-group">';
			xhtml += '<button class="btn btn-sm btn-success btn-edit" data-id="'+value.id_loai+'" data-toggle="modal" data-target="#edit-modal">Sửa đổi</button>';
			xhtml += '<button class="btn btn-sm btn-danger btn-del" data-id="'+value.id_loai+'">Xóa</button>';
			xhtml += '</div></li>';
		});

		for(var i = 1; i <= last_page; i++) {
			if(current_page == i) {
				pagination += '<li class="page-item active"><span class="page-link">'+i+'</span></li>';
			} else {
				pagination += '<li class="page-item"><button data-page='+i+' class="page page-link">'+i+'</a></li>';
			}
		}

		$('#pagination').html(pagination);
		$('#data').html(xhtml);
	};

	var loadAll = function(page=1) {
		$.ajax({
			url: '{{ route('getAllAdminLoai')}}?page='+page,
			type: 'GET',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN' : $("meta[name='csrf-token']").attr('content')
			}
		})
		.done(function(data) {
			//console.log(data);
			loadData(data.data, data.current_page, data.last_page);
		})
		.fail(function(err) {
			console.log(err);
		});
	}

	$(document).ready(function() {
		loadAll();

		$("#pagination").on('click', '.page', function() {
			loadAll($(this).data('page'));
		});

		//add
		$("#btn-add").click(function() {
			$.ajax({
				url: '{{ route('addAdminLoai') }}',
				type: 'post',
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					name: $('#name-add').val()
				}
			}).done(function(data) {
				alert('Thêm ' + $('#name-add').val() + ' thành công');
				loadAll();
			}).fail(function(err) {
				console.log(err);
			})
		});

		$("#data").on('click', '.btn-edit', function() {
			$.ajax({
				url: '{{ route('getOnceAdminLoai') }}',
				type: 'get',
				dataType: 'json',
				data: {
					id: $(this).data('id')
				}
			})
			.done(function(data) {
				$("#name-edit").val(data.tenloai);
				$("#id-edit").val(data.id_loai);
			})
			.fail(function(err) {
				console.log(err);
			})
		});

		$("#btn-update").click(function() {
			$.ajax({
				url: '{{ route('updateAdminLoai') }}',
				type: 'put',
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					id: $("#id-edit").val(),
					name: $("#name-edit").val()
				}
			})
			.done(function(data) {
				loadAll(data);
				alert('Cập nhật thành công!');
			})
			.fail(function(err) {
				console.log(err);
			})
		});

		$("#data").on('click', '.btn-del', function() {
			if(confirm("Bạn có chắc chắn xóa loại ?")) {
				$.ajax({
					url: '{{ route('deleteAdminLoai') }}',
					type: 'DELETE',
					dataType: 'json',
					headers: {
						'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
					},
					data: {
						id: $(this).data("id")
					},
				})
				.done(function(data) {
					loadAll(data);
				})
				.fail(function(err) {
					console.log(err);
				});
			}			
		});

	});
</script>
