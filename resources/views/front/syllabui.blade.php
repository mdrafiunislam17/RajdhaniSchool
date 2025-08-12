@extends('front.layouts.app')

@section('title', 'syllabus')

@section('content')
<main>
    <!-- BREADCRUMB SECTION START -->
    {{-- <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
        <img src="{{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }}"
             alt="Breadcrumb Background"
             class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

        <div class="relative z-10 mx-[19.71%]">
            <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">syllabus</h1>
            <ul class="flex items-center justify-center gap-[10px] text-white">
                <li><a href="{{ route('front.index') }}" class="text-edyellow">Home</a></li>
                <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                <li>syllabus</li>
            </ul>
        </div>

        <div class="vectors">
            <img src="{{ asset('assets/img/breadcrumb-vector-1.svg') }}" alt="vector"
                 class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
            <img src="{{ asset('assets/img/breadcrumb-vector-2.svg') }}" alt="vector"
                 class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
        </div>
    </section> --}}

      <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
        <img src="{{ asset("uploads/" . $settings["SETTING_PAGE_BANNER"]) }}"
             alt="Breadcrumb Background"
             class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

        <div class="relative z-10 mx-[19.71%]">
            <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">syllabus </h1>
            <ul class="flex items-center justify-center gap-[10px] text-white">
                <li><a href="{{route('front.index')}}" class="text-green">Home</a></li>
                <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                <li>syllabus </li>
            </ul>
        </div>

        <div class="vectors">
            <img src="{{asset('assets/img/breadcrumb-vector-1.svg')}}" alt="vector" class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
            <img src="{{asset('assets/img/breadcrumb-vector-2.svg')}}" alt="vector" class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- syllabus SECTION START -->
    <section class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="relative border-l-[1px] border-edpurple pl-[50px] xl:pl-[40px] xxs:pl-0">
                @foreach ($syllabus as $item)
                    <div class="flex gap-x-[20px] items-center relative before:absolute before:h-[1px] before:w-[40px] xl:before:w-[30px] before:bg-edpurple before:right-[100%] before:top-[50%] before:-translate-y-[50%] xxs:before:content-none after:absolute after:w-[1px] after:h-[114%] after:bg-edpurple after:bottom-[50%] after:right-[calc(100%+40px)] xl:after:right-[calc(100%+30px)] xxs:after:content-none first:after:content-none pb-[26px] md:pb-[16px] border-b border-[#D9D9D9] mb-[30px]">
                        {{-- Icon --}}
                        <div class="xxs:hidden icon shrink-0 p-[14px] bg-white border border-[#d9d9d9] rounded-[10px] w-[110px] xl:w-[90px] aspect-square flex items-center justify-center">
                            <img src="{{ asset('assets/img/notice-icon.png') }}" alt="icon" class="max-w-full">
                        </div>

                        {{-- syllabus Content --}}
                        <div class="flex-1">
                            <h5 class="font-semibold text-[20px] text-edblue mb-[6px]">
                                <a href="{{ route('syllabuiDetails', ['title' => $item->title]) }}" class="hover:text-edpurple transition-all duration-300">{{ $item->title }}</a>
                            </h5>
                            <h6 class="font-medium text-edpurple mb-[10px] text-[14px]">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                            </h6>
                            <p class="text-edgray text-[15px] leading-relaxed">
                                {{ \Illuminate\Support\Str::words(strip_tags($item->description), 13, '...') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- syllabus SECTION END -->

</main>
@endsection
