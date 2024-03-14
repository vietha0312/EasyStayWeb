<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"><!--begin::Sidebar Brand-->
    <div class="sidebar-brand"><!--begin::Brand Link-->
        <a href="../index.html" class="brand-link"><!--begin::Brand Image-->
            <img src="/adminlte/assets/img/AdminLTELogo.png" alt="EasyStay Logo"
                class="brand-image opacity-75 shadow"><!--end::Brand Image--><!--begin::Brand Text-->
            <span class="brand-text fw-light">EasyStay</span><!--end::Brand Text-->
        </a><!--end::Brand Link-->
    </div><!--end::Sidebar Brand--><!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"><!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Tổng quan
                            <!-- <i class="nav-arrow bi bi-chevron-right"></i> -->
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="../index.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Dashboard v1</p>
                                    </a></li>
                                <li class="nav-item"><a href="../index2.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Dashboard v2</p>
                                    </a></li>
                                <li class="nav-item"><a href="../index3.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Dashboard v3</p>
                                    </a></li>
                            </ul> -->

                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-table"></i>
                        <p>
                            Quản lý loại phòng
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.loai_phong.index') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.loai_phong.create') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>

                    </ul>
                </li>

                </li>

                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Quản lý phòng
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.phong.index') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.phong.create') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>

                    </ul>
                </li>

                <li class="nav-item"><a href="{{ route('admin.user.index') }}" class="nav-link"><i
                            class="nav-icon bi bi-clipboard-fill"></i>
                        <p>
                            Quản lý người dùng
                        </p>
                    </a>

                </li>


                <li class="nav-item"><a href="{{ route('admin.chi_tiet_don_dat.index') }}" class="nav-link"><i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Quản lý Banner
                       
                            <i class="nav-arrow bi bi-chevron-right"></i>
                    
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.banners.index') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.banners.create') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>
                          

                    </ul>
                </li>

                <li class="nav-item"><a href="{{ route('admin.chi_tiet_don_dat.index') }}" class="nav-link"><i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Quản lý chi tiết đơn đặt phòng
                            <!-- <i class="nav-arrow bi bi-chevron-right"></i> -->
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.chi_tiet_don_dat.index') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.chi_tiet_don_dat.create') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>

                    </ul>
                </li>

                <li class="nav-item"><a href="{{route('admin.danh_gia.index')}}" class="nav-link"><i
                            class="nav-icon bi bi-hand-thumbs-up-fill"></i>
                
                        <p>
                            Quản lý đánh giá
                        </p>
                    </a>
                    
                   

                </li>

                <li class="nav-item"><a href="{{ route('admin.khach_san.index') }}" class="nav-link"><i
                            class="nav-icon bi bi-tree-fill"></i>
                        <p>
                            Quản lý khách sạn
                        </p>
                    </a>

                </li>

                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Quản lý Bài viết
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.bai_viet.index') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.bai_viet.create') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>

                    </ul>
                </li>

                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Quản lý Khuyến mãi
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.khuyen_mai.index') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.khuyen_mai.create') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>

                    </ul>
                </li>

                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Quản lý Khuyến mãi
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.khuyen_mai.index') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.bai_viet.create') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>

                    </ul>
                </li>

                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Quản lý Khuyến mãi
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.khuyen_mai.index') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.khuyen_mai.create') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>

                    </ul>
                </li>

            <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-pencil-square"></i>
                <p>
                    Quản lý Dịch vụ
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item"><a href="{{ route('admin.dich_vu.index') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                        <p>Danh sách</p>
                    </a></li>
                <li class="nav-item"><a href="{{ route('admin.dich_vu.create') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                        <p>Tạo mới</p>
                    </a></li>

            </ul>
        </li>


            <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-pencil-square"></i>
                <p>
                    Quản lý Dịch vụ
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item"><a href="{{ route('admin.dich_vu.index') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                        <p>Danh sách</p>
                    </a></li>
                <li class="nav-item"><a href="{{ route('admin.dich_vu.create') }}" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                        <p>Tạo mới</p>
                    </a></li>

            </ul>
        </li>

                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Tải xuống file Excel
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="exportUser" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>User</p>
                            </a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>

                    </ul>
                </li>

            </ul><!--end::Sidebar Menu-->
        </nav>
    </div><!--end::Sidebar Wrapper-->
</aside><!--end::Sidebar--><!--begin::App Main-->
