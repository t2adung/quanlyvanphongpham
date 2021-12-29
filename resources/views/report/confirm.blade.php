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
						<form action="{{ route('report_export') }}" method="post">
							<div class="container-xl">
							<div class="table-responsive">
									<div class="table-wrapper">
										<div class="table-title">
											<div class="row">
													@csrf
													<input type="hidden" name="year" value="{{ $year }}">
													<input type="hidden" name="month" value="{{ $month }}">
													<input type="hidden" name="type" value="{{ $type }}">
													<div class="col-sm-6"><h3>Tháng {{ $month}}/{{$year}}</h3></div>
													<div class="col-sm-6 text-right">
														<input type="submit" class="btn btn-primary btn-sm" value="Xuất excel">
														<input type="button" href="{{ route('reports') }}" class="btn btn-success btn-sm" value="Quay lại">
													</div>
											</div>
										</div>
										<div style="margin-top: 20px"> 
											@if ($type == 1) 
												@include('report.inc.product')
											@else
												@include('report.inc.user')
											@endif
										</div>
									</div>
								</div>  
							</div>
						</form>	
					</div>	
				</div>
			</div>
		</div>     
	</div>
</div> 
@endsection
