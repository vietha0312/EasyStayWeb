
@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Thêm mới dịch vụ</div>

                    <div class="panel-body">
                        <form action="{{route('admin.dich_vu.store')}}" method="post" id="addServiceForm">
                            @csrf
                            <div class="form-group">
                                <label for="ten">Tên Dịch Vụ</label>
                                <input type="text" class="form-control" id="ten" name="ten_dich_vu" placeholder="Nhập tên dịch vụ">
                                <span class="text-danger error-ten"></span>
                            </div>
                            <div class="form-group">
                                <label for="gia">Giá</label>
                                <input type="number" class="form-control" id="gia" name="gia" placeholder="Nhập giá dịch vụ">
                                <span class="text-danger error-gia"></span>
                            </div>
                            <div class="form-group">
                                <label for="so_luong">Số Lượng</label>
                                <input type="number" class="form-control" id="so_luong" name="so_luong" placeholder="Nhập số lượng dịch vụ">
                                <span class="text-danger error-so_luong"></span>
                            </div>
                     
                            <label class="mt-3" for="trang_thai">Trạng thái:</label>
        
                            <input type="radio" name="trang_thai" id="trang_thai1" value="{{App\Models\DichVu::AP_DUNG}}">
                            <label for="trang_thai1">Đang áp dụng</label>
        
                            <input type="radio" name="trang_thai" id="trang_thai2" value="{{App\Models\DichVu::KET_THUC}}">
                            <label for="trang_thai2">Kết thúc</label><br>
                            <button type="submit" class="btn btn-primary">Thêm Mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
