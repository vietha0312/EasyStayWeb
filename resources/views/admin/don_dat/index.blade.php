@extends('admin.layouts.master')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            @include('admin.layouts.components.content-header', [
                'name' => 'Đơn đặt phòng',
                'key' => 'Index',
            ])
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Bordered Table</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>#</th>
                                        <th>Mã phòng</th>
                                        <th>Ngày đặt</th>
                                        <th>Mã khách hàng</th>
                                        <th>Payment</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </thead>

                                    @foreach ($dondat as $item)
                                        <tbody>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->ma_phong }}</td>
                                            <td>{{ $item->ngay_dat }}</td>
                                            <td>{{ $item->khach_hang_id }}</td>
                                            <td>{{ $item->payment }}</td>
                                            <td>{{ $item->trang_thai ? 'Đã xác nhận' : 'Chờ xác nhận' }}</td>
                                            <td>
                                                <a href="{{ route('admin.don_dat.edit', $item) }}"
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
