@extends('client.layouts.master')
@section('content')
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
        <!-- Start Navbar -->
        <nav id="topnav" class="defaultscroll is-sticky">
            <div class="container relative">
                <!-- Logo container-->
                <a class="logo" href="index.html">
                    <div>
                        <img src="assets/images/logo-dark.png" class="h-7 inline-block dark:hidden" alt="">
                        <img src="assets/images/logo-white.png" class="h-7 hidden dark:inline-block" alt="">
                    </div>
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
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Mobile Toggle -->

                <!--Login button Start-->
                <ul class="buy-button list-none mb-0">
                    <li class="dropdown inline-block relative pe-1">
                        <button data-dropdown-toggle="dropdown" class="dropdown-toggle align-middle inline-flex search-dropdown" type="button">
                            <i data-feather="search" class="size-5"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu absolute overflow-hidden end-0 m-0 mt-5 z-10 md:w-52 w-48 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden" onclick="event.stopPropagation();">
                            <div class="relative">
                                <i data-feather="search" class="size-4 absolute top-[9px] end-3"></i>
                                <input type="text" class="h-9 px-3 pe-10 w-full border-0 focus:ring-0 outline-none" name="s" id="searchItem" placeholder="Search...">
                            </div>
                        </div>
                    </li>
            
                    <li class="dropdown inline-block relative ps-0.5">
                        <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                            <span class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><img src="assets/images/client/16.jpg" class="rounded-md" alt=""></span>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-48 rounded-md overflow-hidden bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden" onclick="event.stopPropagation();">
                            <ul class="py-2 text-start">
                                <li>
                                    <a href="user-profile.html" class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i data-feather="user" class="size-4 me-2"></i>Profile</a>
                                </li>
                                <li>
                                    <a href="helpcenter.html" class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i data-feather="help-circle" class="size-4 me-2"></i>Helpcenter</a>
                                </li>
                                <li>
                                    <a href="user-setting.html" class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i data-feather="settings" class="size-4 me-2"></i>Settings</a>
                                </li>
                                <li class="border-t border-gray-100 dark:border-gray-800 my-2"></li>
                                <li>
                                    <a href="login.html" class="flex items-center font-medium py-2 px-4 dark:text-white/70 hover:text-red-500 dark:hover:text-white"><i data-feather="log-out" class="size-4 me-2"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li><!--end dropdown-->
                </ul>
                <!--Login button End-->

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu justify-end">
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Hero</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="index.html" class="sub-menu-item">Tour One</a></li>
                                <li><a href="index-two.html" class="sub-menu-item">Tour Two</a></li>
                                <li><a href="index-three.html" class="sub-menu-item">Tour Three</a></li>
                                <li><a href="index-four.html" class="sub-menu-item">Tour Four</a></li>
                                <li><a href="index-five.html" class="sub-menu-item">Tour Five</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-parent-menu-item"><a href="javascript:void(0)"> Listing </a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)">Tour Grid </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="grid.html" class="sub-menu-item">Grid</a></li>
                                        <li><a href="grid-left-sidebar.html" class="sub-menu-item">Grid Left Sidebar</a></li>
                                        <li><a href="grid-right-sidebar.html" class="sub-menu-item">Grid Right Sidebar</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)">Tour List </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="list.html" class="sub-menu-item">List</a></li>
                                        <li><a href="list-left-sidebar.html" class="sub-menu-item">List Left Sidebar</a></li>
                                        <li><a href="list-right-sidebar.html" class="sub-menu-item">List Right Sidebar</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Tour Detail </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="tour-detail-one.html" class="sub-menu-item">Tour Detail One</a></li>
                                        <li><a href="tour-detail-two.html" class="sub-menu-item">Tour Detail Two</a></li>
                                    </ul>  
                                </li>
                            </ul>
                        </li>
                
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="aboutus.html" class="sub-menu-item">About Us</a></li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> My Account</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="user-profile.html" class="sub-menu-item">User Account</a></li>
                                        <li><a href="user-billing.html" class="sub-menu-item">Billing</a></li>
                                        <li><a href="user-payment.html" class="sub-menu-item">Payment</a></li>
                                        <li><a href="user-invoice.html" class="sub-menu-item">Invoice</a></li>
                                        <li><a href="user-social.html" class="sub-menu-item">Social</a></li>
                                        <li><a href="user-notification.html" class="sub-menu-item">Notification</a></li>
                                        <li><a href="user-setting.html" class="sub-menu-item">Setting</a></li>
                                    </ul> 
                                </li>
                        
                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Helpcenter </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="helpcenter.html" class="sub-menu-item">Overview</a></li>
                                        <li><a href="helpcenter-faqs.html" class="sub-menu-item">FAQs</a></li>
                                        <li><a href="helpcenter-guides.html" class="sub-menu-item">Guides</a></li>
                                        <li><a href="helpcenter-support.html" class="sub-menu-item">Support</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Auth Pages </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="login.html" class="sub-menu-item"> Login</a></li>
                                        <li><a href="signup.html" class="sub-menu-item"> Signup</a></li>
                                        <li><a href="forgot-password.html" class="sub-menu-item"> Forgot Password</a></li>
                                        <li><a href="lock-screen.html" class="sub-menu-item"> Lock Screen</a></li>
                                    </ul> 
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Utility </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="terms.html" class="sub-menu-item">Terms of Services</a></li>
                                        <li><a href="privacy.html" class="sub-menu-item">Privacy Policy</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="comingsoon.html" class="sub-menu-item"> Coming Soon</a></li>
                                        <li><a href="maintenance.html" class="sub-menu-item"> Maintenance</a></li>
                                        <li><a href="404.html" class="sub-menu-item"> 404!</a></li>
                                    </ul> 
                                </li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Blog</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="blogs.html" class="sub-menu-item"> Blogs</a></li>
                                <li><a href="blog-standard.html" class="sub-menu-item"> Blog Standard</a></li>
                                <li><a href="blog-detail.html" class="sub-menu-item"> Blog Detail</a></li>
                            </ul> 
                        </li>

                        <li><a href="contact.html" class="sub-menu-item">Contact Us</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </nav><!--end header-->
        <!-- End Navbar -->
        
        <!-- Google Map -->
        <div class="container-fluid relative mt-20">
            <div class="grid grid-cols-1">
                <div class="w-full leading-[0] border-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" style="border:0" class="w-full h-[500px]" allowfullscreen></iframe>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
        <!-- Google Map -->

        <!-- Start Section-->
        <section class="relative lg:py-24 py-16">
            <div class="container">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6">
                    <div class="lg:col-span-7 md:col-span-6">
                        <img src="assets/images/travel-train-station.svg" class="w-full max-w-[500px] mx-auto" alt="">
                    </div>

                    <div class="lg:col-span-5 md:col-span-6">
                        <div class="lg:ms-5">
                            <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">
                                <h3 class="mb-6 text-2xl leading-normal font-semibold">Get in touch !</h3>

                                <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                                    <p class="mb-0" id="error-msg"></p>
                                    <div id="simple-msg"></div>
                                    <div class="grid lg:grid-cols-12 grid-cols-1 gap-3">
                                        <div class="lg:col-span-6">
                                            <label for="name" class="font-semibold">Your Name:</label>
                                            <input name="name" id="name" type="text" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Name :">
                                        </div>
        
                                        <div class="lg:col-span-6">
                                            <label for="email" class="font-semibold">Your Email:</label>
                                            <input name="email" id="email" type="email" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :">
                                        </div>

                                        <div class="lg:col-span-12">
                                            <label for="subject" class="font-semibold">Your Question:</label>
                                            <input name="subject" id="subject" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Subject :">
                                        </div>
    
                                        <div class="lg:col-span-12">
                                            <label for="comments" class="font-semibold">Your Comment:</label>
                                            <textarea name="comments" id="comments" class="mt-2 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Message :"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" id="submit" name="send" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md mt-2">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end container-->
            
            <div class="container lg:mt-24 mt-16">
                <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6">
                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i data-feather="phone"></i>
                            </div>
                        </div>

                        <div class="content mt-7">
                            <h5 class="h5 text-lg font-semibold">Phone</h5>
                            <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                            
                            <div class="mt-5">
                                <a href="tel:+152534-468-854" class="text-red-500 font-medium">+152 534-468-854</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i data-feather="mail"></i>
                            </div>
                        </div>

                        <div class="content mt-7">
                            <h5 class="h5 text-lg font-semibold">Email</h5>
                            <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                            
                            <div class="mt-5">
                                <a href="mailto:contact@example.com" class="text-red-500 font-medium">contact@example.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i data-feather="map-pin"></i>
                            </div>
                        </div>

                        <div class="content mt-7">
                            <h5 class="h5 text-lg font-semibold">Location</h5>
                            <p class="text-slate-400 mt-3">C/54 Northwest Freeway, Suite 558, <br> Houston, USA 485</p>
                            
                            <div class="mt-5">
                                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                                data-type="iframe" class="video-play-icon read-more lightbox text-red-500 font-medium">View on Google map</a>
                            </div>
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Section-->

        <!-- Footer Start -->
        <footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200">    
            <div class="container relative">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="py-[60px] px-0">
                            <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                                <div class="lg:col-span-3 md:col-span-12">
                                    <a href="#" class="text-[22px] focus:outline-none">
                                        <img src="assets/images/logo-light.png" alt="">
                                    </a>
                                    <p class="mt-6 text-gray-300">Planning for a trip? We will organize your trip with the best places and within best budget!</p>
                                    <ul class="list-none mt-6">
                                        <li class="inline"><a href="https://1.envato.market/travosy" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="shopping-cart" class="size-4 align-middle" title="Buy Now"></i></a></li>
                                        <li class="inline"><a href="https://dribbble.com/shreethemes" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="dribbble" class="size-4 align-middle" title="dribbble"></i></a></li>
                                        <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="linkedin" class="size-4 align-middle" title="Linkedin"></i></a></li>
                                        <li class="inline"><a href="https://www.facebook.com/shreethemes" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="facebook" class="size-4 align-middle" title="facebook"></i></a></li>
                                        <li class="inline"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="instagram" class="size-4 align-middle" title="instagram"></i></a></li>
                                        <li class="inline"><a href="https://twitter.com/shreethemes" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="twitter" class="size-4 align-middle" title="twitter"></i></a></li>
                                        <li class="inline"><a href="mailto:support@shreethemes.in" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="mail" class="size-4 align-middle" title="email"></i></a></li>
                                    </ul><!--end icon-->
                                </div><!--end col-->

                                <div class="lg:col-span-3 md:col-span-4">
                                    <div class="lg:ms-8">
                                        <h5 class="tracking-[1px] text-gray-100 font-semibold">Office</h5>
                                        <h5 class="tracking-[1px] text-gray-100 mt-6">Travosy Tour & Travels</h5>

                                        <div class="flex mt-4">
                                            <i data-feather="map-pin" class="size-4 text-red-500 me-2 mt-1"></i>
                                            <div class="">
                                                <h6 class="text-gray-300">C/54 Northwest Freeway, <br> Suite 558, <br> Houston, USA 485</h6>
                                            </div>
                                        </div>

                                        <div class="flex mt-4">
                                            <i data-feather="mail" class="size-4 text-red-500 me-2 mt-1"></i>
                                            <div class="">
                                                <a href="mailto:contact@example.com" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">contact@example.com</a>
                                            </div>
                                        </div>
                        
                                        <div class="flex mt-4">
                                            <i data-feather="phone" class="size-4 text-red-500 me-2 mt-1"></i>
                                            <div class="">
                                                <a href="tel:+152534-468-854" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">+152 534-468-854</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                
                                <div class="lg:col-span-3 md:col-span-4">
                                    <div class="lg:ms-8">
                                        <h5 class="tracking-[1px] text-gray-100 font-semibold">Company</h5>
                                        <ul class="list-none footer-list mt-6">
                                            <li><a href="aboutus.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> About us</a></li>
                                            <li class="mt-[10px]"><a href="services.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Services</a></li>
                                            <li class="mt-[10px]"><a href="team.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Team</a></li>
                                            <li class="mt-[10px]"><a href="pricing.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Pricing</a></li>
                                            <li class="mt-[10px]"><a href="blogs.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Blog</a></li>
                                            <li class="mt-[10px]"><a href="login.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Login</a></li>
                                        </ul>
                                    </div>
                                </div><!--end col-->
    
                                <div class="lg:col-span-3 md:col-span-4">
                                    <h5 class="tracking-[1px] text-gray-100 font-semibold">Newsletter</h5>
                                    <p class="mt-6">Sign up and receive the latest tips via email.</p>
                                    <form>
                                        <div class="grid grid-cols-1">
                                            <div class="my-3">
                                                <label class="form-label">Write your email <span class="text-red-600">*</span></label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                                    <input type="email" class="ps-12 rounded w-full py-2 px-3 h-10 bg-gray-800 border-0 text-gray-100 focus:shadow-none focus:ring-0 placeholder:text-gray-200 outline-none" placeholder="Email" name="email" required="">
                                                </div>
                                            </div>
                                        
                                            <button type="submit" id="submitsubscribe" name="send" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Subscribe</button>
                                        </div>
                                    </form>
                                </div><!--end col-->
                            </div><!--end grid-->
                        </div><!--end col-->
                    </div>
                </div><!--end grid-->
            </div><!--end container-->

            <div class="py-[30px] px-0 border-t border-slate-800">
                <div class="container relative text-center">
                    <div class="grid grid-cols-1">
                        <div class="text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Travosy. Design with <i class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                        </div>
                    </div><!--end grid-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->
        <!-- Switcher -->
        <div class="fixed top-1/4 -left-2 z-50">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk">
                <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                    <i data-feather="moon" class="w-[18px] h-[18px] text-yellow-500"></i>
                    <i data-feather="sun" class="w-[18px] h-[18px] text-yellow-500"></i>
                    <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
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
                <span class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold rtl:block ltr:hidden" >LTR</span>
                <span class="py-1 px-3 relative inline-block rounded-b-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>
            </a>
        </div>
        <!-- LTR & RTL Mode Code -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-md z-10 bottom-5 end-5 size-8 text-center bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white justify-center items-center"><i class="mdi mdi-arrow-up"></i></a>
        <!-- Back to top --> 

        

        <!-- JAVASCRIPTS -->
        <script src="assets/libs/tobii/js/tobii.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/plugins.init.js"></script>
        <script src="assets/js/app.js"></script>
        <!-- JAVASCRIPTS -->
    </body>
    @endsection