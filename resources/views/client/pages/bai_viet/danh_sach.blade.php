@extends('client.layouts.master')
@section('content')
<section class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.html')] bg-top bg-no-repeat bg-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Blogs / Tin tức</h3>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
        <ul class="tracking-[0.5px] mb-0 inline-block">
            <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="index.html">EasyStay</a></li>
            <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
            <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">Tin tức</li>
        </ul>
    </div>
</section>

<section class="relative md:py-24 py-16">
    <div class="container relative">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
            @foreach ($baiviets as $baiviet )
            <div class="group relative overflow-hidden" >
                <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-800">
                    <img src="{{Storage::url($baiviet->anh)}}" class="group-hover:scale-110 group-hover:rotate-3 duration-500" alt="">
                    <div class="absolute top-0 start-0 p-4 opacity-0 group-hover:opacity-100 duration-500">
                        <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">Hotel</span>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="flex mb-4">
                        <span class="flex items-center text-slate-400 text-sm"><i data-feather="clock" class="size-4 text-slate-900 dark:text-white me-1.5"></i>5 min read</span>
                        <span class="text-slate-400 text-sm ms-3">by <a href="#" class="text-slate-900 dark:text-white hover:text-red-500 dark:hover:text-red-500 font-medium">Travosy</a></span>
                    </div>

                    <a href="blog-detail.html" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">{{$baiviet->tieu_de}}</a>
                    <p class="text-slate-400 mt-2">{{$baiviet->mo_ta_ngan}}</p>

                    <div class="mt-3">
                        <a href="" class="hover:text-red-500 inline-flex items-center">Chi tiết<i data-feather="chevron-right" class="size-4 ms-1"></i></a>
                    </div>
                </div>
            </div><!--end content-->
            @endforeach

        </div><!--end grid-->
    </div>
</section>
@endsection