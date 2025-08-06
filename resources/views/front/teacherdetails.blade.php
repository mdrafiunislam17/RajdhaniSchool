
@extends('front.layouts.app')

@section('title', 'Teacher Details')

@section('content')


    <main>
        <!-- BREADCRUMB SECTION START -->
        <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
        <img src="{{ asset("uploads/" . $settings["SETTING_PAGE_BANNER"]) }}"
            alt="Breadcrumb Background"
            class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

        <div class="relative z-10 mx-[19.71%]">
            <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">Teacher Details</h1>
            <ul class="flex items-center justify-center gap-[10px] text-white">
                <li><a href="{{route('front.index')}}" class="text-edyellow">Home</a></li>
                <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                <li>Teacher Details</li>
            </ul>
        </div>

            <div class="vectors">
                <img src="{{asset('assets/img/breadcrumb-vector-1.svg')}}" alt="vector" class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
                <img src="{{asset('assets/img/breadcrumb-vector-2.svg')}}" alt="vector" class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
            </div>
        </section>
        <!-- BREADCRUMB SECTION END -->


        <!-- TEAM MEMBER DETAILS SECTION START -->
        <div class="py-[130px] xl:py-[80px] md:py-[60px]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="flex md:flex-col items-center md:items-start gap-x-[30px] gap-y-[15px] border border-[#E5E5E5] rounded-[12px] p-[30px] xs:p-[20px] xxs:p-[15px]">
                    <div class="img shrink-0">
                        <img src="{{ asset('uploads/teacher/' . $teacher->image) }}" alt="team member image" class="w-[370px] xxs:max-w-full aspect-[74/75] rounded-[12px]">
                    </div>

                    <!-- txt -->
                    <div class="txt">
                        <h3 class="text-[30px] xxs:text-[25px] font-semibold mb-[6px]">{{$teacher->name}}</h3>
                        <h6 class="text-edgray font-medium text-[16px]">{{$teacher->position}}</h6>
                        <p class="font-normal text-[16px] text-edgray mt-[16px]">{!! $teacher->description !!}</p>
                        <ul class="infos border-y border-[#E5E5E5] mt-[31px] lg:mt-[18px] mb-[36px] lg:mb-[26px] py-[24px] lg:py-[14px] xs:py-[11px] flex flex-wrap gap-x-[40px] gap-y-[15px] xs:gap-y-[10px] text-[16px] text-etBlack">
                            <li class="text-[16px]"><span class="font-medium text-edpurple">Experience:</span> {{$teacher->experience}}</li>
                            <li class="text-[16px]"><span class="font-medium text-edpurple">Position:</span> {{$teacher->position}}</li>
                            <li class="text-[16px]"> <span class="font-medium text-edpurple">Phone:</span> {{$teacher->phone}}</li>
                        </ul>

                        <!-- social links -->
                        <div class="flex items-center gap-[16px]">
                            <h6 class="text-edpurple font-medium">Social Media</h6>
                            <div class="flex gap-[20px] text-[16px] text-edpurple">
                                <a href="{{$teacher->facebook}}" class="hover:text-edblue"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="{{$teacher->instagram}}" class="hover:text-edblue"><i class="fa-brands fa-instagram"></i></a>
                                <a href="{{$teacher->linkedin}}" class="hover:text-edblue"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="{{$teacher->twitter}}" class="hover:text-edblue"><i class="fa-brands fa-x-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- TEAM MEMBER DETAILS SECTION START -->


        <!-- TEACHER SECTION START -->
        <section class="pb-[120px] xl:pb-[80px] md:pb-[60px] relative z-[1]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <!-- heading -->
                <div class="flex flex-wrap xs:flex-col xs:text-center justify-between items-end xs:items-center gap-y-[15px] pb-[26px] border-b border-[#002147]/15 mb-[46px] md:mb-[30px]">
                   <div>
                        <h6 class="text-green text-[18px] font-semibold uppercase tracking-wide mb-2">Our Expert</h6>
                        <h2 class="text-green text-[28px] font-semibold uppercase tracking-wide mb-2">Our Expert Teacher</h2>
                    </div>

                    <div class="ed-teachers-slider-nav flex gap-[15px] *:w-[40px] *:h-[40px] *:rounded-full *:border *:border-[#808080]/20 *:text-black *:text-[20px]">
                        {{-- <button  class="prev hover:bg-edpurple hover:border-edpurple hover:text-white"><i class="fa-solid fa-angle-left"></i></button>
                        <button class="next hover:bg-edpurple hover:border-edpurple hover:text-white"><i class="fa-solid fa-angle-right"></i></button> --}}
                    </div>
                </div>

                <!-- slider -->
                <div class="ed-teachers-slider swiper">
                    <div class="swiper-wrapper">
                        <!-- single teacher -->
                        @foreach ($teachers as $item)


                           <div class="swiper-slide">
                            <div class="ed-teacher group">
                                <div class="ed-teacher__img rounded-[16px] overflow-hidden">
                                    <img src="{{ asset('uploads/teacher/' . $item->image) }}" alt="Team Member Image" class="w-full aspect-[370/375] duration-[400ms] group-hover:scale-110">
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
                                         <a href="{{ route('teacherdetails', ['name' => $item->name]) }}" class="hover:text-etBlue">
                                        {{ $item->name }}
                                    </a>


                                    </h5>
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </section>
        <!-- TEACHER SECTION END -->
    </main>

@endsection
