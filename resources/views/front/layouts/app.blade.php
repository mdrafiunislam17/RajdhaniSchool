<!DOCTYPE html>
<html lang="en">

<head>
   @yield('title')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{asset('favicon.svg')}}" type="image/x-icon">

    <!-- plugins & libraries css -->
    <link rel="stylesheet" href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/all.min.css')}}">
    <!-- tailwind css via CDN -->
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}

    <!-- Tailwind CSS v3.4.3 CDN -->
{{--    <script src="https://cdn.tailwindcss.com?version=3.4.3"></script>--}}
    <!-- tailwind css -->
    <link rel="stylesheet" href="{{asset('src/output.css')}}">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        edgreen: '#28A745',
                        edyellow: '#FFD600',
                        edpurple: '#6F42C1',
                        edblue: '#007BFF',
                        edgray2: '#6C757D',
                    }
                }
            }
        }
    </script
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @stack("styles")
</head>

<body>
<div class="ed-overlay group">
    <div class="fixed inset-0 z-[100] group-[.active]:bg-edblue/80 duration-[400ms] pointer-events-none group-[.active]:pointer-events-auto"></div>
</div>


<!-- search -->
<div class="ed-search group">
    <form action="#" class="bg-white fixed z-[100] top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] h-[100px] md:h-[70px] xxs:h-[50px] w-[1224px] max-w-[95%] flex gap-[10px] rounded-full overflow-hidden px-[40px] xxs:px-[20px] pointer-events-none opacity-0 group-[.active]:pointer-events-auto group-[.active]:opacity-100 duration-[400ms]">
        <input type="search" name="ed-search" placeholder="Search Here..." class="bg-transparent w-full focus:outline-none">
        <button class="text-[25px] md:text-[22px] xxs:text-[20px]"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>

<!-- sidebar -->
<div class="ed-sidebar">
    <div class="translate-x-[100%] transition-transform ease-linear duration-300 fixed right-0 w-full max-w-[25%] xl:max-w-[30%] lg:max-w-[40%] md:max-w-[50%] sm:max-w-[60%] xxs:max-w-full bg-white h-full z-[100] overflow-auto">
        <!-- heading -->
        <div class="ed-sidebar-heading p-[20px] lg:p-[20px] border-b border-edgray/20">
            <div class="logo flex justify-between items-center">
                <a href="{{route('front.index')}}"><img src="{{ asset("uploads/" . $settings["SETTING_SITE_LOGO"]) }}" alt="logo"></a>

                <button type="button" class="ed-sidebar-close-btn border border-edgray/20 w-[45px] aspect-square shrink-0 text-black text-[22px] rounded-full hover:text-edpurple"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>

        <!-- mobile menu -->
        <div class="ed-header-nav-in-mobile"></div>
    </div>
</div>



@include('front.layouts.header')

@yield("content")

@include('front.layouts.footer')




<!-- js -->
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/fslightbox/fslightbox.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
