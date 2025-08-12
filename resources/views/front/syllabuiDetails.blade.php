@extends('front.layouts.app')

@section('title', 'syllabus Details')

@section('content')
<main>
    <!-- BREADCRUMB SECTION START -->
    <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
        <img src="{{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }}"
             alt="Breadcrumb Background"
             class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

        <div class="relative z-10 mx-[19.71%]">
            <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">syllabus Details</h1>
            <ul class="flex items-center justify-center gap-[10px] text-white">
                <li><a href="{{ route('front.index') }}" class="text-edyellow">Home</a></li>
                <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                <li>syllabus Details</li>
            </ul>
        </div>

        <div class="vectors">
            <img src="{{ asset('assets/img/breadcrumb-vector-1.svg') }}" alt="vector"
                 class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
            <img src="{{ asset('assets/img/breadcrumb-vector-2.svg') }}" alt="vector"
                 class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- syllabus DETAILS SECTION START -->
    <div class="py-[130px] xl:py-[80px] md:py-[60px]">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex md:flex-col items-start gap-x-[30px] gap-y-[15px] border border-[#E5E5E5] rounded-[12px] p-[30px] xs:p-[20px] xxs:p-[15px]">

                {{-- syllabus Image --}}
                @if($syllabus->image)
                    <div class="img shrink-0">
                        <img src="{{ asset('uploads/syllabi/'.$syllabus->image) }}" alt="syllabus Image"
                             class="w-[370px] xxs:max-w-full aspect-[74/75] rounded-[12px] object-cover">
                    </div>
                @endif

                {{-- syllabus Content --}}
                <div class="txt w-full">
                    <h3 class="text-[30px] xxs:text-[25px] font-semibold mb-[6px] text-edblue">{{ $syllabus->title }}</h3>

                    <h6 class="text-edgray font-medium text-[16px] mb-2">
                        Published on: {{ \Carbon\Carbon::parse($syllabus->created_at)->format('F d, Y') }}
                    </h6>

                    <p class="font-normal text-[16px] text-edgray mt-[16px] leading-relaxed">
                        {!! $syllabus->description !!}
                    </p>

                    {{-- Additional Info --}}
                    <ul class="infos border-y border-[#E5E5E5] mt-[31px] lg:mt-[18px] mb-[36px] lg:mb-[26px] py-[24px] lg:py-[14px] xs:py-[11px] flex flex-wrap gap-x-[40px] gap-y-[15px] xs:gap-y-[10px] text-[16px] text-etBlack">
                        @if($syllabus->pdf)
                            <li class="text-[16px]">
                                <span class="font-medium text-edpurple">Attachment:</span>
                                <a href="{{ asset('uploads/syllabi/pdf/'.$syllabus->pdf) }}" target="_blank" class="text-etBlue underline ml-1">Download PDF</a>
                            </li>
                        @endif
                        {{-- <li class="text-[16px]">
                            <span class="font-medium text-edpurple">Status:</span>
                            {{ $syllabus->status == 1 ? 'Active' : 'Inactive' }}
                        </li> --}}
                    </ul>

                    {{-- Social or Action buttons --}}
                    {{-- Add buttons if needed --}}
                </div>
            </div>
        </div>
    </div>
    <!-- syllabus DETAILS SECTION END -->

</main>
@endsection
