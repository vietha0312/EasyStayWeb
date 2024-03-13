@extends('admin.layouts.master')
@section('content')
<main class="app-main">

    <div class="app-content-header">
        @include('admin.layouts.components.content-header', [
        'name' => 'Phòng',
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
    <form class="m-3" action="{{route('admin.phong.update',$phong)}}" method="post">
        @csrf
        @method('put')
        <h2>Cập nhật phòng</h2>

        <label for="ten_phong">Tên phòng</label>
        <input type="text" name="ten_phong" id="ten_phong" class="form-control" value="{{$phong->ten_phong}}">

        <label class="mt-3" for="loai_phong_id">Loại phòng</label>
        <select name="loai_phong_id" id="loai_phong_id" class="form-control">
            <option value="" hidden>Lựa chọn loại phòng</option>
            @foreach ($loai_phong as $id => $ten)
            <!-- <option value="{{$id}}">{{$ten}}</option> -->
            <option value="{{$id}}" @if($phong->loai_phong_id) selected @endif>{{$ten}}</option>
            @endforeach
        </select>

        <label class="mt-3" for="mo_ta">Mô tả</label>
        <textarea name="mo_ta" id="mo_ta" cols="30" rows="10" class="form-control">{{$phong->mo_ta}}</textarea>

        <label class="mt-3" class="mt-3" for="trang_thai">Trạng thái:</label>

        <input type="radio" name="trang_thai" id="trang_thai1" @if ($phong->trang_thai == \App\Models\Phong::CON_PHONG) checked @endif
        value="{{\App\Models\Phong::CON_PHONG}}">
        <label for="trang_thai1">CÒN PHÒNG</label>

        <input type="radio" name="trang_thai" id="trang_thai2" @if ($phong->trang_thai == \App\Models\Phong::HET_PHONG) checked @endif
        value="{{\App\Models\Phong::HET_PHONG}}">
        <label for="trang_thai2">HẾT PHÒNG</label> <br><br>

        <button class="btn btn-success">GỬI</button>

    </form>
</main>
@endsection