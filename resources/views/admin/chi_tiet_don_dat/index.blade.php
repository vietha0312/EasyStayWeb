@extends('admin.layouts.master')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            @include('admin.layouts.components.content-header', [
                'name' => 'Chi tiết đơn đặt phòng',
                'key' => 'Index',
            ])
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Bảng chi tiết đơn đặt</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>#</th>
                                        <th>Mã phòng</th>
                                        <th>Mã đơn đặt</th>
                                        <th>CMND</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Giới hạn người</th>
                                        <th>Số lượng phòng</th>
                                        <th>Tổng tiền</th>
                                        <th>Hành động</th>
                                        <th></th>
                                    </thead>

                                    @foreach ($chitiet as $item)
                                        <tbody>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->phong->loai_phong_id }}</td>
                                            <td>{{ $item->don_dat->id }}</td>
                                            <td>{{ $item->CMND }}</td>
                                            <td>{{ $item->ten }}</td>
                                            <td>{{ $item->so_dien_thoai }}</td>
                                            <td>{{ $item->gioi_han_nguoi }}</td>
                                            <td>{{ $item->slg_phong }}</td>
                                            <td>{{ $item->tong_tien }}</td>
                                            <td>
                                                <a href="{{ route('admin.chi_tiet_don_dat.edit', $item) }}"
                                                    class="btn btn-primary">Sửa</a>
                                            </td>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
