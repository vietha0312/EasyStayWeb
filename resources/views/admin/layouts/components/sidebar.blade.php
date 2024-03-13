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

                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Quản lý đơn đặt phòng
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('admin.don_dat.index') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('admin.don_dat.create') }}" class="nav-link"><i
                                    class="nav-icon bi bi-circle"></i>
                                <p>Tạo mới</p>
                            </a></li>

                    </ul>
                </li>

                <li class="nav-item"><a href="" class="nav-link"><i
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
                        <li class="nav-item"><a href="" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>Danh sách</p>
                            </a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="nav-icon bi bi-circle"></i>
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
                <!-- <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-tree-fill"></i>
                                <p>
                                    UI Elements
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="../UI/general.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>General</p>
                                    </a></li>
                                <li class="nav-item"><a href="../UI/timeline.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Timeline</p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-pencil-square"></i>
                                <p>
                                    Forms
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="../forms/general.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>General Elements</p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-table"></i>
                                <p>
                                    Tables
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="../tables/simple.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Simple Tables</p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-header">EXAMPLES</li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-box-arrow-in-right"></i>
                                <p>
                                    Auth
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-box-arrow-in-right"></i>
                                        <p>
                                            Version 1
                                            <i class="nav-arrow bi bi-chevron-right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item"><a href="../examples/login.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                                <p>Login</p>
                                            </a></li>
                                        <li class="nav-item"><a href="../examples/register.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                                <p>Register</p>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-box-arrow-in-right"></i>
                                        <p>
                                            Version 2
                                            <i class="nav-arrow bi bi-chevron-right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item"><a href="../examples/login-v2.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                                <p>Login</p>
                                            </a></li>
                                        <li class="nav-item"><a href="../examples/register-v2.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                                <p>Register</p>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="../examples/lockscreen.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Lockscreen</p>
                                    </a></li>
                            </ul>
                        </li>



                <li class="nav-header">DOCUMENTATIONS</li>
                        <li class="nav-item"><a href="../docs/introduction.html" class="nav-link"><i class="nav-icon bi bi-download"></i>
                                <p>Installation</p>
                            </a></li>
                        <li class="nav-item"><a href="../docs/layout.html" class="nav-link active"><i class="nav-icon bi bi-grip-horizontal"></i>
                                <p>Layout</p>
                            </a></li>
                        <li class="nav-item"><a href="../docs/color-mode.html" class="nav-link"><i class="nav-icon bi bi-star-half"></i>
                                <p>Color Mode</p>
                            </a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-ui-checks-grid"></i>
                                <p>
                                    Components
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="../docs/components/main-header.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Main Header</p>
                                    </a></li>
                                <li class="nav-item"><a href="../docs/components/main-sidebar.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Main Sidebar</p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-filetype-js"></i>
                                <p>
                                    Javascript
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="../docs/javascript/treeview.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Treeview</p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="../docs/browser-support.html" class="nav-link"><i class="nav-icon bi bi-browser-edge"></i>
                                <p>Browser Support</p>
                            </a></li>
                        <li class="nav-item"><a href="../docs/how-to-contribute.html" class="nav-link"><i class="nav-icon bi bi-hand-thumbs-up-fill"></i>
                                <p>How To Contribute</p>
                            </a></li>
                        <li class="nav-item"><a href="../docs/faq.html" class="nav-link"><i class="nav-icon bi bi-question-circle-fill"></i>
                                <p>FAQ</p>
                            </a></li>
                        <li class="nav-item"><a href="../docs/license.html" class="nav-link"><i class="nav-icon bi bi-patch-check-fill"></i>
                                <p>License</p>
                            </a></li>
                        <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle-fill"></i>
                                <p>Level 1</p>
                            </a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle-fill"></i>
                                <p>
                                    Level 1
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Level 2</p>
                                    </a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>
                                            Level 2
                                            <i class="nav-arrow bi bi-chevron-right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-record-circle-fill"></i>
                                                <p>Level 3</p>
                                            </a></li>
                                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-record-circle-fill"></i>
                                                <p>Level 3</p>
                                            </a></li>
                                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-record-circle-fill"></i>
                                                <p>Level 3</p>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                        <p>Level 2</p>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle-fill"></i>
                                <p>Level 1</p>
                            </a></li>
                        <li class="nav-header">LABELS</li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle text-danger"></i>
                                <p class="text">Important</p>
                            </a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle text-warning"></i>
                                <p>Warning</p>
                            </a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle text-info"></i>
                                <p>Informational</p>
                            </a></li> -->
            </ul><!--end::Sidebar Menu-->
        </nav>
    </div><!--end::Sidebar Wrapper-->
</aside><!--end::Sidebar--><!--begin::App Main-->
