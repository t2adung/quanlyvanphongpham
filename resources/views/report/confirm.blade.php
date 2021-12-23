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
						<div class="container-xl">
							<div class="table-responsive">
								<div class="table-wrapper">
									<div class="table-title">
										<div class="row">
											<div class="col-sm-6"><h4>Xác nhận report</h4></div>
											<div class="col-sm-6 text-right">
												<a href="#addModal" class="btn btn-success btn-sm" data-toggle="modal"><span>Xuất excel</span></a>	
												<a href="{{ route('reports') }}" class="btn btn-success btn-sm" data-toggle="modal"><span>Huỷ</span></a>						
											</div>
										</div>
									</div>
									<div>
										nội dung report
										<br/>
										<br/>
										<br/>
									</div>
								</div>
							</div>  
						</div>
					</div>	
				</div>
			</div>
		</div>     
	</div>
</div> 
@endsection
