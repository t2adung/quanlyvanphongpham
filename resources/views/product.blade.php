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
						<div class="container-xl">
							<div class="table-responsive">
								<div class="table-wrapper">
									<div class="table-title">
										<div class="row">
											<div class="col-sm-6"><h4>Danh sách VPP dùng riêng</h4></div>
											<div class="col-sm-6 text-right">
												<a href="#addProductModal" class="btn btn-success btn-sm" data-toggle="modal" data-type="{{ config('constants.ORDER_PERSONAL') }}"><span>Thêm mới</span></a>						
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
														<a href="#editProductModal" class="edit" data-toggle="modal" data-product-id="{{ $product->id }}"  data-product-name="{{ $product->name }}">Chỉnh sửa</a> |
														<a href="#deleteProductModal" class="delete" data-toggle="modal" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}">Xoá</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
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
												<a href="#addProductModal" class="btn btn-success btn-sm" data-toggle="modal" data-type="{{ config('constants.ORDER_DEPARTMENT') }}"><span>Thêm mới</span></a>						
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
														<a href="#editProductModal" class="edit" data-toggle="modal" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}">Chỉnh sửa</a> |
														<a href="#deleteProductModal" class="delete" data-toggle="modal" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}">Xoá</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>        
						</div>
					</div>
				</div>
			</div>
		</div>     
	</div>
</div>
<div id="editProductModal" class="modal fade hide" aria-modal="true">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">\
			<form action="{{ route('product_update') }}" method="post">
				@csrf
                <div class="modal-header">				
                    <h4 class="modal-title">Cập nhật văn phòng phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
					<div class="form-group row">
						<label for="productName" class="col-sm-2 col-form-label text-right">Tên vpp: </label>
						<div class="col-sm-8">
						<input type="text" class="form-control" id="productName" name="name">
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
<div id="deleteProductModal" class="modal fade hide" aria-modal="true">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
			<form action="{{ route('product_update') }}" method="post">
				@csrf
                <div class="modal-header">				
                    <h4 class="modal-title">Xoá văn phòng phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
					<div class="form-group row">
						<label for="productName" class="col-sm-2 col-form-label text-right">Tên vpp: </label>
						<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" id="productName" name="name">
						</div>
					</div>                 
                </div>
                <div class="modal-footer">
					<input type="hidden" name="id">
					<input type="hidden" name="delete" value="1">	
					<input type="button" class="btn btn-link" data-dismiss="modal" value="Huỷ">
					<input type="submit" class="btn btn-info" value="Đồng ý">
                </div>
            </form>
		</div>
	</div>
</div>
<div id="addProductModal" class="modal fade hide" aria-modal="true">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
            <form action="{{ route('product_create') }}" method="post">
				@csrf
                <div class="modal-header">				
                    <h4 class="modal-title">Thêm mới văn phòng phẩm <span class="type-text"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
					<div class="form-group row">
						<label for="productName" class="col-sm-2 col-form-label text-right">Tên vpp: </label>
						<div class="col-sm-8">
						<input type="text" class="form-control" name="name">
						<input type="hidden" name="type">
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
