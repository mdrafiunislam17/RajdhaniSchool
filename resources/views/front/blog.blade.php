@extends('front.layouts.app')

@section('title', 'Blog ')

@section('content')

    <main>
        <!-- BREADCRUMB SECTION START -->
                <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
            <img src="{{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }}"
                 alt="Breadcrumb Background"
                 class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

            <div class="relative z-10 mx-[19.71%]">
                <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">Blog </h1>
                <ul class="flex items-center justify-center gap-[10px] text-white">
                    <li><a href="{{ route('front.index') }}" class="text-edyellow">Home</a></li>
                    <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                    <li>Blog </li>
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


        <!-- MAIN CONTENT START -->
        <div class="ed-event-details-content py-[120px] xl:py-[80px] md:py-[60px]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="grid grid-cols-3 md:grid-cols-2 xs:grid-cols-1 gap-[30px] lg:gap-[15px]">
                    <!-- single news -->
                  @foreach ($blogs as $blog)
                        <div>
                            <!-- Blog Image -->
                            <div class="rounded-[8px] overflow-hidden">
                                <img
                                    src="{{ asset('uploads/blog/' . $blog->image) }}"
                                    alt="{{ $blog->title }}"
                                    class="w-full aspect-[450/294] object-cover">
                            </div>

                            <!-- Blog Content -->
                            <div class="bg-white mx-[20px] lg:mx-[15px] shadow-[0_4px_25px_rgba(0,0,0,0.06)] p-[25px] lg:p-[20px] rounded-[8px] -mt-[67px] relative">
                                <span class="inline-block mb-[10px] font-medium text-edgray2">
                                    {{ \Carbon\Carbon::parse($blog->posted_on)->format('F d, Y') }}
                                </span>

                                <h5>
                                    <a href="{{ route('blogDetails', ['title' => $blog->title]) }}"
                                    class="font-semibold text-[24px] lg:text-[22px] sm:text-[20px] leading-[142%] hover:text-edpurple">
                                        {{ Str::limit($blog->title, 100) }}
                                    </a>
                                </h5>

                                <div class="flex justify-between items-center border-t border-[#D9D9D9] pt-[30px] md:pt-[20px] mt-[33px] md:mt-[23px]">
                                    <div class="flex items-center gap-[10px]">
                                        <img
                                            src="{{ asset('uploads/blog/' . $blog->image) }}"
                                            alt="Author"
                                            class="w-[44px] aspect-square rounded-full">
                                        <div>
                                            <h6 class="font-medium text-[16px] leading-[1.3]">{{ $blog->posted_by ?? 'Admin' }}</h6>
                                            {{-- <span class="text-[14px] text-edgray">Co Founder</span> --}}
                                             {{-- Optional: change to dynamic designation if available --}}
                                        </div>
                                    </div>
                                    <a href="{{ route('blogDetails', ['title' => $blog->title]) }}" class="text-edpurple text-[18px] hover:text-black">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>


            </div>
        </div>
        <!-- MAIN CONTENT END -->
    </main>
@endsection
