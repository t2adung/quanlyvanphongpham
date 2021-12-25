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
							<a class="nav-link active" id="home-tab" href="{{ route('products', ['type' => 1]) }}">QUẢN LÝ DANH SÁCH VPP</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" href="{{ route('reports') }}">IN BÁO CÁO</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="container-xl">
							<div class="table-responsive">
								<div class="table-wrapper">
									<div class="table-title">
										<div class="row">
											<div class="col-sm-6"><h4>Danh sách VPP dùng riêng</h4></div>
											<div class="col-sm-6 text-right">
												<a href="#addModal" class="btn btn-success btn-sm" data-toggle="modal"><span>Thêm mới</span></a>						
											</div>
										</div>
									</div>
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th width="10%">STT</th>
												<th width="70%">Tên</th>
												<th></th>
											</tr>
										</thead>
										<tbody class="page-data">
											@foreach ($personal_products as $product)
												<tr>
													<td width="10%">{{ $loop->index + 1}}</td>
													<td>{{ $product->name }}</td>
													<td>
														<a href="#editModal" class="edit" data-toggle="modal">Chỉnh sửa</a> |
														<a href="#deleteModal" class="delete" data-toggle="modal">Xoá</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
									<!--
									<nav aria-label="..." class="text-center">
										<ul class="pagination">
											<li class="page-item disabled">
											<a class="page-link" href="#" tabindex="-1">Previous</a>
											</li>
											<li class="page-item"><a class="page-link" href="#">1</a></li>
											<li class="page-item active">
											<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
											</li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item">
											<a class="page-link" href="#">Next</a>
											</li>
										</ul>
									</nav>
									-->
								</div>
							</div>        
						</div>
						<br/>
						<br/>
						<br/>
						<div class="container-xl">
							<div class="table-responsive">
								<div class="table-wrapper">
									<div class="table-title">
										<div class="row">
											<div class="col-sm-6"><h4>Danh sách VPP dùng chung</h4></div>
											<div class="col-sm-6 text-right">
												<a href="#addModal" class="btn btn-success btn-sm" data-toggle="modal"><span>Thêm mới</span></a>						
											</div>
										</div>
									</div>
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th width="10%">STT</th>
												<th width="70%">Tên</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($department_products as $product)
												<tr>
													<td width="10%">{{ $loop->index + 1}}</td>
													<td>{{ $product->name }}</td>
													<td>
														<a href="#editModal" class="edit" data-toggle="modal">Chỉnh sửa</a> |
														<a href="#deleteModal" class="delete" data-toggle="modal">Xoá</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
									<!--
									<nav aria-label="..." class="text-center">
										<ul class="pagination">
											<li class="page-item disabled">
											<a class="page-link" href="#" tabindex="-1">Previous</a>
											</li>
											<li class="page-item"><a class="page-link" href="#">1</a></li>
											<li class="page-item active">
											<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
											</li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item">
											<a class="page-link" href="#">Next</a>
											</li>
										</ul>
									</nav>
								-->
								</div>
							</div>        
						</div>
					</div>
				</div>
			</div>
		</div>     
	</div>
</div>
<div id="editModal" class="modal fade hide" aria-modal="true">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">				
                    <h4 class="modal-title">Cập nhật văn phòng phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
					<div class="form-group row">
						<label for="productName" class="col-sm-2 col-form-label text-right">Tên vpp: </label>
						<div class="col-sm-8">
						<input type="text" class="form-control" id="productName">
						</div>
					</div>                 
                </div>
                <div class="modal-footer">
					<input type="hidden" name="id">
                    <input type="button" class="btn btn-link" data-dismiss="modal" value="Huỷ">
                    <input type="submit" class="btn btn-info" value="Đồng ý">
                </div>
            </form>
		</div>
	</div>
</div>
<div id="deleteModal" class="modal fade hide" aria-modal="true">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">				
                    <h4 class="modal-title">Xoá văn phòng phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
					<div class="form-group row">
						<label for="productName" class="col-sm-2 col-form-label text-right">Tên vpp: </label>
						<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" id="productName">
						</div>
					</div>                 
                </div>
                <div class="modal-footer">
					<input type="hidden" name="id">		
					<input type="button" class="btn btn-link" data-dismiss="modal" value="Huỷ">
					<input type="submit" class="btn btn-info" value="Đồng ý">
                </div>
            </form>
		</div>
	</div>
</div>
<div id="addModal" class="modal fade hide" aria-modal="true">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">				
                    <h4 class="modal-title">Thêm mới văn phòng phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
					<div class="form-group row">
						<label for="productName" class="col-sm-2 col-form-label text-right">Tên vpp: </label>
						<div class="col-sm-8">
						<input type="text" class="form-control" id="productName">
						</div>
					</div>	               
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-link" data-dismiss="modal" value="Huỷ">
                    <input type="submit" class="btn btn-info" value="Đồng ý">
                </div>
            </form>
		</div>
	</div>
</div>
@endsection
