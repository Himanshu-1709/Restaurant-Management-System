<div>
    <div class="row">
    @foreach($list as $key)
            <div class="col-xl-4">
				<div class="card text-white bg-warning">
					<div class="card-header">
						<h5 class="card-title text-white">{{$key['name']}}</h5>
					</div>
					<div class="card-body mb-0">
						<p class="card-text">{{$key['description']}}</p>
					</div>
					<div class="card-body d-flex justify-content-center align-items-center">
                    <a href="javascript:void(0);" class="btn bg-white text-warning btn-card">Make Payment</a>
					</div>
					<div class="card-footer bg-transparent border-0 text-white">Last updateed 3 min ago
					</div>
				</div>
            </div>
    @endforeach
</div>
</div>