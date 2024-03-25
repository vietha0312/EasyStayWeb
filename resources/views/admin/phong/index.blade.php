@extends('admin.layouts.master')
@section('content')
@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif
<main class="app-main">
    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Phòng',
        'key' => 'EasyStay',
        ])
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Loại phòng: {{ $loai_phong->ten }}</h5>
                    </div>

                    <div class="card-body">

                        <form enctype="multipart/form-data" action="{{ route('admin.phong.store') }}" method="POST">
                            @csrf
                            <label for="ten_phong">Tên phòng</label>
                            <input type="text" name="ten_phong" id="ten_phong" class="form-control">

                            <input type="hidden" value="{{ $loai_phong->id }}" name="loai_phong_id">

                            <label class="mt-3" for="mo_ta">Mô tả</label>
                            <textarea name="mo_ta" id="mo_ta" cols="10" rows="6" class="form-control"></textarea>

                            <label class="mt-3" class="mt-3" for="trang_thai">Trạng thái:</label>

                            <input type="radio" name="trang_thai" id="trang_thai1" value="{{\App\Models\Phong::CON_PHONG}}">
                            <label for="trang_thai1">CÒN PHÒNG</label>

                            <input type="radio" name="trang_thai" id="trang_thai2" value="{{\App\Models\Phong::HET_PHONG}}">
                            <label for="trang_thai2">HẾT PHÒNG</label> <br><br>
                            <!-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tải ảnh</label>
                                <input type="file" class="form-control" multiple name="anh[]">
                                <input type="hidden" value="{{ $loai_phong->id }}" name="loai_phong_id">
                            </div> -->
                            <button type="submit" class="btn btn-success">Gửi</button>
                            <a href="{{route('admin.loai_phong.index')}}" class="btn btn-danger">Quay lại</a>

                        </form>
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <div class="card">
            <div class="card-header">Phòng</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div> -->
</main>

@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
