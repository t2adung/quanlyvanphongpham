@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/home.js') }}" defer></script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chọn văn phòng phẩm cần mua</div> 
                <div class="card-body">
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link{{ $type == 1 ? ' active' : '' }}" id="home-tab"  href="{{ route('orders', ['type' => config('constants.ORDER_PERSONAL')]) }}" role="tab">DANH SÁCH VPP DÙNG RIÊNG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ $type == 2 ? ' active' : '' }}" id="profile-tab" href="{{ route('orders', ['type' => config('constants.ORDER_DEPARTMENT')]) }}" role="tab">DANH SÁCH VPP DÙNG CHUNG</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="orderContent">
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputMonth">Tháng</label>
                                <select id="inputMonth" class="form-control" name="inputMonth">
                                    <!-- @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ ($i == $current_month) ? ' selected="selected"' : '' }}>Tháng {{ $i }}</option>
                                    @endfor -->
                                    <option value="{{ $current_month }}">Tháng {{ $current_month }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputYear">Năm</label>
                                <select id="inputYear" class="form-control" name="inputYear">
                                    <!-- @for ($y = 2021; $y <= 2031; $y++)
                                        <option value="{{ $y }}" {{ $y == $current_year ? ' selected' : '' }}>{{ $y }}</option>
                                    @endfor -->
                                    <option value="{{ $current_year  }}">{{ $current_year  }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">DANH SÁCH VPP</div>
                        </div>
                        @foreach ($products as $product)
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" readonly class="form-control-plaintext product_name" value="{{ $product->name }}" name="product_name">
                                </div> 
                                <div class="form-group col-md-4">
                                    <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
                                    @if (isset($user_products[$product->id]))
                                        <input type="number" class="form-control" placeholder="Số lượng" name="quantities[]" min="0"  value="{{ $user_products[$product->id] }}">  
                                    @else 
                                        <input type="number" class="form-control" placeholder="Số lượng" name="quantities[]" min="0">  
                                    @endif
                                </div> 
                            </div>
                        @endforeach
                        <div class="text-left">
                            <!-- Button HTML (to Trigger Modal) -->
                            <a href="#orderModal" class="btn btn-primary trigger-btn" data-toggle="modal">Xác nhận</a>
                            <button type="button" class="btn btn-danger">Reset</button>  
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="orderModal" class="modal fade hide" aria-modal="true">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
            <form method="post" action="{{ route('order_create') }}">
                @csrf
                <div class="modal-header">				
                    <h4 class="modal-title">Xác nhận danh sách VPP đăng ký - Tháng: <span class="textMonth"></span>/<span class="textYear"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">     
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="year">
                    <input type="hidden" name="month">
                    <input type="hidden" name="type" value="{{ $type}}">
                    <input type="button" class="btn btn-link" data-dismiss="modal" value="Huỷ   ">
                    <input type="submit" class="btn btn-info" value="Đăng ký"  name="btnCreateOrder">
                </div>
            </form>
		</div>
	</div>
</div>
@endsection
