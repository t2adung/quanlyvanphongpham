@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">QUẢN TRỊ VIÊN</div> 
				<div class="card-body">
					<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link" id="home-tab" href="{{ route('products', ['type' => 1]) }}">QUẢN LÝ DANH SÁCH VPP</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" id="profile-tab" href="{{ route('reports') }}">IN BÁO CÁO</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<form action="" method="post">
							<div class="form-row">
								<div class="form-group col-md-6">
								<label for="inputMonth">Tháng</label>
									<select id="inputMonth" class="form-control">
										<option selected></option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="inputYear">Năm</label>
									<select id="inputYear" class="form-control">
										<option selected>2022</option>
										<option>2022</option>
										<option>2023</option>
										<option>2024</option>
										<option>2025</option>
									</select>
								</div>
							</div>
							<button type="button" class="btn btn-primary btn-lg btn-report">In báo cáo<br/>theo VPP</button>
							<button type="button" class="btn btn-secondary btn-lg btn-report">In báo cáo<br/>theo nhân viên</button>
						</form>
					</div>
				</div>
			</div>
		</div>     
	</div>
</div> 
@endsection
