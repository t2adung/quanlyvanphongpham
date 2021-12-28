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
							<a class="nav-link" id="home-tab" href="{{ route('products') }}">QUẢN LÝ DANH SÁCH VPP</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" id="profile-tab" href="{{ route('reports') }}">IN BÁO CÁO</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						@if (session('error'))
                            <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                            {{session('success') }}
                            </div>
                        @endif
						<form action="{{ route('report_confirm') }}" method="post">
							@csrf
							<div class="form-group row">
								<label for="inputMonth" class="col-sm-2 col-form-label">Tháng</label>
								<div class="col-sm-4">
									<select id="inputMonth" class="form-control" name="month">
										@for ($i = 1; $i <= 12; $i++)
											<option value="{{ $i }}" {{ ($i == $current_month) ? ' selected="selected"' : '' }}>Tháng {{ $i }}</option>
										@endfor
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputYear" class="col-sm-2 col-form-label">Năm</label>
								<div class="col-sm-4">
									<select id="inputYear" class="form-control" name="year">
										@for ($y = 2021; $y <= 2031; $y++)
											<option value="{{ $y }}" {{ $y == $current_year ? ' selected' : '' }}>{{ $y }}</option>
										@endfor
									</select>
								</div>
							</div>
							<fieldset class="form-group row">
								<legend class="col-form-label col-sm-2 float-sm-left pt-0">Chọn loại báo cáo</legend>
								<div class="col-sm-10">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="type" id="productReport" value="1" checked>
										<label class="form-check-label" for="productReport">
											In báo cáo theo văn phòng phẩm
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="type" id="userReport" value="2">
										<label class="form-check-label" for="userReport">
											In báo cáo theo nhân viên
										</label>
									</div>
								</div>	
							</fieldset>
							
							<div class="form-row">
								<button type="submit" class="btn btn-primary">Xác nhận</button>
							</div>		
						</form>
					</div>
				</div>
			</div>
		</div>     
	</div>
</div> 
@endsection
