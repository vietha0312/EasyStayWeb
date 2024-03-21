@extends('client.layouts.master')
@section('content')
    <section
        class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.html')] bg-top bg-no-repeat bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Liên hệ</h3>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="index.html">EasyStay</a></li>
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i
                        class="mdi mdi-chevron-right"></i></li>
                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white"
                    aria-current="page">Liên hệ</li>
            </ul>
        </div>
    </section>


    <!-- Start Section-->
    <section class="relative ly:pt-24 py-16">
        <div class="container">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6">
                <div class="lg:col-span-7 md:col-span-6">
                    <img src="assets/images/travel-train-station.svg" class="w-full max-w-[500px] mx-auto" alt="">
                </div>

                <div class="lg:col-span-5 md:col-span-6">
                    <div class="lg:ms-5">
                        <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">
                            <h3 class="mb-6 text-2xl leading-normal font-semibold">Liên hệ !</h3>

                            <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()"
                                enctype="multipart/form-data">
                                @csrf
                                <p class="mb-0" id="error-msg"></p>
                                <div id="simple-msg"></div>
                                <div class="grid lg:grid-cols-12 grid-cols-1 gap-3">

                                    <div class="lg:col-span-6">
                                        <label for="name" class="font-semibold">Tên của bạn:</label>
                                        <input name="name" id="name" type="text"
                                            class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                            placeholder="Tên :">
                                    </div>

                                    <div class="lg:col-span-6">
                                        <label for="email" class="font-semibold">Email của bạn:</label>
                                        <input name="email" id="email" type="email"
                                            class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                            placeholder="Email :">
                                    </div>

                                    <div class="lg:col-span-12">
                                        <label for="subject" class="font-semibold">Câu hỏi của bạn:</label>
                                        <input name="subject" id="subject"
                                            class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                            placeholder="Câu hỏi :">
                                    </div>

                                    <div class="lg:col-span-12">
                                        <label for="comments" class="font-semibold">Ý kiến của bạn:</label>
                                        <textarea name="comments" id="comments"
                                            class="mt-2 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                            placeholder="Ý kiến :"></textarea>
                                    </div>
                                </div>
                                <button type="submit" id="submit" name="send"
                                    class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md mt-2">Gửi
                                    phản hồi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->

        <div class="container lg:mt-24 mt-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6">
                @foreach ($khach_sans as $khach_san)
                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div
                                class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i data-feather="phone"></i>
                            </div>
                        </div>

                        <div class="content mt-7">
                            <h5 class="h5 text-lg font-semibold">Số điện thoại</h5>
                            <!-- <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p> -->

                            <div class="mt-5">
                                <a href="tel:+152534-468-854"
                                    class="text-red-500 font-medium">+{{ $khach_san->so_dien_thoai }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div
                                class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i data-feather="mail"></i>
                            </div>
                        </div>

                        <div class="content mt-7">
                            <h5 class="h5 text-lg font-semibold">Email</h5>
                            <!-- <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p> -->

                            <div class="mt-5">
                                <a href="mailto:contact@example.com"
                                    class="text-red-500 font-medium">{{ $khach_san->email }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div
                                class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i data-feather="map-pin"></i>
                            </div>
                        </div>

                        <div class="content mt-7">
                            <h5 class="h5 text-lg font-semibold">Địa chỉ</h5>

                            <div class="mt-5">
                                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                                    data-type="iframe"
                                    class="video-play-icon read-more lightbox text-red-500 font-medium">View on Google
                                    map</a>
                            </div>
                            <p class="text-slate-400 mt-3">{{ $khach_san->dia_chi }}</p>
                        </div>
                    </div>
                @endforeach
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section-->


    <!-- Google Map -->
    <div class="container-fluid relative ">
        <div class="grid grid-cols-1">
            <div class="w-full leading-[0] border-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                    style="border:0" class="w-full h-[500px]" allowfullscreen></iframe>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
    <!-- Google Map -->



    <!-- Switcher -->
    <div class="fixed top-1/4 -left-2 z-50">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk">
            <label
                class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                for="chk">
                <i data-feather="moon" class="w-[18px] h-[18px] text-yellow-500"></i>
                <i data-feather="sun" class="w-[18px] h-[18px] text-yellow-500"></i>
                <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
            </label>
        </span>
    </div>

<!-- Google Map -->
<div class="container-fluid relative ">
    <div class="grid grid-cols-1">
        <div class="w-full leading-[0] border-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8671732908642!2d105.74461987448129!3d21.038000087462674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345550b525aa03%3A0x3fdefc40f69a023a!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEZQVA!5e0!3m2!1svi!2s!4v1710989478110!5m2!1svi!2s" style="border:0" class="w-full h-[500px]" allowfullscreen;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div><!--end grid-->
</div><!--end container-->
<!-- Google Map -->


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
    <!-- <script src="assets/libs/tobii/js/tobii.min.js"></script> -->
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/plugins.init.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- JAVASCRIPTS -->
@endsection
