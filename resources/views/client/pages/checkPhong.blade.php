@extends('client.layouts.master')
@section('content')

<!-- Start Hero -->
<section class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.html')] bg-top bg-no-repeat bg-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="text-3xl leading-normal tracking-wider font-semibold text-white">Tra cứu: </h3>
            <p class="text-white">Ngày bắt đầu: <?= $thoiGianDen ?></p>
            <p class="text-white">Ngày kết thúc: <?= $thoiGianDi ?></p>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
        <ul class="tracking-[0.5px] mb-0 inline-block">
            <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="<?= env('APP_URL') ?>/">EasyStay</a></li>
            <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
            <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">Tra cứu phòng</li>
        </ul>
    </div>
</section><!--end section-->
<!-- End Hero -->
<!-- <div>
    <div class="grid lg:grid-cols-2 grid-cols-1  container">
        <div>
            @foreach($loaiPhongsTrong as $loaiPhong)
            <div class="group rounded-md shadow dark:shadow-gray-700 my-6 gap-6">
                <div class="md:flex md:items-center">
                    <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">

                        <img src="{{Storage::url($loaiPhong['loaiPhong']->anh)}}" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">

                        <div class="absolute top-0 start-0 p-4">
                            <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">10% Off</span>
                        </div>

                        <div class="absolute top-0 end-0 p-4">
                            <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                        </div>
                    </div>

                    <div class="p-4 w-full">
                        <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Hà Nội, Việt Nam</p>
                        <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">{{$loaiPhong['loaiPhong']->ten}}</a>

                        <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                            <h5 class="text-lg font-medium text-red-500">{{$loaiPhong['loaiPhong']->gia}}</h5>

                            <a href="<?= env('APP_URL') ?>/chi_tiet_loai_phong/<?= $loaiPhong['loaiPhong']->id ?>" class="text-slate-400 hover:text-red-500">Khám phá ngay<i class="mdi mdi-arrow-right"></i></a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-6 sticky">
            <p class="text-center text-lg font-medium text-red-600">Thông tin đặt phòng</p>
        </div>
    </div>
</div> -->

<section class="relative md:py-24 py-16">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
            <div class="lg:col-span-8 md:col-span-7">
                @foreach($loaiPhongsTrong as $loaiPhong)
                <div class="group rounded-md shadow dark:shadow-gray-700 my-6 gap-6">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">

                            <img src="{{Storage::url($loaiPhong['loaiPhong']->anh)}}" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">

                            <div class="absolute top-0 start-0 p-4">
                                <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">10% Off</span>
                            </div>

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Hà Nội, Việt Nam</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">{{$loaiPhong['loaiPhong']->ten}}</a>

                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">{{$loaiPhong['loaiPhong']->gia}}</h5> <br>

                                <a href="<?= env('APP_URL') ?>/chi_tiet_loai_phong/<?= $loaiPhong['loaiPhong']->id ?>" class="text-slate-400 hover:text-red-500">Khám phá ngay<i class="mdi mdi-arrow-right"></i></a>

                            </div>
                            <h5>Không hoàn trả phí khi hủy phòng</h5>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="lg:col-span-4 md:col-span-5">
                <div class="px-3 rounded-md shadow dark:shadow-gray-700 sticky top-20">

                    <div class="mt-6">
                        <h5 class="text-lg font-medium text-center pt-2 text-red-500">Thông tin đặt phòng</h5>
                        <hr class="my-2">
                        <p>EasyStayHotel</p>
                        <p><?= $thoiGianDen ?> / <?= $thoiGianDi ?></p>
                    </div>
                    <hr class="my-2">
                    <div>
                        <h5>Thông tin phòng</h5>
                    </div>
                    <hr class="my-2">
                    <div class="pb-2">
                        <p class="text-red-500">Tổng cộng:  VNĐ</p> 
                        <button class="py-1 px-5 h-10 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md w-full cursor-pointer">Đặt ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

<!-- JAVASCRIPTS -->
<script src="<?= env('APP_URL') ?>assets/libs/js-datepicker/datepicker.min.js"></script>
<script src="<?= env('APP_URL') ?>assets/libs/tobii/js/tobii.min.js"></script>
<script src="<?= env('APP_URL') ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= env('APP_URL') ?>assets/js/plugins.init.js"></script>
<script src="<?= env('APP_URL') ?>assets/js/app.js"></script>
<!-- JAVASCRIPTS -->