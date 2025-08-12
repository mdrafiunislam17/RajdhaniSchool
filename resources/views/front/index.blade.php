
@extends('front.layouts.app')

@section('title', 'Home Page')

@section('content')



    <main>
        <!-- BANNER SECTION START -->
        <section>
            <div class="ed-banner-slider swiper relative">

                <div class="swiper-wrapper">
                    @foreach($sliders as $slider)
                        <!-- single slide -->
                        <div class="swiper-slide relative">
                            <img src="{{ asset("uploads/slider/$slider->image") }}"
                                 alt="Slide Background"
                                 class="absolute inset-0 w-full h-full object-cover z-[-1]" />

                            <div class="pt-[390px] md:pt-[300px] xs:pt-[280px] pb-[205px]
                                relative before:absolute before:inset-0 before:bg-edblue/10
                                            before:pointer-events-none">
                                <div class="mx-[10%] md:mx-[15px]">
                                    <div class="text-white w-[48%] xl:w-[60%] md:w-[70%] sm:w-[80%] xs:w-full">
                                        <h6 class="text-white font-medium uppercase tracking-[3px] mb-[16px]">
                                            {{ $slider->title }}
                                        </h6>
                                        <h2 class="font-bold text-[clamp(35px,4.57vw,80px)] leading-[1.13] mb-[15px]">
                                            {{ $slider->subtitle }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- single slide -->
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="pt-[390px] md:pt-[300px] xs:pt-[280px] pb-[205px] bg-[url('../assets/img/banner-bg-2.jpg')] bg-no-repeat bg-center bg-cover relative z-[1] before:absolute before:-z-[1] before:inset-0 before:bg-edblue/70 before:pointer-events-none">--}}
{{--                            <div class="mx-[10%] md:mx-[15px]">--}}
{{--                                <div class="text-white w-[48%] xl:w-[60%] md:w-[70%] sm:w-[80%] xs:w-full">--}}
{{--                                    <h6 class="font-medium uppercase tracking-[3px] mb-[16px]">Welcome to School in <span class="text-edyellow">NY</span></h6>--}}
{{--                                    <h2 class="font-bold text-[clamp(35px,4.57vw,80px)] leading-[1.13] mb-[15px]">The Best School in Your Town</h2>--}}
{{--                                    <p class="leading-[1.75] mb-[41px]">Smply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>--}}
{{--                                    <div class="flex items-center gap-[20px]">--}}
{{--                                        <a href="#" class="ed-btn">Apply now</a>--}}
{{--                                        <a href="#" class="ed-btn !bg-transparent border border-white hover:!bg-white hover:text-edpurple">About us</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

                <!-- nav -->
                <div class="ed-banner-slider-nav absolute z-[1] top-[50%] xs:top-[80%] right-[130px] md:right-[60px] sm:right-[40px] xs:hidden flex flex-col gap-[15px] *:w-[40px] *:h-[40px] *:rounded-full *:border *:border-white/20 *:text-white *:text-[18px]">
                    <button class="prev hover:bg-edyellow hover:border-edyellow hover:text-black"><i class="fa-solid fa-angle-up"></i></button>
                    <button class="next leading-[43px] hover:bg-edyellow hover:border-edyellow hover:text-black"><i class="fa-solid fa-angle-down"></i></button>
                </div>
            </div>
        </section>
        <!-- BANNER SECTION END -->



        <!-- FEATURES SECTION START -->
        <section class="-mt-[70px] relative z-[2]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="grid grid-cols-3 md:grid-cols-2 xs:grid-cols-1 gap-[30px]">
                    <!-- single feature -->
                    <div class="bg-[#FAF9F6] hover:bg-edgreen border-t-[7px] border-edred hover:border-edpurple duration-[400ms] p-[30px] sm:p-[25px] group relative z-[1] before:absolute before:-z-[1] before:inset-0 before:bg-[url('../assets/img/faeture-bg.jpg')] before:mix-blend-hard-light before:opacity-0 before:duration-[400ms] hover:before:opacity-15">
                        <span class="icon">
                            <img src="assets/img/feature-1.svg" alt="feature" class="mb-[11px]">
                        </span>
                        <h4 class="font-semibold text-[24px] xl:text-[22px] mb-[3px] text-edblue"><a href="#" class="hover:text-edpurple">School Life</a></h4>
                        <p class="text-edgray2 group-hover:text-black mb-[18px]">Eimply dummy text printing ypese tting industry. Ipsum has been the</p>
{{--                        <a href="#" class="text-edblue hover:text-edpurple"><span class="text-[14px]"><i class="fa-solid fa-angle-right"></i></span> View More</a>--}}
                    </div>

                    <!-- single feature -->
                    <div class="bg-[#FAF9F6] hover:bg-edgreen border-t-[7px] border-edred hover:border-edpurple duration-[400ms] p-[30px] sm:p-[25px] group relative z-[1] before:absolute before:-z-[1] before:inset-0 before:bg-[url('../assets/img/faeture-bg.jpg')] before:mix-blend-hard-light before:opacity-0 before:duration-[400ms] hover:before:opacity-15">
                      <span class="icon">
                            <img src="assets/img/feature-1.svg" alt="feature" class="mb-[11px]">
                        </span>
                        <h4 class="font-semibold text-[24px] xl:text-[22px] mb-[3px] text-edblue"><a href="#" class="hover:text-edpurple">EIIN NO </a></h4>
                        <p class="text-black group-hover:text-black mb-[18px]">17051705</p>
{{--                        <a href="#" class="text-edblue hover:text-edpurple"><span class="text-[14px]"><i class="fa-solid fa-angle-right"></i></span> View More</a>--}}
                    </div>

                    <!-- single feature -->
                    <div class="bg-[#FAF9F6] hover:bg-edgreen border-t-[7px] border-edred hover:border-edpurple duration-[400ms] p-[30px] sm:p-[25px] group relative z-[1] before:absolute before:-z-[1] before:inset-0 before:bg-[url('../assets/img/faeture-bg.jpg')] before:mix-blend-hard-light before:opacity-0 before:duration-[400ms] hover:before:opacity-15">
                      <span class="icon">
                            <img src="assets/img/feature-1.svg" alt="feature" class="mb-[11px]">
                        </span>
                        <h4 class="font-semibold text-[24px] xl:text-[22px] mb-[3px] text-edblue"><a href="#" class="hover:text-edpurple">School Code</a></h4>
                        <p class="text-edgray2 group-hover:text-black mb-[18px]">17051705</p>
{{--                        <a href="#" class="text-edblue hover:text-edpurple"><span class="text-[14px]"><i class="fa-solid fa-angle-right"></i></span> View More</a>--}}
                    </div>
                </div>
            </div>
        </section>
        <!-- FEATURES SECTION END -->


{{-- <section class="ed-2-about bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:bg-[url('../assets/img/about-us-bg.png')] before:opacity-[5%] before:bg-no-repeat before:bg-cover before:bg-center before:mix-blend-multiply">
    <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">

        <div class="overflow-hidden whitespace-nowrap bg-green-500 py-3 rounded">
            <div class="animate-marquee inline-block whitespace-nowrap">
                @foreach ($notices as $notice)
                    <a href="{{ route('titleDetails', ['title' => $notice->title]) }}"
                       class="mx-6 text-white hover:underline">
                        {{ $notice->title }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}

<div style="background-color: green; padding: 10px; display: flex; align-items: center;">
    {{-- Fixed Notice Label --}}
    <strong style="color: white; margin-right: 20px; flex-shrink: 0;">
        Notice:
    </strong>

    {{-- Scrolling Notices --}}
    <marquee behavior="scroll" direction="left" scrollamount="5">
        @foreach ($notices as $notice)
            <a href="{{ route('titleDetails', ['title' => $notice->title]) }}"
               style="margin-right: 40px; color: white; text-decoration: none;">
                {{ $notice->title }}
            </a>
        @endforeach
    </marquee>
</div>







        <!-- ABOUT SECTION START -->
        <section class="ed-2-about bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:bg-[url('../assets/img/about-us-bg.png')] before:opacity-[5%] before:bg-no-repeat before:bg-cover before:bg-center before:mix-blend-multiply">
            <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
                <div class="flex md:flex-col gap-x-[75px] gap-y-[30px]">
                    <!-- left -->
                    <div class="max-w-[46%] md:max-w-full grow shrink-0">
                        <div class="relative flex items-end">
                            <img src="{{ asset('uploads/about/' . $about->image) }}" alt="About Image" class="border-[12px] border-white rounded-full">

                            <!-- video btn -->
                            <div class="relative shrink-0 -ml-[202px] lg:-ml-[262px] md:-ml-[202px] xs:-ml-[242px] -mb-[24px]">
                                <img src="{{ asset('uploads/about/' . $about->image1) }}" alt="About Image" class="border-[8px] border-white rounded-full w-[292px] xs:w-[252px] aspect-square">

                            </div>

                            <!-- vectors -->
                            <div>
{{--                                <img src="assets/img/about-2-img-vector.svg" alt="vector" class="absolute pointer-events-none top-[60px] right-[65px] -z-[1]">--}}

{{--                                <img src="assets/img/about-2-img-vector-2.svg" alt="vector" class="absolute pointer-events-none -bottom-[30px] right-0 -z-[1] md:hidden">--}}

                            </div>
                        </div>
                    </div>

                    <!-- right -->
                    <div class="max-w-[54%] md:max-w-full">
                        <h6 class="text-green text-[18px] font-semibold uppercase tracking-wide mb-2">Our School</h6>

                        <h2 class="text-green text-[25px] mb-[6px] font-bold relative inline-block">
                            {{ $about->title }}
                        </h2>
                        <img src="{{ asset('assets/img/banner-2-title.jpg') }}"
                             alt="underline"
                             class=" mt-[-10px]" style="
                                height: 10px;
                                margin-top: -20px;
                            ">

                        {{--                        <p class="text-edgray mb-[34px]">--}}
{{--                            {!! $about->description !!}--}}
{{--                        </p>--}}

                        <p class="text-green pl-[40px] mb-[34px]">
                            {!! \Illuminate\Support\Str::limit(strip_tags($about->description), 350, '...') !!}
                        </p>

                        {{--                        <ul class="ed-about-list font-medium text-[18px] text-edblue grid grid-cols-2 xxs:grid-cols-1 gap-[20px] xxs:gap-[15px] mb-[52px] *:pl-[40px] *:relative *:before:absolute *:before:left-0 *:before:-top-[3px] *:before:w-[30px] *:before:aspect-square *:before:border *:before:border-edpurple *:before:rounded-full *:before:bg-[url(../assets/img/icon/checkmark.svg)] *:before:bg-no-repeat *:before:bg-[length:15px_13px] *:before:bg-center">--}}
{{--                            <li>Flexible Course Plan</li>--}}
{{--                            <li>Educator Support</li>--}}
{{--                            <li>Expert mentors</li>--}}
{{--                            <li>Lifetime Access</li>--}}
{{--                        </ul>--}}
                        <a href="{{route('aboutUs')}}" class="ed-btn" style="background-color: green">know more</a>
                    </div>
                </div>
            </div>
        </section>



        <!-- TEACHER SECTION START -->
        <section class="bg-[#FAF9F6] py-[120px] xl:py-[80px] md:py-[60px] relative z-[1]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <!-- heading -->
                <div class="flex flex-wrap xs:flex-col xs:text-center justify-between items-center gap-y-[15px] mb-[46px] md:mb-[30px]">
                    <div>

                        <h2 class="text-green text-[28px] font-semibold uppercase tracking-wide mb-2">Our Saying & Member</h2>
                    </div>

                    <a href="{{route('sayings')}}" class="ed-btn !bg-transparent border border-edgreen !text-edgreen hover:!bg-edred hover:!text-white" >view all teacher <span class="icon pl-[10px]"><i class="fa-solid fa-arrow-right-long"></i></span></a>
                </div>

                <div class="grid grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">
                    <!-- single teacher -->
                    @foreach ($saying as $item)
                        <div class="ed-teacher group">
                            <div class="ed-teacher__img rounded-[16px] overflow-hidden">
                                <img src="{{ asset('uploads/saying/' . $item->image) }}" alt="{{ $item->name }}" class="w-full aspect-[370/375] duration-[400ms] group-hover:scale-110">
                            </div>

                            <div class="ed-teacher__txt bg-white relative z-[1] mx-[25px] lg:mx-[20px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] xl:px-[20px] md:px-[15px] pb-[30px] lg:pb-[25px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">

                                <h5 class="font-semibold text-[20px] text-etBlack mb-[4px]">


                                    <a href="{{ route('sayingDetails', ['name' => $item->name]) }}" class="hover:text-etBlue">
                                        {{ $item->name }}
                                    </a>


                                </h5>
                                <span class="text-etGray text-[16px]">{{ $item->position  }}</span>
                            </div>
                        </div>
                    @endforeach




                </div>
            </div>

            <!-- vector -->

        </section>
        <!-- TEACHER SECTION END -->


        <!-- TEACHER SECTION START -->
        <section class="bg-[#FAF9F6] py-[120px] xl:py-[80px] md:py-[60px] relative z-[1]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <!-- heading -->
                <div class="flex flex-wrap xs:flex-col xs:text-center justify-between items-center gap-y-[15px] mb-[46px] md:mb-[30px]">
                    <div>
                        <h6 class="text-green text-[18px] font-semibold uppercase tracking-wide mb-2">Our Expert</h6>
                        <h2 class="text-green text-[28px] font-semibold uppercase tracking-wide mb-2">Our Expert Teacher</h2>
                    </div>

                    <a href="#" class="ed-btn !bg-transparent border border-edgreen !text-edgreen hover:!bg-edred hover:!text-white" >view all teacher <span class="icon pl-[10px]"><i class="fa-solid fa-arrow-right-long"></i></span></a>
                </div>

                <div class="grid grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">
                    <!-- single teacher -->
                    @foreach ($teacher as $item)
                        <div class="ed-teacher group">
                            <div class="ed-teacher__img rounded-[16px] overflow-hidden">
                                <img src="{{ asset('uploads/teacher/' . $item->image) }}" alt="{{ $item->name }}" class="w-full aspect-[370/375] duration-[400ms] group-hover:scale-110">
                            </div>

                            <div class="ed-teacher__txt bg-white relative z-[1] mx-[25px] lg:mx-[20px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] xl:px-[20px] md:px-[15px] pb-[30px] lg:pb-[25px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">
                                <div class="ed-teacher-socials absolute right-[20px] -top-[43px]">
                                    <div class="ed-speaker__socials flex flex-col gap-[8px] absolute -z-[2] text-[14px] opacity-0 transition duration-[400ms] bottom-[calc(100%+8px)] translate-y-[100%] group-hover:translate-y-0 group-hover:opacity-100">
                                        <a href="{{ $item->facebook ?? '#' }}" class="bg-white text-edgreen w-[36px] h-[36px] flex items-center justify-center rounded-full hover:text-white hover:bg-edpurple"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="{{ $item->twitter ?? '#' }}" class="bg-white text-edgreen w-[36px] h-[36px] flex items-center justify-center rounded-full hover:text-white hover:bg-edpurple"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="{{ $item->linkedin ?? '#' }}" class="bg-white text-edgreen w-[36px] h-[36px] flex items-center justify-center rounded-full hover:text-white hover:bg-edpurple"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="{{ $item->instagram ?? '#' }}" class="bg-white text-edgreen w-[36px] h-[36px] flex items-center justify-center rounded-full hover:text-white hover:bg-edpurple"><i class="fa-brands fa-instagram"></i></a>
                                    </div>
                                </div>
                                <h5 class="font-semibold text-[20px] text-etBlack mb-[4px]">
                                    {{-- <a href="#" class="hover:text-etBlue">{{ $item->name }}</a>
                                     --}}

                                     <a href="{{ route('teacherdetails', ['name' => $item->name]) }}" class="hover:text-etBlue">
                                        {{ $item->name }}
                                    </a>

                                </h5>
                                <span class="text-etGray text-[16px]">{{ $item->designation }}</span>
                            </div>
                        </div>
                    @endforeach




                </div>
            </div>

            <!-- vector -->

        </section>
        <!-- TEACHER SECTION END -->




        <!-- ADMISSION PROCESS SECTION START -->
        {{-- <section class="py-[120px] xl:py-[80px] md:py-[60px] bg-[#FAF9F6] relative z-[1]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="flex flex-col gap-x-[85px] items-start relative">
                    <!-- heading -->
                    <div class="relative w-full before:absolute before:bottom-0 before:mb-[8%] before:left-0 before:bg-[url('../assets/img/admission-title-vector.svg')] before:bg-no-repeat before:bg-[length:100%_100%] before:w-[100%] before:h-[88px] before:pointer-events-none lg:before:hidden">
                        <div class="shrink-0 max-w-[290px]">
                            <h6 class="ed-section-sub-title">Admission</h6>
                            <h2 class="ed-section-title !text-[30px] pb-[42px] lg:pb-0 mb-[40px] lg:mb-[20px]">Admission Process</h2>
                            <a href="#" class="ed-btn">Admission Now</a>
                        </div>
                    </div>

                    <!-- cards -->
                    <div class="grid grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[24px] -mt-[140px] lg:mt-[25px] w-[66%] ml-auto lg:w-[100%]">
                        <!-- single process -->
                        <div class="bg-white rounded-[10px] p-[24px] shadow-[0_4px_50px_rgba(0,0,0,0.09)]">
                            <span class="icon block mb-[13px]">
                                <img src="assets/img/admission-process-icon.svg" alt="admission process" class="mb-[11px]">
                            </span>
                            <h4 class="font-semibold text-[18px] mb-[5px] text-edblue"><a href="#" class="hover:text-edpurple">Request Info</a></h4>
                            <p class="text-edgray2 group-hover:text-black mb-[18px]">Penatibus Et Magnis Dis Parturient.</p>
                            <a href="#" class="ed-btn !h-[40px] !bg-white border !border-edpurple !text-edpurple !text-[14px] !font-semibold hover:!bg-edpurple hover:!text-white">Read More</a>
                        </div>

                        <!-- single process -->
                        <div class="bg-white rounded-[10px] p-[24px] shadow-[0_4px_50px_rgba(0,0,0,0.09)]">
                            <span class="icon block mb-[13px]">
                                <img src="assets/img/admission-process-icon.svg" alt="admission process" class="mb-[11px]">
                            </span>
                            <h4 class="font-semibold text-[18px] mb-[5px] text-edblue"><a href="#" class="hover:text-edpurple">Apply Online</a></h4>
                            <p class="text-edgray2 group-hover:text-black mb-[18px]">Penatibus Et Magnis Dis Parturient.</p>
                            <a href="#" class="ed-btn !h-[40px] !bg-white border !border-edpurple !text-edpurple !text-[14px] !font-semibold hover:!bg-edpurple hover:!text-white">Read More</a>
                        </div>

                        <!-- single process -->
                        <div class="bg-white rounded-[10px] p-[24px] shadow-[0_4px_50px_rgba(0,0,0,0.09)]">
                            <span class="icon block mb-[13px]">
                                <img src="assets/img/admission-process-icon.svg" alt="admission process" class="mb-[11px]">
                            </span>
                            <h4 class="font-semibold text-[18px] mb-[5px] text-edblue"><a href="#" class="hover:text-edpurple">Submit Form</a></h4>
                            <p class="text-edgray2 group-hover:text-black mb-[18px]">Penatibus Et Magnis Dis Parturient.</p>
                            <a href="#" class="ed-btn !h-[40px] !bg-white border !border-edpurple !text-edpurple !text-[14px] !font-semibold hover:!bg-edpurple hover:!text-white">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- vectors -->
            <div>
                <img src="assets/img/admission-vector-1.svg" alt="vector" class="absolute -z-[1] top-[156px] left-0">
                <img src="assets/img/admission-vector-2.svg" alt="vector" class="absolute -z-[1] bottom-[130px] right-[80px]">
            </div>
        </section> --}}
        <!-- ADMISSION PROCESS SECTION END -->


        <!-- FORM & NOTICE SECTION START -->
        <section class="py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] overflow-hidden">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="flex lg:flex-col rounded-[20px] overflow-hidden bg-[#f5f4fe]">
                    <!-- form -->
                    <div class="grow max-w-[49%] lg:max-w-full">
                        <!-- heading -->
                        <div class="bg-edpurple p-[22px] pl-[170px] xxl:pl-[130px] xs:pl-[40px] xxs:pl-[22px]">
                            <h6 class="ed-section-sub-title ed-section-sub-title--white">Form</h6>
                            <h3 class="font-semibold text-[30px] xxs:text-[25px] text-white">Admission Form</h3>
                        </div>

                        <!-- main content -->
                        <div class="p-[40px] pr-0 lg:pr-[40px] text-center">
                            <img src="{{asset('assets/img/Admission.png')}}" alt="form image" class="mx-auto drop-shadow-[0_4px_30px_rgba(0,0,0,0.1)] mb-[17px]">
                            <h5 class="text-[20px] text-edblue mb-[28px]">Free  Admission Online Form</h5>
                            <a href="{{route('frontadmissionOnline')}}" download class="ed-btn" style="background-color: green">apply now</a>
                        </div>
                    </div>

                    <!-- notice -->
                    <div class="grow max-w-[51%] lg:max-w-full">
                        <!-- heading -->
                        <div class="bg-edpurple p-[22px] pl-[170px] xxl:pl-[130px] xs:pl-[40px] xxs:pl-[22px]">
                            <h6 class="ed-section-sub-title ed-section-sub-title--white">notice</h6>
                            <h3 class="font-semibold text-[30px] xxs:text-[25px] text-white">Important Notice</h3>
                        </div>

                        <!-- main content -->
                        <div class="p-[40px] xl:px-[25px] lg:pl-[70px] sm:pl-[50px] xxs:p-[15px] space-y-[22px]">
                            <!-- single notice -->

                            @foreach ($notices  as $item)

                                <div class="flex gap-x-[20px] items-center relative before:absolute before:h-[1px] before:w-[40px] xl:before:w-[30px] before:bg-edpurple before:right-[100%] before:top-[50%] before:-translate-y-[50%] xxs:before:content-none after:absolute after:w-[1px] after:h-[114%] after:bg-edpurple after:bottom-[50%] after:right-[calc(100%+40px)] xl:after:right-[calc(100%+30px)] xxs:after:content-none first:after:content-none">
                                <div class="xxs:hidden icon shrink-0 p-[14px] bg-white border border-[#d9d9d9] rounded-[10px] w-[110px] xl:w-[90px] aspect-square flex items-center justify-center">
                                    <img src="assets/img/notice-icon.png" alt="icon">
                                </div>

                                <div class="pb-[26px] md:pb-[16px] border-b border-[#D9D9D9]">
                                    <h5 class="font-semibold text-[20px] text-edblue mb-[6px]">
                                        <a href="{{ route('titleDetails', ['title' => $item->title]) }}" class="hover:text-edpurple">{{$item->title}}</a>
                                    </h5>
                                    <h6 class="font-medium text-edpurple mb-[10px]">
                                         {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                                    </h6>
                                    {{ \Illuminate\Support\Str::words(strip_tags($item->description), 13, '...') }}
                                </div>
                            </div>

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

            <!-- vectors -->
            <div>
                <img src="assets/img/form-notice-vector-1.svg" alt="vector" class="absolute -z-[1] bottom-[296px] left-0">
                <img src="assets/img/form-notice-vector-2.svg" alt="vector" class="absolute -z-[1] bottom-[192px] right-[90px]">
            </div>
        </section>
        <!-- FORM & NOTICE SECTION END -->


        <!-- CTA SECTION START -->
{{--        <section class="bg-edpurple relative z-[1] overflow-hidden">--}}
{{--            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">--}}
{{--                <div class="flex md:flex-col items-center gap-[60px] lg:gap-[40px] md:gap-y-[20px]">--}}
{{--                    <div class="grow md:pt-[60px]">--}}
{{--                        <h6 class="ed-section-sub-title ed-section-sub-title--white">ARE YOU READY FOR THIS OFFER</h6>--}}
{{--                        <h2 class="ed-section-title !text-white mb-[36px]">50% Offer For Very First 60 <span class="font-normal text-[40px] xxl:text-[35px] xl:text-[30px] xs:text-[28px] xxs:text-[25px]">Student’s & Mentors</span></h2>--}}
{{--                        <div class="flex flex-wrap gap-[16px]">--}}
{{--                            <a href="#" class="ed-btn !bg-edyellow !text-black hover:!bg-edblue hover:!text-white">Become a student</a>--}}
{{--                            <a href="#" class="ed-btn !bg-transparent !text-white border border-white hover:!bg-white hover:!text-edblue">Become a teacher</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- image -->--}}
{{--                    <div class="shrink-0 relative z-[1] pr-[40px] lg:pr-0">--}}
{{--                        <img src="assets/img/cta-img.png" alt="image">--}}
{{--                        <img src="assets/img/cta-img-vector.svg" alt="vector" class="absolute right-[0] lg:right-[-40px] top-[20px] -z-[1] max-w-[460px]">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- vector -->--}}
{{--            <div>--}}
{{--                <img src="assets/img/cta-vector-1.png" alt="vector" class="absolute -z-[1] bottom-0 left-0 pointer-events-none">--}}
{{--                <img src="assets/img/cta-vector-2.png" alt="vector" class="absolute -z-[1] top-0 right-0 pointer-events-none">--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- CTA SECTION END -->


        <!-- SERVICES SECTION START -->
        {{-- <section class="py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] overflow-hidden">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="flex md:flex-col gap-[45px] items-center">
                    <div>
                        <h6 class="ed-section-sub-title">my services</h6>
                        <h2 class="ed-section-title mb-[19px]">Learn to play, converse with confidence.</h2>
                        <p class="mb-[31px]">luctus. Curabitur nibh justo imperdiet non ex non tempus faucibus urna Aliquam at elit vitae dui sagittis maximus eget vitae.</p>

                        <div class="flex flex-wrap gap-x-[24px] gap-y-[15px]">
                            <a href="#" class="ed-btn">know more</a>
                            <div class="flex items-center gap-[16px]">
                                <span class="icon bg-edyellow w-[44px] aspect-square rounded-full outline-[1px] outline outline-edyellow outline-offset-[2px] flex items-center justify-center">
                                    <img src="assets/img/icon/phone.svg" alt="call icon" class="w-[22px]">
                                </span>

                                <span class="txt font-semibold text-etBlack">
                                    <span class="block text-[16px] font-medium text-edgray mb-[2px] opacity-80">Call Us Now</span>
                                    <a href="tel:+208-555-0112" class="font-semibold text-[18px] hover:text-edyellow">+208-555-0112</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-[30px] max-w-[50%] md:max-w-full shrink-0 grow">
                        <!-- single service -->
                        <div class="flex xxs:flex-col items-center xxs:items-start gap-x-[20px] gap-y-[15px] odd:ml-[86px] lg:odd:ml-[56px] xxs:odd:ml-[26px]">
                            <!-- icon -->
                            <span class="shrink-0 w-[90px] aspect-square rounded-[8px] bg-[#F39F5F]/20 flex items-center justify-center">
                                <img src="assets/img/service-1.svg" alt="icon">
                            </span>

                            <div>
                                <h6 class="font-semibold text-[18px] text-edblue mb-[5px]">Maths</h6>
                                <p class="text-edgray">Adipiscing elit Praesent luctus laoreet iaculis Curabitur rutrum lectus augue, ut pulvinar.</p>
                            </div>
                        </div>

                        <!-- single service -->
                        <div class="flex xxs:flex-col items-center xxs:items-start gap-x-[20px] gap-y-[15px] odd:ml-[86px] lg:odd:ml-[56px] xxs:odd:ml-[26px]">
                            <!-- icon -->
                            <span class="shrink-0 w-[90px] aspect-square rounded-[8px] bg-edpurple/15 flex items-center justify-center">
                                <img src="assets/img/service-2.svg" alt="icon">
                            </span>

                            <div>
                                <h6 class="font-semibold text-[18px] text-edblue mb-[5px]">Bible Studies</h6>
                                <p class="text-edgray">Adipiscing elit Praesent luctus laoreet iaculis Curabitur rutrum lectus augue, ut pulvinar.</p>
                            </div>
                        </div>

                        <!-- single service -->
                        <div class="flex xxs:flex-col items-center xxs:items-start gap-x-[20px] gap-y-[15px] odd:ml-[86px] lg:odd:ml-[56px] xxs:odd:ml-[26px]">
                            <!-- icon -->
                            <span class="shrink-0 w-[90px] aspect-square rounded-[8px] bg-[#70A6B1]/20 flex items-center justify-center">
                                <img src="assets/img/service-3.svg" alt="icon">
                            </span>

                            <div>
                                <h6 class="font-semibold text-[18px] text-edblue mb-[5px]">Flex-care</h6>
                                <p class="text-edgray">Adipiscing elit Praesent luctus laoreet iaculis Curabitur rutrum lectus augue, ut pulvinar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- vectors -->
            <div class="xxl:hidden">
                <img src="assets/img/service-vector-1.svg" alt="vector" class="absolute -z-[1] bottom-[140px] left-[45px]">
                <img src="assets/img/form-notice-vector-1.svg" alt="vector" class="absolute -z-[1] top-[140px] right-[40px]">
            </div>
        </section> --}}
        <!-- SERVICES SECTION END -->


        <!-- GALLERY SECTION START -->
        <div class="overflow-hidden">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <!-- Section Title -->
                <h5 class="font-semibold text-[24px] text-edblue text-center mb-[40px] relative z-[1]
            before:absolute before:-z-[1] before:w-full before:h-[1px] before:left-0
            before:top-1/2 before:bg-[#D9D9D9] before:-translate-y-1/2">
                    <span class="bg-white px-[20px]">Our School Gallery</span>
                </h5>

                <!-- Gallery Slider -->
                <div class="ed-gallery-slider swiper overflow-visible">
                    <div class="swiper-wrapper">
                        @forelse($gallery as $item)
                            @php
                                $videoId = null;
                                if ($item->youtube) {
                                    $videoId = Str::contains($item->youtube, 'youtu.be/')
                                        ? Str::before(Str::after($item->youtube, 'youtu.be/'), '?')
                                        : (Str::contains($item->youtube, 'watch?v=')
                                            ? Str::before(Str::after($item->youtube, 'watch?v='), '&')
                                            : null);
                                }
                            @endphp

                            <div class="swiper-slide max-w-max">
                                <div class="block rounded-[40px] overflow-hidden shadow-md relative group">
                                    @if ($item->image)
                                        <!-- Image Item -->
                                        <a href="{{ asset('uploads/gallery/' . $item->image) }}"
                                           data-fslightbox="gallery"
                                           class="block relative">
                                            <img src="{{ asset('uploads/gallery/' . $item->image) }}"
                                                 alt="Gallery Image"
                                                 class="w-full h-[220px] object-cover transition-transform duration-300 group-hover:scale-105">
                                        </a>
                                    @elseif ($videoId)
                                        <!-- Video Item -->
                                        <iframe width="300" height="220"
                                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                                frameborder="0"
                                                allowfullscreen
                                                class="rounded-[20px] w-full h-[220px] object-cover"></iframe>
                                    @else
                                        <!-- Empty Placeholder -->
                                        <div class="w-[300px] h-[220px] flex items-center justify-center bg-gray-100 text-gray-500 text-sm">
                                            No Image or Video
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <p class="text-center text-gray-500">No gallery items found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- GALLERY SECTION END -->




        <!-- TESTIMONIAL SECTION START -->
      {{-- <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex md:flex-col items-start gap-y-[40px]">

                <!-- Upcoming Events -->
                <div>
                    <!-- Heading -->
                    <div class="pb-[40px] sm:pb-[20px] flex justify-end md:justify-start
                                bg-[url('../assets/img/testimonial-heading-vector.svg')] bg-no-repeat bg-right-bottom
                                bg-[length:1000px] mb-[40px] md:bg-none md:mb-0">
                        <div>
                            <h6 class="ed-section-sub-title">Event</h6>
                            <h2 class="ed-section-title !text-[30px]">Upcoming Events</h2>
                        </div>
                    </div>

                    <!-- Events List -->
                    <div class="grow space-y-[30px]">
                        @forelse($events as $event)
                            @php
                                $date = \Carbon\Carbon::parse($event->event_date);
                            @endphp

                            <!-- Single Upcoming Event -->
                            <div class="bg-white flex lg:flex-col items-start gap-x-[20px] gap-y-[10px]
                                        shadow-[0_4px_30px_rgba(0,0,0,0.1)] rounded-[20px] p-[30px] xxs:p-[20px]">

                                <!-- Date -->
                                <div class="bg-edyellow rounded-[10px] font-medium text-[16px] text-black
                                            inline-block uppercase overflow-hidden text-center shrink-0">
                                    <span class="bg-edpurple text-white text-[20px] block py-[7px] px-[30px] rounded-[10px]">
                                        {{ $date->format('Y') }}
                                    </span>
                                    <span class="px-[15px] p-[10px] block leading-[1.44] font-semibold">
                                        {{ $date->format('d') }}
                                        <span class="block">{{ $date->format('M') }}</span>
                                    </span>
                                </div>

                                <!-- Event Info -->
                                <div>
                                    <h5 class="font-semibold text-[20px] mb-[7px]">
                                        <a href="{{ route('eventDetails', ['event_name' => $event->event_name]) }}"
                                        class="hover:text-edpurple">
                                            {{ $event->event_name }}
                                        </a>
                                    </h5>
                                    <h6 class="text-edpurple font-medium">
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
                                    </h6>
                                    <p class="border-t border-[#002147]/20 pt-[17px] mt-[10px]">
                                        {{ Str::limit($event->short_description, 100) }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">No upcoming events available.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </section> --}}


       <!-- heading -->

        >

     <div class="py-[120px] xl:py-[80px] md:py-[60px]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <!-- event cards -->
                  <div class="text-center mb-[46px] md:mb-[30px]">
                    <h6 class="text-green text-[18px] font-semibold uppercase tracking-wide mb-2">Events</h6>
                    <h2 class="text-green text-[28px] font-semibold uppercase tracking-wide mb-2">Upcoming Events</h2>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-1 gap-[30px] md:gap-[20px]">


                    @php
                        use Carbon\Carbon;
                    @endphp

                    @foreach($events as $event)
                        @php
                            $eventDate = Carbon::parse($event->event_date);
                            $startTime = Carbon::parse($event->start_time)->format('H:i');
                            $endTime = Carbon::parse($event->end_time)->format('H:i');
                        @endphp

                        <div class="bg-white flex lg:flex-col items-start gap-x-[20px] gap-y-[10px] shadow-[0_4px_30px_rgba(0,0,0,0.1)] rounded-[20px] p-[30px] xxs:p-[20px]">

                            <!-- date -->
                            <div class="bg-red rounded-[10px] font-medium text-[16px] text-black inline-block uppercase overflow-hidden text-center shrink-0">
                                <span class="bg-edpurple text-white text-[20px] block py-[7px] px-[30px] rounded-[10px]">
                                    {{ $eventDate->format('Y') }}
                                </span>
                                <span class="bg-red px-[15px] p-[10px] block leading-[1.44] font-semibold">
                                    {{ $eventDate->format('d') }}
                                    <span class="block">{{ $eventDate->format('M') }}</span>
                                </span>
                            </div>

                            <!-- text -->
                            <div>
                                <h5 class="font-semibold text-[20px] mb-[7px]">
                                    <a href="#" class="hover:text-edpurple">
                                        {{ $event->event_name }}
                                    </a>
                                </h5>
                                <h6 class="text-edpurple font-medium">{{ $startTime }} - {{ $endTime }}</h6>
                                <p class="border-t border-[#002147]/20 pt-[17px] mt-[10px]">
                                    {{ Str::limit($event->short_description, 120) }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>
        </div>

        <!-- TESTIMONIAL SECTION END -->



        <!-- BLOG SECTION START -->
        <section class="py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] overflow-hidden">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <!-- heading -->
                <div class="text-center mb-[46px] md:mb-[30px]">
                    <h6 class="text-green text-[18px] font-semibold uppercase tracking-wide mb-2">Latest Blog</h6>
                    <h2 class="text-green text-[28px] font-semibold uppercase tracking-wide mb-2">Our Latest News</h2>
                </div>

                <!-- blog cards -->
                <div class="grid grid-cols-3 md:grid-cols-2 xs:grid-cols-1 xs:max-w-[65%] xxs:max-w-full xs:mx-auto gap-[30px] lg:gap-[20px] sm:gap-[15px]">
                    <!-- single blog -->
                 @foreach ($blog as $item)
                <div class="et-blog bg-white border border-[#E5E5E5] rounded-[8px] p-[24px] lg:p-[20px] sm:p-[18px] relative group">
                    <div class="ed-blog__img relative z-[1] mb-[45px]">
                        <div class="overflow-hidden rounded-[6px]">
                            <img src="{{ asset('uploads/blog/' . $item->image) }}"
                                alt="{{ $item->title }}"
                                class="w-full aspect-[37/24] object-cover transition duration-[400ms] group-hover:scale-105">
                        </div>

                        @php
                            $date = \Carbon\Carbon::parse($item->posted_on);
                        @endphp

                        <div class="bg-red absolute left-[20px] bottom-0 translate-y-[50%] rounded-[10px] font-bold text-[14px] text-black inline-block uppercase overflow-hidden text-center shadow-[0_4px_30px_rgba(0,0,0,0.08)]">
                            <span class="bg-edpurple text-white block py-[3px] rounded-[10px]">{{ $date->format('d') }}</span>
                            <span class=" bg-red px-[11px] py-[2px] block">{{ $date->format('F') }}</span>
                        </div>
                    </div>

                    <div class="et-blog__txt">
                        <div class="et-blog__infos flex gap-x-[30px] mb-[13px]">
                            <!-- Author -->
                            <div class="et-blog-info flex items-center gap-x-[10px]">
                                <span class="icon"><img src="{{ asset('assets/img/icon/user.svg') }}" alt="icon"></span>
                                <span class="text font-medium text-[14px] text-edgray">By {{ $item->posted_by ?? 'Admin' }}</span>
                            </div>

                            <!-- Tag (optional, static or dynamic) -->
                            <div class="et-blog-info flex items-center gap-x-[10px]">
                                <span class="icon"><img src="{{ asset('assets/img/icon/tag.svg') }}" alt="icon"></span>
                                <span class="text font-medium text-[14px] text-edgray">Meditation</span>
                            </div>
                        </div>

                        <h4 class="et-blog__title text-[20px] sm:text-[18px] font-semibold leading-[1.6] mb-[20px]">
                            <a href="{{ route('blogDetails', ['title' => $item->title]) }}" class="hover:text-edpurple">{{ $item->title }}</a>
                        </h4>

                        <a href="{{ route('blogDetails', ['title' => $item->title]) }}" class="font-semibold text-[16px] text-edgray inline-flex items-center gap-[10px] hover:text-edpurple">
                            Read More <span><i class="fa-solid fa-arrow-right-long"></i></span>
                        </a>
                    </div>
                </div>
            @endforeach




                </div>

                <!-- partners -->
{{--                <div class="ed-partners-slider swiper mt-[100px] xl:mt-[70px] md:mt-[50px]">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        <!-- single partner -->--}}
{{--                        <div class="swiper-slide"><img src="assets/img/partner-1.png" alt="Partner Logo" class="xxs:mx-auto"></div>--}}
{{--                        <!-- single partner -->--}}
{{--                        <div class="swiper-slide"><img src="assets/img/partner-2.png" alt="Partner Logo" class="xxs:mx-auto"></div>--}}
{{--                        <!-- single partner -->--}}
{{--                        <div class="swiper-slide"><img src="assets/img/partner-3.png" alt="Partner Logo" class="xxs:mx-auto"></div>--}}
{{--                        <!-- single partner -->--}}
{{--                        <div class="swiper-slide"><img src="assets/img/partner-4.png" alt="Partner Logo" class="xxs:mx-auto"></div>--}}
{{--                        <!-- single partner -->--}}
{{--                        <div class="swiper-slide"><img src="assets/img/partner-5.png" alt="Partner Logo" class="xxs:mx-auto"></div>--}}
{{--                        <!-- single partner -->--}}
{{--                        <div class="swiper-slide"><img src="assets/img/partner-6.png" alt="Partner Logo" class="xxs:mx-auto"></div>--}}
{{--                        <!-- single partner -->--}}
{{--                        <div class="swiper-slide"><img src="assets/img/partner-1.png" alt="Partner Logo" class="xxs:mx-auto"></div>--}}
{{--                        <!-- single partner -->--}}
{{--                        <div class="swiper-slide"><img src="assets/img/partner-2.png" alt="Partner Logo" class="xxs:mx-auto"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- vector -->
                <div>
                    <img src="assets/img/form-notice-vector-1.svg" alt="vector" class="absolute -z-[1] bottom-[288px] left-0 pointer-events-none">
                </div>
            </div>
        </section>
        <!-- BLOG SECTION END -->
    </main>

@endsection
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        #rating-stars i {
            color: #ccc;
            cursor: pointer;
        }
        #rating-stars i.fas {
            color: gold;
        }
    </style>


@endpush

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('reviewForm');
            const stars = document.querySelectorAll('#rating-stars i');
            const ratingInput = document.getElementById('rating');
            const submitBtn = document.getElementById('submitBtn');
            let formIsValid = false;

            // Initialize rating stars
            function initializeRating() {
                const currentRating = parseInt(ratingInput.value);
                if (currentRating > 0) {
                    stars.forEach((star, index) => {
                        if (index < currentRating) {
                            star.classList.remove('far', 'text-gray-400');
                            star.classList.add('fas', 'text-yellow-400');
                        }
                    });
                }
            }
            initializeRating();

            // Rating System
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = parseInt(this.getAttribute('data-value'));
                    ratingInput.value = value;
                    document.getElementById('rating-error').classList.add('hidden');

                    stars.forEach((s, index) => {
                        if (index < value) {
                            s.classList.remove('far', 'text-gray-400');
                            s.classList.add('fas', 'text-yellow-400');
                        } else {
                            s.classList.remove('fas', 'text-yellow-400');
                            s.classList.add('far', 'text-gray-400');
                        }
                    });

                    validateForm();
                });

                star.addEventListener('mouseover', function() {
                    if (!this.classList.contains('fas')) {
                        const value = parseInt(this.getAttribute('data-value'));

                        stars.forEach((s, index) => {
                            if (index < value && !s.classList.contains('fas')) {
                                s.classList.add('text-yellow-300');
                            }
                        });
                    }
                });

                star.addEventListener('mouseout', function() {
                    const currentRating = parseInt(ratingInput.value);

                    stars.forEach((s, index) => {
                        if (index >= currentRating && s.classList.contains('text-yellow-300')) {
                            s.classList.remove('text-yellow-300');
                        }
                    });
                });
            });

            // Form Validation
            function validateForm() {
                formIsValid = true;

                // Validate Name
                const name = document.getElementById('name').value.trim();
                if (name === '') {
                    document.getElementById('name-error').classList.remove('hidden');
                    formIsValid = false;
                } else {
                    document.getElementById('name-error').classList.add('hidden');
                }

                // Validate Email
                const email = document.getElementById('email').value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    document.getElementById('email-error').classList.remove('hidden');
                    formIsValid = false;
                } else {
                    document.getElementById('email-error').classList.add('hidden');
                }

                // Validate Message
                const message = document.getElementById('message').value.trim();
                if (message === '') {
                    document.getElementById('message-error').classList.remove('hidden');
                    formIsValid = false;
                } else {
                    document.getElementById('message-error').classList.add('hidden');
                }

                // Validate Image
                const image = document.getElementById('image').value;
                if (image === '') {
                    document.getElementById('image-error').classList.remove('hidden');
                    formIsValid = false;
                } else {
                    document.getElementById('image-error').classList.add('hidden');
                }

                // Validate Rating
                if (ratingInput.value === '0') {
                    document.getElementById('rating-error').classList.remove('hidden');
                    formIsValid = false;
                } else {
                    document.getElementById('rating-error').classList.add('hidden');
                }

                return formIsValid;
            }

            // Validate on input
            document.getElementById('name').addEventListener('input', validateForm);
            document.getElementById('email').addEventListener('input', validateForm);
            document.getElementById('message').addEventListener('input', validateForm);
            document.getElementById('image').addEventListener('change', validateForm);

            // Form submission
            form.addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                    // Scroll to first error
                    const firstError = document.querySelector('.text-red-500:not(.hidden)');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });

            // Initial validation check
            validateForm();
        });
    </script>

@endpush

