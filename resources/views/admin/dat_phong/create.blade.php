@extends('admin.layouts.master')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Đặt phòng',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="mx-3">
        @if (\Session::has('msg'))
        <div class="alert alert-success">
            {{ \Session::get('msg') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h5>Đặt phòng mới</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.dat_phong.store') }}" method="post" id="addServiceForm">
                            @csrf

                            <div class="form-group mx-auto ">
                                <label for="user_id">Email Khách Hàng</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    @foreach ($user as $id => $email)
                                        <option value="{{$id}}">{{$email}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-user_id"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="loai_phong_id">Loại Phòng</label>
                                <select name="loai_phong_id" id="loai_phong_id" class="form-control">
                                    @foreach ($loai_phong as $id => $ten)
                                        <option value="{{$id}}">{{$ten}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-loai_phong_id"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="so_luong_phong">Số Lượng phòng</label>
                                <input type="number" class="form-control" id="so_luong_phong" name="so_luong_phong">
                                <span class="text-danger error-so_luong_phong"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="so_luong_nguoi">Số Lượng người</label>
                                <input type="number" class="form-control" id="so_luong_nguoi" name="so_luong_nguoi">
                                <span class="text-danger error-so_luong_nguoi"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="thoi_gian_den">Thời gian đến</label>
                                <input type="date" class="form-control" id="thoi_gian_den" name="thoi_gian_den">
                                <span class="text-danger error-thoi_gian_den"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="thoi_gian_di">Thời gian đi</label>
                                <input type="date" class="form-control" id="thoi_gian_di" name="thoi_gian_di">
                                <span class="text-danger error-thoi_gian_di"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="khuyen_mai_id">Khuyến mãi</label>
                                <select name="khuyen_mai_id" id="khuyen_mai_id" class="form-control">
                                    @foreach ($khuyen_mai as $id => $ten_khuyen_mai)
                                        <option value="{{$id}}">{{$ten_khuyen_mai}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-trn_khuyen_mai_id"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="payment">Payment</label>
                                <select name="payment" id="payment" class="form-control">
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                </select>
                                <span class="text-danger error-payment"></span>
                            </div>
                            <div class="form-group mt-3 mx-auto ">
                                <label for="ghi_chu">Ghi chú</label>
                                <input type="number" class="form-control" id="ghi_chu" name="ghi_chu">
                                <span class="text-danger error-ghi_chu"></span>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success mt-3">Gửi</button>
                                <a href="{{ route('admin.dat_phong.index') }}" class="btn btn-danger mt-3 ms-3">Quay
                                    lại</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- <script>
    $(document).ready(function() {
    $('#ten_khuyen_mai').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{{ route("admin.searchKhuyenMai") }}',
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1, // Số ký tự tối thiểu trước khi bắt đầu tìm kiếm
        select: function(event, ui) {
            $('#ten_khuyen_mai').val(ui.item.label); // Hiển thị tên được chọn
            $('#khuyen_mai_id').val(ui.item.value); // Lưu ID của tên được chọn
            return false;
        }
    });
});
</script> -->
<!-- <script>
    $(document).ready(function() {
    $('#ten_khuyen_mai').select2({
        ajax: {
            url: '{{ route("admin.searchKhuyenMai") }}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1,
        placeholder: 'Chọn khuyến mãi',
        escapeMarkup: function(markup) {
            return markup;
        },
        templateResult: function(data) {
            return data.text;
        },
        templateSelection: function(data) {
            if (data.text) {
                $('#khuyen_mai_id').val(data.id);
                return data.text;
            }
        }
    });
});

</script> -->
@endsection
