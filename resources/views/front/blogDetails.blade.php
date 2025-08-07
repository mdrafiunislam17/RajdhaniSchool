@extends('front.layouts.app')

@section('title', 'Blog Details - ' . $blog->title)

@section('content')
    <main>
        <!-- BREADCRUMB SECTION START -->
        <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
            <img src="{{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }}"
                 alt="Blog Details Banner"
                 class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none"
                 loading="lazy">

            <div class="relative z-10 mx-[19.71%]">
                <h1 class="font-semibold text-[clamp(35px,6vw,56px] text-white">Blog Details</h1>
                <ul class="flex items-center justify-center gap-[10px] text-white">
                    <li><a href="{{ route('front.index') }}" class="text-edyellow hover:underline">Home</a></li>
                    <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                    <li>Blog Details</li>
                </ul>
            </div>

            <div class="vectors">
                <img src="{{ asset('assets/img/breadcrumb-vector-1.svg') }}" alt="Decorative vector"
                     class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]"
                     aria-hidden="true">
                <img src="{{ asset('assets/img/breadcrumb-vector-2.svg') }}" alt="Decorative vector"
                     class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]"
                     aria-hidden="true">
            </div>
        </section>
        <!-- BREADCRUMB SECTION END -->

        <!-- MAIN CONTENT START -->
        <div class="ed-event-details-content py-[120px] xl:py-[80px] md:py-[60px]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="flex gap-[30px] lg:gap-[20px] md:flex-col md:items-center">
                    <!-- Main Content -->
                    <div class="left grow space-y-[40px] md:space-y-[30px]">
                        <!-- Blog Post -->
                        <article>
                            <div class="img overflow-hidden rounded-[8px] mb-[30px] relative">
                                <img src="{{ asset('uploads/blog/' . $blog->image) }}"
                                     alt="{{ $blog->title }}"
                                     class="w-full h-auto max-h-[380px] object-cover"
                                     loading="lazy">

                                <div class="bg-[#ECF0F5] rounded-[10px] font-medium text-[14px] text-black inline-block uppercase overflow-hidden text-center absolute top-[20px] left-[20px]">
                                    <span class="bg-edpurple text-white block py-[3px] rounded-[10px]">
                                        {{ \Carbon\Carbon::parse($blog->posted_on)->format('d') }}
                                    </span>
                                    <span class="px-[11px] py-[2px] block">
                                        {{ \Carbon\Carbon::parse($blog->posted_on)->format('F') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Blog Content -->
                            <div>
                                <!-- Meta Info -->
                                <div class="flex items-center gap-[30px] mb-[7px] flex-wrap">
                                    <!-- Author -->
                                    <div class="flex gap-[10px] items-center">
                                        <span class="icon shrink-0" aria-hidden="true">
                                            <img src="{{ asset('assets/img/icon/user.svg') }}" alt="" width="16" height="16">
                                        </span>
                                        <span class="text-[14px] text-edgray">
                                            By <a href="#" class="hover:text-edpurple">{{ $blog->posted_by ?? 'Admin' }}</a>
                                        </span>
                                    </div>
                                </div>

                                <h2 class="text-[30px] lg:text-[27px] sm:text-[24px] xxs:text-[22px] font-semibold text-black mb-[18px]">
                                    {{ $blog->title }}
                                </h2>

                                <div class="prose max-w-none">
                                    <p class="font-normal text-[16px] text-edgray mb-[16px]">
                                        {{ $blog->short_detail }}
                                    </p>

                                    <div class="font-normal text-[16px] text-edgray space-y-4">
                                     {!! $blog->detail !!}
                                    </div>

                                </div>
                            </div>
                        </article>

                        <!-- Social Sharing/Other Actions could go here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- MAIN CONTENT END -->
    </main>
@endsection
