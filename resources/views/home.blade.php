@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chọn văn phòng phẩm cần mua</div> 
                <div class="card-body">
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link{{ $type == 1 ? ' active' : '' }}" id="home-tab"  href="{{ route('register_edit', ['type' => 1]) }}" role="tab">DANH SÁCH VPP DÙNG CHUNG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ $type == 2 ? ' active' : '' }}" id="profile-tab" href="{{ route('register_edit', ['type' => 2]) }}" role="tab">DANH SÁCH VPP DÙNG RIÊNG</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
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
                        <div class="form-group">
                            <label for="inputAddress">Danh sách văn phòng phẩm:</label>
                        </div>
                            @for ($i = 0; $i <= 10; $i++)
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select id="inputState" class="form-control">
                                            <option selected>Chọn loại văn phòng phẩm</option>
                                            <option>Viết</option>
                                            <option>Bút bi</option>
                                            <option>Giấy</option>
                                            <option>Bìa cứng</option>
                                            <option>Tập vở</option>
                                        </select>
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="inputCity"  placeholder="Số lượng">   
                                    </div> 
                                </div>
                            @endfor 
                            <div class="text-left">
                                <!-- Button HTML (to Trigger Modal) -->
                                <a href="#myModal" class="btn btn-primary trigger-btn" data-toggle="modal">Xác nhận</a>
                                <button type="button" class="btn btn-danger">Reset</button>  
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade hide" aria-modal="true">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
            <form action="/examples/actions/confirmation.php" method="post">
                <div class="modal-header">				
                    <h4 class="modal-title">Xác nhận danh sách VPP đăng ký</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @for ($i = 0; $i <= 10; $i++)
                            <div class="col-md-6">
                                Giấy A4
                                <input type="hidden" class="form-control" name="product_id" id="quantity"  placeholder="Số lượng">   
                            </div> 
                            <div class="col-md-4">
                                10
                                <input type="hidden" class="form-control" name="quantity" id="quantity"  placeholder="Số lượng">   
                            </div> 
                        @endfor 
                    </div>                    
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-link" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Đăng ký">
                </div>
            </form>
		</div>
	</div>
</div>
@endsection
