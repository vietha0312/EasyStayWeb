@extends('client.layouts.master')
@section('content')

<!-- Start Hero -->
<section class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.html')] bg-top bg-no-repeat bg-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="text-3xl leading-normal tracking-wider font-semibold text-white">Tra cứu: </h3>
            <p class="text-white">Ngày bắt đầu: <?= $ngayBatDau?></p>
            <p class="text-white">Ngày kết thúc: <?= $ngayKetThuc?></p>
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

<section class="relative md:py-24 py-16">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
            <div class="lg:col-span-8 md:col-span-7">
                @foreach($availableLoaiPhongs as $loaiPhong)
                <div class="group rounded-md shadow dark:shadow-gray-700 my-6 gap-6">
                    <div class="md:flex md:items-center">
                        <div class="relative overflow-hidden md:shrink-0 md:rounded-md rounded-t-md shadow dark:shadow-gray-700 md:m-3 mx-3 mt-3">

                            <img src="{{Storage::url($loaiPhong->anh)}}" class="h-full w-full object-cover md:w-48 md:h-56 scale-125 group-hover:scale-100 duration-500" alt="">

                            <div class="absolute top-0 start-0 p-4">
                                <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">10% Off</span>
                            </div>

                            <div class="absolute top-0 end-0 p-4">
                                <a href="javascript:void(0)" class="size-8 inline-flex justify-center items-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-500 dark:focus:text-red-500 hover:text-red-500 dark:hover:text-red-500"><i class="mdi mdi-heart text-[20px] align-middle"></i></a>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <p class="flex items-center text-slate-400 font-medium mb-2"><i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> Hà Nội, Việt Nam</p>
                            <a href="tour-detail-one.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">{{$loaiPhong->ten}}</a>

                            <div class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">{{$loaiPhong->gia}}</h5> <br>

                                <!-- <a href="<?= env('APP_URL') ?>/chi_tiet_loai_phong/<?= $loaiPhong->id ?>" class="text-slate-400 hover:text-red-500">Khám phá ngay<i class="mdi mdi-arrow-right"></i></a> -->
                            </div>

                            <div>
                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M8.67969 10.8203C8.77344 10.7266 8.77344 10.5703 8.67969 10.4688L7.21094 9L8.67969 7.53125C8.77344 7.42969 8.77344 7.27344 8.67969 7.17969L8.32031 6.82031C8.22656 6.72656 8.07031 6.72656 7.96875 6.82031L6.5 8.28906L5.03125 6.82031C4.92969 6.72656 4.77344 6.72656 4.67969 6.82031L4.32031 7.17969C4.22656 7.27344 4.22656 7.42969 4.32031 7.53125L5.79688 9L4.32031 10.4688C4.22656 10.5703 4.22656 10.7266 4.32031 10.8203L4.67969 11.1797C4.77344 11.2734 4.92969 11.2734 5.03125 11.1797L6.5 9.70313L7.96875 11.1797C8.07031 11.2734 8.22656 11.2734 8.32031 11.1797L8.67969 10.8203ZM1 13V5H12V13H1ZM4 3.5C4 3.64063 3.89062 3.75 3.75 3.75H3.25C3.10938 3.75 3 3.64063 3 3.5V1.25C3 1.10938 3.10938 1 3.25 1H3.75C3.89062 1 4 1.10938 4 1.25V3.5ZM10 3.5C10 3.64063 9.89062 3.75 9.75 3.75H9.25C9.10938 3.75 9 3.64063 9 3.5V1.25C9 1.10938 9.10938 1 9.25 1H9.75C9.89062 1 10 1.10938 10 1.25V3.5ZM13 3C13 2.45312 12.5469 2 12 2H11V1.25C11 0.5625 10.4375 0 9.75 0H9.25C8.5625 0 8 0.5625 8 1.25V2H5V1.25C5 0.5625 4.4375 0 3.75 0H3.25C2.5625 0 2 0.5625 2 1.25V2H1C0.453125 2 0 2.45312 0 3V13C0 13.5469 0.453125 14 1 14H12C12.5469 14 13 13.5469 13 13V3Z" fill="black"></path>
                                </svg>
                                <h5>Không hoàn trả phí khi hủy phòng</h5>
                            </div>

                            <!-- <button class="mt-3 py-1 px-3 h-10 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md cursor-pointer hover:bg-slate-800">Chọn phòng</button> -->
                            <a class="mt-3 py-1 px-3 h-10 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md cursor-pointer hover:bg-slate-800" href="#">Chọn phòng</a>
                           
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="lg:col-span-4 md:col-span-5">
                <div class="px-3 rounded-md shadow dark:shadow-gray-700 sticky top-20">
                    <form action="" method="post">
                        <div class="mt-6">
                            <h5 class="text-lg font-medium text-center pt-2 text-red-500">Thông tin đặt phòng</h5>
                            <hr class="my-2">
                            <p>EasyStayHotel</p>
                            <?= $ngayBatDau?>/<?= $ngayKetThuc?>
                        </div>
                        <hr class="my-2">
                        <div>
                            <h5>Thông tin phòng</h5>
                            <p></p>
                        </div>
                        <hr class="my-2">
                        <div class="pb-3">
                            <p class="text-red-500">Tổng cộng: VNĐ</p>
                            <button class="py-1 px-5 h-10 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md w-full cursor-pointer">Đặt ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection