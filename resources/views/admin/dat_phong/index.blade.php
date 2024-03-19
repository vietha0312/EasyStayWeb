@extends('admin.layouts.master')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            @include('admin.layouts.components.content-header', [
                'name' => 'Đơn phòng',
                'key' => 'EasyStay',
            ])
        </div>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5>Đơn phòng</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Mã khách hàng</th>
                            <th>Mã loại phòng</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Thời gian đến</th>
                            <th>Thời gian đi</th>
                            <th>Số lượng phòng</th>
                            <th>Mã dịch vụ</th>
                            <th>Tổng tiền</th>
                            <th>Payment</th>
                            <th>Trạng thái</th>
                        </thead>

                        <tbody>
                            @foreach ($datphong as $item)
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->id_khach_hang }}</td>
                                <td>{{ $item->id_loai_phong }}</td>
                                <td>{{ $item->ten_khach_hang }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->sdt }}</td>
                                <td>{{ $item->thoi_gian_den }}</td>
                                <td>{{ $item->thoi_gian_di }}</td>
                                <td>{{ $item->so_luong_phong }}</td>
                                <td>{{ $item->id_dich_vu }}</td>
                                <td>{{ $item->tong_tien }}</td>
                                <td>{{ $item->payment }}</td>
                                <td>{{ $item->trang_thai }}</td>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $datphong->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
