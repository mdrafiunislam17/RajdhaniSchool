@extends('front.layouts.app')

@section('title', 'Saying')

@section('content')
<main>
    <!-- BREADCRUMB SECTION START -->
    <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
        <img src="{{ asset("uploads/" . $settings["SETTING_PAGE_BANNER"]) }}"
             alt="Breadcrumb Background"
             class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

        <div class="relative z-10 mx-[19.71%]">
            <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">Saying & Member </h1>
            <ul class="flex items-center justify-center gap-[10px] text-white">
                <li><a href="{{route('front.index')}}" class="text-edyellow">Home</a></li>
                <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                <li>Saying & Member </li>
            </ul>
        </div>

        <div class="vectors">
            <img src="{{asset('assets/img/breadcrumb-vector-1.svg')}}" alt="vector" class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
            <img src="{{asset('assets/img/breadcrumb-vector-2.svg')}}" alt="vector" class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
        </div>
    </section>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- TEACHER SECTION START -->
    <section class="py-[120px] xl:py-[80px] md:py-[60px] relative z-[1]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="grid grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">
                @foreach ($saying as $item)
                <div class="ed-teacher group">
                    <!-- Image Section -->
                    <div class="ed-teacher__img rounded-[16px] overflow-hidden">
                        <img src="{{ asset('uploads/saying/' . $item->image) }}" alt="{{ $item->name }}" class="w-full aspect-[370/375] duration-300 group-hover:scale-110">
                    </div>

                    <!-- Content -->
                    <div class="ed-teacher__txt bg-white relative z-[1] mx-[25px] lg:mx-[20px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] xl:px-[20px] md:px-[15px] pb-[30px] lg:pb-[25px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">



                        <!-- Name & Designation -->
                        <h5 class="font-semibold text-[20px] text-etBlack mb-[4px]">
                            <a href="{{ route('sayingDetails', ['name' => $item->name]) }}" class="hover:text-etBlue">
                                {{ $item->name }}
                            </a>
                        </h5>
                        <span class="text-etGray text-[16px]">{{ $item->designation }}</span>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- TEACHER SECTION END -->
</main>
@endsection
