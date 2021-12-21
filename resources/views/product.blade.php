@extends('layouts.admin')

@section('content')
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6"><h2>Danh sách</h2></div>
						<div class="col-sm-6 text-right">
							<a href="#addModal" class="btn btn-success" data-toggle="modal"><span>Thêm mới</span></a>						
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
						<tr>
							<td width="10%">1</td>
							<td>Giấy  (Đơn vị: Gram)</td>
							<td>
								<a href="#editModal" class="edit" data-toggle="modal">Chỉnh sửa</a> |
								<a href="#deleteModal" class="delete" data-toggle="modal">Xoá</a>
							</td>
						</tr>
						<tr>
							<td width="10%">2</td>
							<td>Bút bi  (Đơn vị: Cây)</td>
							<td>
								<a href="#editModal" class="edit" data-toggle="modal">Chỉnh sửa</a> |
								<a href="#deleteModal" class="delete" data-toggle="modal">Xoá</a>
							</td>
						</tr>
						<tr>
							<td width="10%">3</td>
							<td>Bìa cứng (Đơn vị: Cái)</td>
							<td>
								<a href="#editModal" class="edit" data-toggle="modal">Chỉnh sửa</a> |
								<a href="#deleteModal" class="delete" data-toggle="modal">Xoá</a>
							</td>
						</tr>
						<tr>
							<td width="10%">4</td>
							<td>Tập vở (Đơn vị: Cuốn)</td>
							<td>
								<a href="#editModal" class="edit" data-toggle="modal">Chỉnh sửa</a> |
								<a href="#deleteModal" class="delete" data-toggle="modal">Xoá</a>
							</td>
						</tr>					
						<tr>
							<td width="10%">5</td>
							<td>Bút (Đơn vị: Cuốn)</td>
							<td>
								<a href="#editModal" class="edit" data-toggle="modal">Chỉnh sửa</a> |
								<a href="#deleteModal" class="delete" data-toggle="modal">Xoá</a>
							</td>
						</tr> 
					</tbody>
				</table>
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
			</div>
		</div>        
	</div>
</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	<form>
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
@endsection
