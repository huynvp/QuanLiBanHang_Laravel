@extends('layouts/layout_user')

@section('title', 'Trang chủ')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col col-sm">
				<ul class="list-group">
					<li class="list-group-item">Item 1</li>
					<li class="list-group-item">Item 2</li>
					<li class="list-group-item">Item 3</li>
				</ul>
			</div>
			<div class="col-6 col-sm-12 col-md-6">
				<div class="card">
					<div class="card-header bg-primary text-white">Sản phẩm mới nhất</div>
					<div class="card-body">
						<div class="row">
							<div class="card col-6">
								<img class="card-img-top" src="https://www.sample-videos.com/img/Sample-jpg-image-500kb.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Card title</h5>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
							<div class="card col-6">
								<img class="card-img-top" src="https://www.sample-videos.com/img/Sample-jpg-image-500kb.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Card title</h5>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
							<div class="card col-6">
								<img class="card-img-top" src="https://www.sample-videos.com/img/Sample-jpg-image-500kb.jpg" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title">Card title</h5>
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header bg-success text-white">Sản phẩm bán chạy nhất</div>
					<div class="card-body">
						123
					</div>
				</div>
				<div class="card">
					<div class="card-header bg-secondary text-white">Sản phẩm được xem nhiều nhất</div>
					<div class="card-body">
						123
					</div>
				</div>
			</div>
			<div class="col col-sm col-md">
				<div class="card bg-info border-info">
					<div class="card-header">Loại sản phẩm</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Loại 1</li>
						<li class="list-group-item">Loại 1</li>
						<li class="list-group-item">Loại 1</li>
					</ul>
				</div>

				<hr>

				<div class="card bg-info border-info">
					<div class="card-header">Nhà sản xuất</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Loại 1</li>
						<li class="list-group-item">Loại 1</li>
						<li class="list-group-item">Loại 1</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
		
@endsection