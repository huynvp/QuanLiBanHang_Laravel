<script>
	var loadData = function(data) {
		var xhtml = "";

		$(data).each(function(index, value) {
			xhtml += '<li class="list-group-item">';
			xhtml += 'Tên loại: ' + value.tenloai;
			xhtml += ' <div class="btn-group">';
			xhtml += '<button class="btn btn-sm btn-success btn-edit">Sửa đổi</button>';
			xhtml += '<button class="btn btn-sm btn-danger btn-del">Xóa</button>';
			xhtml += '</div></li>';
		})
		$('#data').html(xhtml);
	};

	var loadAll = function() {
		$.ajax({
			url: '{{ route('getAllAdminLoai') }}',
			type: 'GET',
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN' : $("meta[name='csrf-token']").attr('content')
			}
		})
		.done(function(data) {
			loadData(data);
		})
		.fail(function(err) {
			console.log(err);
		});
	}

	$(document).ready(function() {
		loadAll();

		//add
		$("#btn-add").click(function() {
			$.ajax({
				url: '{{ route('potsAddAdminLoai') }}',
				type: 'post',
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					name: $('name-add').val()
				}
			}).done(function() {
				console.log('địt mẹ thêm được nha');
			}).fail(function() {
				console.log('địt mẹ đéo thêm được');
			})
		});
	});
</script>