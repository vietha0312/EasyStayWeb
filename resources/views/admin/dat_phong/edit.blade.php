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
        <div class="card">
            <div class="card-header">
                <h5>Cập nhật đặt phòng</h5>
            </div>

            <div class="card-body">
                <form action="{{route('admin.dat_phong.update',$datPhong)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group mt-3 mx-auto">
                        @for ($i = 0; $i < $so_luong_dich_vu; $i++)
                            <label for="dich_vu_ids_{{ $i }}">Dịch vụ {{ $i + 1 }}:</label>
                            <select name="dich_vu_ids[{{ $i }}][id]" id="dich_vu_ids_{{ $i }}">
                                @foreach ($dich_vus as $dich_vu)
                                    <option value="{{ $dich_vu->id }}">{{ $dich_vu->ten_dich_vu }}</option>
                                @endforeach
                            </select>
                            <label for="so_luong_{{ $i }}">Số lượng:</label>
                            <input type="number" name="dich_vu_ids[{{ $i }}][so_luong]" id="so_luong_{{ $i }}" value="0" min="0">
                        @endfor
                    </div>
                    <div class="form-group mt-3 mx-auto ">
                        <label for="ghi_chu">Ghi chú</label>
                        <textarea type="text" class="form-control" id="ghi_chu" name="ghi_chu"></textarea>
                        <span class="text-danger error-ghi_chu"></span>
                    </div>
                    <div class="d-flex justify-content-center">

                        <button type="submit" class="btn btn-success mt-3">Gửi</button>
                        <a href="{{ route('admin.dat_phong.index') }}" class="btn btn-danger mt-3 ms-3">Quay
                            lại</a>

                </form>
            </div>
        </div>
    </div>
</main>
@endsection
