@extends('front.layouts.app')

@section('title', 'Teacher')

@section('content')
<main>
    <!-- BREADCRUMB SECTION START -->
    <section class="pt-[327px] xl:pt-[287px] lg:pt-[237px] sm:pt-[200px] xxs:pt-[180px] pb-[158px] xl:pb-[118px] lg:pb-[98px] sm:pb-[68px] xs:pb-[48px] text-center bg-[url('../assets/img/breadcrumb-bg.jpg')] bg-no-repeat bg-cover bg-center relative z-[1] overflow-hidden before:absolute before:-z-[1] before:inset-0 before:bg-edblue/70 before:pointer-events-none">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">Our Teacher</h1>
            <ul class="flex items-center justify-center gap-[10px] text-white">
                <li><a href="{{ route('front.index') }}" class="text-edyellow">Home</a></li>
                <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                <li>Our Teacher</li>
            </ul>
        </div>

        <div class="vectors">
            <img src="{{ asset('assets/img/breadcrumb-vector-1.svg') }}" alt="Vector" class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
            <img src="{{ asset('assets/img/breadcrumb-vector-2.svg') }}" alt="Vector" class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- TEACHER SECTION START -->
    <section class="py-[120px] xl:py-[80px] md:py-[60px] relative z-[1]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="grid grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">
                @foreach ($teacher as $item)
                <div class="ed-teacher group">
                    <!-- Image Section -->
                    <div class="ed-teacher__img rounded-[16px] overflow-hidden">
                        <img src="{{ asset('uploads/teacher/' . $item->image) }}" alt="{{ $item->name }}" class="w-full aspect-[370/375] duration-300 group-hover:scale-110">
                    </div>

                    <!-- Content -->
                    <div class="ed-teacher__txt bg-white relative z-[1] mx-[25px] lg:mx-[20px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] xl:px-[20px] md:px-[15px] pb-[30px] lg:pb-[25px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">

                        <!-- Social Icons -->
                        <div class="ed-teacher-socials absolute right-[20px] -top-[43px]">
                            <div class="ed-speaker__socials flex flex-col gap-[8px] absolute -z-[2] text-[14px] opacity-0 transition duration-300 bottom-[calc(100%+8px)] translate-y-[100%] group-hover:translate-y-0 group-hover:opacity-100">
                                @if($item->facebook)
                                    <a href="{{ $item->facebook }}" class="bg-white text-edgreen w-[36px] h-[36px] flex items-center justify-center rounded-full hover:text-white hover:bg-edpurple"><i class="fa-brands fa-facebook-f"></i></a>
                                @endif
                                @if($item->twitter)
                                    <a href="{{ $item->twitter }}" class="bg-white text-edgreen w-[36px] h-[36px] flex items-center justify-center rounded-full hover:text-white hover:bg-edpurple"><i class="fa-brands fa-x-twitter"></i></a>
                                @endif
                                @if($item->linkedin)
                                    <a href="{{ $item->linkedin }}" class="bg-white text-edgreen w-[36px] h-[36px] flex items-center justify-center rounded-full hover:text-white hover:bg-edpurple"><i class="fa-brands fa-linkedin-in"></i></a>
                                @endif
                                @if($item->instagram)
                                    <a href="{{ $item->instagram }}" class="bg-white text-edgreen w-[36px] h-[36px] flex items-center justify-center rounded-full hover:text-white hover:bg-edpurple"><i class="fa-brands fa-instagram"></i></a>
                                @endif
                            </div>
                        </div>

                        <!-- Name & Designation -->
                        <h5 class="font-semibold text-[20px] text-etBlack mb-[4px]">
                            <a href="{{ route('teacherdetails', ['name' => $item->name]) }}" class="hover:text-etBlue">
                                {{ $item->name }}
                            </a>
                        </h5>
                        <span class="text-etGray text-[16px]">{{ $item->position }}</span>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{-- <div class="flex items-center gap-[20px] pt-[60px] justify-center text-[16px]">
                <a href="#" class="hover:text-edpurple"><i class="fa-solid fa-arrow-left-long"></i></a>
                <div class="ed-pagination flex gap-[10px] items-center">
                    <a href="#" class="border border-[#d9d9d9] rounded-full w-[50px] h-[50px] flex items-center justify-center text-etBlack hover:bg-edpurple hover:border-edpurple hover:text-white active">01</a>
                    <a href="#" class="border border-[#d9d9d9] rounded-full w-[50px] h-[50px] flex items-center justify-center text-etBlack hover:bg-edpurple hover:border-edpurple hover:text-white">02</a>
                    <a href="#" class="border border-[#d9d9d9] rounded-full w-[50px] h-[50px] flex items-center justify-center text-etBlack hover:bg-edpurple hover:border-edpurple hover:text-white">03</a>
                </div>
                <a href="#" class="hover:text-edpurple"><i class="fa-solid fa-arrow-right-long"></i></a>
            </div> --}}
        </div>
    </section>
    <!-- TEACHER SECTION END -->
</main>
@endsection
