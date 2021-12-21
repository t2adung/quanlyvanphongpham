@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chọn văn phòng phẩm cần mua</div> 
                <div class="card-body">
                    <!--
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    -->
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DANH SÁCH VPP DÙNG CHUNG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">DANH SÁCH VPP DÙNG RIÊNG</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                            <button type="submit" class="btn btn-primary ">Đăng ký</button> 
                            <button type="button" class="btn btn-danger">Reset</button>  
                        </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            tab2 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
