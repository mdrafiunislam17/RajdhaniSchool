<!-- HEADER SECTION START -->
<header class="absolute z-[99] top-0 inset-x-[100px] xxl:inset-x-[30px] xl:inset-x-0 bg-white rounded-bl-[10px] rounded-br-[10px]">
    <!-- top header -->
{{--    <div class="bg-edblue flex items-center justify-between lg:justify-center lg:gap-x-[20px]">--}}
{{--        <!-- contacts -->--}}
{{--        <div class="flex items-center gap-x-[32px] xl:gap-x-[15px] gap-y-[6px] py-[18px] pl-[30px] xl:pl-[10px] lg:pl-0 lg:order-2 sm:pt-0 sm:pb-[10px] xl:hidden">--}}
{{--            <!-- single contact -->--}}
{{--            <a href="mailto:info@example.com" class="flex items-center gap-x-[10px] font-light text-white/80">--}}
{{--                    <span class="icon shrink-0 xl:hidden">--}}
{{--                        <img src="assets/img/icon/mail.svg" alt="icon">--}}
{{--                    </span>--}}
{{--                <span>info@example.com</span>--}}
{{--            </a>--}}
{{--            <!-- single contact -->--}}
{{--            <a href="tel:+20866660112" class="flex items-center gap-x-[10px] font-light text-white/80">--}}
{{--                    <span class="icon shrink-0 xl:hidden">--}}
{{--                        <img src="assets/img/icon/phone.svg" alt="icon">--}}
{{--                    </span>--}}
{{--                <span>+208-6666-0112</span>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <!-- notice -->--}}
{{--        <p class="font-medium text-white text-[16px] xxs:text-[14px] xl:pl-[15px] lg:order-1 lg:w-full lg:my-[10px] text-center lg:text-left sm:text-center">Edutics Flash Discount: Starting at <span class="text-edyellow">$3.49/mo</span> for a Limited time</p>--}}

{{--        <!-- actions -->--}}
{{--        <div class="shrink-0 flex items-center gap-x-[30px] xl:gap-x-[15px] text-white lg:order-3 sm:hidden">--}}
{{--            <div class="flex gap-x-[30px] xl:gap-x-[15px]">--}}
{{--                <a href="#" class="flex items-center gap-x-[10px] font-light text-white/80"><span class="icon shrink-0"><img src="assets/img/icon/chat.svg" alt="icon"></span> Live Chat</a>--}}
{{--                <a href="#" class="flex items-center gap-x-[10px] font-light text-white/80"><span class="icon shrink-0"><img src="assets/img/icon/avatar.svg" alt="icon"></span> Login</a>--}}
{{--            </div>--}}
{{--            <a href="#" class="ed-btn !h-[60px] !rounded-none sm:!px-[15px]">Guardian Access</a>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- bottom header -->
    <div class="px-[30px] xxl:px-[15px] lg:px-[20px] py-[28px] lg:py-[18px] flex justify-between to-be-fixed">
        <div class="logo flex items-center gap-2 xxs:max-w-[40%]">
            <a href="{{ route('front.index') }}" class="flex items-center">
                <img src="{{ asset('uploads/' . $settings['SETTING_SITE_LOGO']) }}" alt="logo" class="h-[50px]" />
                <span class="ml-2 text-base font-semibold">
                <span style="color: #dc2626;">RAJDHANI </span>
                <span style="color: #16a34a;"> SCHOOL AND COLLEGE</span>

                </span>
            </a>
        </div>



        <div class="flex lg:items-center lg:gap-[60px] xxs:gap-[30px]">
            <div class="flex items-center gap-[100px] xl:gap-[30px] lg:gap-y-0">
                <!-- nav -->
                <div class="ed-header-nav-container">
                    <ul class="to-go-to-sidebar-in-mobile ed-header-nav flex lg:flex-col gap-x-[43px] xl:gap-x-[33px] font-kanit text-[17px]  font-normal" style="padding-right: 155px ;">
                        <li class="has-sub-menu relative">
                            <a href="{{route('front.index')}}" role="button">Home</a>

{{--                            <ul class="ed-header-submenu">--}}
{{--                                <li><a href="index.html">Home</a></li>--}}
{{--                                <li><a href="index-2.html">Home 02</a></li>--}}
{{--                            </ul>--}}
                        </li>
                        <li><a href="{{route('aboutUs')}}">About us</a></li>
                         <li><a href="{{route('sayings')}}">Saying & Member</a></li>

                        <li class="has-sub-menu relative">
                            <a role="button">Pages</a>

                            <ul class="ed-header-submenu">
                                <li><a href="{{route('teachers')}}">Teachers</a></li>
                                <li><a href="{{route('notices')}}">Notices</a></li>
                                <li><a href="{{route('event')}}">Events</a></li>
                                <li><a href="{{route('gallerys')}}">Gallery</a></li>
                                <li><a href="#">FAQ</a></li>
{{--                                <li><a href="coming-soon.html">Coming Soon Page</a></li>--}}
{{--                                <li><a href="404.html">Error 404</a></li>--}}
                            </ul>
                        </li>
                        <li class="has-sub-menu relative">
                            <a href="{{route('blog')}}" role="button">Blog</a>

{{--                            <ul class="ed-header-submenu">--}}
{{--                                <li><a href="news-grid.html">News Grid</a></li>--}}
{{--                                <li><a href="news-list.html">News List</a></li>--}}
{{--                                <li><a href="news-details.html">News Details</a></li>--}}
{{--                            </ul>--}}
                        </li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>

                <!-- right actions -->
                <div class="flex items-center gap-x-[60px] xxs:gap-[30px]">

                    <a href="#" class="ed-btn to-go-to-sidebar-in-mobile lg:m-[20px]">apply now</a>
                </div>
            </div>

            <!-- mobile menu button -->
            <button type="button" class="ed-mobile-menu-open-btn hidden lg:inline-block text-edblue text-[18px]"><i class="fa-solid fa-bars"></i></button>
        </div>
    </div>
</header>
<!-- HEADER SECTION END -->
