<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<!-- Mirrored from shreethemes.in/travosy/layouts/index-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2024 16:14:06 GMT -->

<head>
    <meta charset="UTF-8">
    <title>EasyStay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Tour & Travels Agency Tailwind CSS Template" name="description">
    <meta
        content="Tour, Travels, agency, business, corporate, tour packages, journey, trip, tailwind css, Admin, Landing"
        name="keywords">
    <!-- <meta name="author" content="Shreethemes">
        <meta name="website" content="https://shreethemes.in/">
        <meta name="email" content="support@shreethemes.in"> -->
    <meta name="version" content="1.0.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Css -->
    <link href="/assets/libs/swiper/css/swiper.min.css" rel="stylesheet">
    <link href="/assets/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
    <link href="/assets/libs/js-datepicker/datepicker.min.css" rel="stylesheet">
    <!-- Main Css -->
    <link href="/assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/tailwind.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="dark:bg-slate-900">
    <!-- Loader Start -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader End -->
    <!-- TAGLINE START-->
    <div class="tagline bg-slate-900">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="flex items-center justify-between">
                    <ul class="list-none">
                        <li class="inline-flex items-center">
                            <i data-feather="clock" class="text-red-500 size-4"></i>
                            <span class="ms-2 text-slate-300">Thứ 2-Chủ Nhật: 24/7</span>
                        </li>
                        <li class="inline-flex items-center ms-2">
                            <i data-feather="map-pin" class="text-red-500 size-4"></i>
                            <span class="ms-2 text-slate-300">Hà Nội, Việt Nam</span>
                        </li>
                    </ul>

                    <ul class="list-none">
                        <li class="inline-flex items-center">
                            <i data-feather="mail" class="text-red-500 size-4"></i>
                            <a href="mailto:contact@example.com" class="ms-2 text-slate-300 hover:text-slate-200"></a>
                        </li>
                        <li class="inline-flex items-center ms-2">
                            <ul class="list-none">
                                <li class="inline-flex mb-0"><a href=""
                                        class="text-slate-300 hover:text-red-500"><i data-feather="facebook"
                                            class="size-4 align-middle" title="facebook"></i></a></li>
                                <li class="inline-flex ms-2 mb-0"><a href=""
                                        class="text-slate-300 hover:text-red-500"><i data-feather="instagram"
                                            class="size-4 align-middle" title="instagram"></i></a></li>
                                <li class="inline-flex ms-2 mb-0"><a href=""
                                        class="text-slate-300 hover:text-red-500"><i data-feather="twitter"
                                            class="size-4 align-middle" title="twitter"></i></a></li>
                                <li class="inline-flex ms-2 mb-0"><a href=" tel:+"
                                        class="text-slate-300 hover:text-red-500"><i data-feather="phone"
                                            class="size-4 align-middle" title="phone"></i></a></li>
                            </ul><!--end icon-->
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--end container-->
    </div><!--end tagline-->
    <!-- TAGLINE END-->
    <!-- Start Navbar -->
    <nav id="topnav" class="defaultscroll is-sticky tagline-height">
        <div class="container relative">
            <!-- Logo container-->

            <a class="logo" href="<?= env('APP_URL') ?>/">
                <span class="inline-block dark:hidden">
                    <img src="assets/images/favicon.ico" class="h-7 l-dark" alt="ảnh logo">
                    <img src="assets/images/favicon.ico" class="h-7 l-light" alt="ảnh logo">
                </span>
                <img src="assets/images/favicon.ico" class="hidden dark:inline-block" alt="ảnh logo">
            </a>

            <!-- End Logo container-->

            <!-- Start Mobile Toggle -->
            <div class="menu-extras">
                <div class="menu-item">
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Mobile Toggle -->

            <!--Login button Start-->
            <ul class="buy-button list-none mb-0">
                <li class="dropdown inline-block relative pe-1">
                    <button data-dropdown-toggle="dropdown"
                        class="dropdown-toggle align-middle inline-flex search-dropdown" type="button">
                        <i data-feather="search" class="size-5 dark-icon"></i>
                        <i data-feather="search" class="size-5 white-icon text-white"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="dropdown-menu absolute overflow-hidden end-0 m-0 mt-5 z-10 md:w-52 w-48 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden"
                        onclick="event.stopPropagation();">
                        <div class="relative">
                            <i data-feather="search" class="size-4 absolute top-[9px] end-3"></i>
                            <input type="text" class="h-9 px-3 pe-10 w-full border-0 focus:ring-0 outline-none"
                                name="s" id="searchItem" placeholder="Search...">
                        </div>
                    </div>
                </li>

                @if (auth()->check())
                    <li class="dropdown inline-block relative ps-0.5">
                        <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                            <span
                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md text-white">
                                <img src="{{ Auth::user()->anh }}" class="rounded-md" alt="">
                            </span>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-48 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden"
                            onclick="event.stopPropagation();">
                            <ul class="py-2 text-start">
                                <li>
                                    <a href="{{ route('client.pages.hoso') }}"
                                        class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white">
                                        <i data-feather="user" class="size-4 me-2"></i>Quản lí tài khoản
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white">
                                        <i data-feather="help-circle" class="size-4 me-2"></i>Trung tâm trợ giúp
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white">
                                        <i data-feather="settings" class="size-4 me-2"></i>Cài đặt
                                    </a>
                                </li>
                                <li class="border-t border-gray-100 dark:border-gray-800 my-2"></li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white">
                                            <i data-feather="log-out" class="size-4 me-2"></i>Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>


                    </li>
                @else
                    <li class="inline-block">
                        <button style="color:rgb(255 255 255 / .5);" type="button">
                            <a href="{{ route('login') }}"> Đăng nhập</a>
                        </button>
                        <button style="color:rgb(255 255 255 / .5); padding-left:30px" type="button">
                            <a href="{{ route('register') }}">Đăng kí</a>
                        </button>
                    </li>
                @endif


                <!--end dropdown-->
            </ul>
            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu justify-end nav-black">



                    <li><a href="<?= env('APP_URL') ?>" class="sub-menu-item">Đặt phòng</a></li>
                    <li><a href="<?= env('APP_URL') ?>/loai_phong" class="sub-menu-item">Loại phòng</a></li>

                    <li><a href="<?= env('APP_URL') ?>/tin_tuc" class="sub-menu-item">Tin tức</a></li>

                    <li><a href="<?= env('APP_URL') ?>/lien_he" class="sub-menu-item">Liên hệ</a></li>
                    <?php
                    if (auth()->check()) {
                        if (auth()->user()->id_vai_tro === 2 || auth()->user()->id_vai_tro === 3) {
                            echo '<li>
                                                                                                <a href="' .
                                url('admin/dashboard') .
                                '" class="sub-menu-item">Admin</a>
                                                                                            </li>';
                        }
                    }
                    ?>


                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </nav><!--end header-->
    <!-- End Navbar -->



    @yield('content')


    <!-- Switcher -->
    <div class="fixed top-1/4 -left-2 z-50">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk">
            <label
                class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                for="chk">
                <i data-feather="moon" class="w-[18px] h-[18px] text-yellow-500"></i>
                <i data-feather="sun" class="w-[18px] h-[18px] text-yellow-500"></i>
                <span
                    class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
            </label>
        </span>
    </div>

    <!-- <div class="fixed top-1/2 -right-11 z-50 hidden sm:block">
            <a href="https://1.envato.market/travosy" target="_blank" class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold"><i class="mdi mdi-cart-outline me-1"></i> Download</a>
        </div> -->
    <!-- Switcher -->

    <!-- LTR & RTL Mode Code -->
    <div class="fixed top-[40%] -left-3 z-50">
        <a href="#" id="switchRtl">
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden">LTR</span>
            <span
                class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>
        </a>
    </div>
    <!-- LTR & RTL Mode Code -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-md z-10 bottom-5 end-5 size-8 text-center bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white justify-center items-center"><i
            class="mdi mdi-arrow-up"></i></a>
    <!-- Back to top -->



    <!-- JAVASCRIPTS -->
    <script src="/assets/libs/swiper/js/swiper.min.js"></script>
    <script src="/assets/libs/tiny-slider/min/tiny-slider.js"></script>
    <script src="/assets/libs/js-datepicker/datepicker.min.js"></script>
    <script src="/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/assets/js/plugins.init.js"></script>
    <script src="/assets/js/app.js"></script>
    <!-- JAVASCRIPTS -->
</body>

<!-- Mirrored from shreethemes.in/travosy/layouts/index-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Mar 2024 16:14:23 GMT -->

</html>
