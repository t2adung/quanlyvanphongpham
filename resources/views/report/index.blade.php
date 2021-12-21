@extends('layouts.admin')

@section('content')
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
@endsection
