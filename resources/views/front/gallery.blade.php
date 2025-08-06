@extends('front.layouts.app')

@section('title', 'Gallery Details')

@section('content')
    <main>
        <!-- BREADCRUMB SECTION START -->
        <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
            <img src="{{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }}"
                 alt="Breadcrumb Background"
                 class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

            <div class="relative z-10 mx-[19.71%]">
                <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">Gallery Details</h1>
                <ul class="flex items-center justify-center gap-[10px] text-white">
                    <li><a href="{{ route('front.index') }}" class="text-edyellow">Home</a></li>
                    <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                    <li>Gallery Details</li>
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

        <!-- GALLERY DETAILS SECTION START -->
        <div class="py-[130px] xl:py-[80px] md:py-[60px]">
            <div class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
                <div class="grid grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">
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

                        <div class="relative group overflow-hidden rounded-[20px]">
                            @if ($item->image)
                                <img src="{{ asset('uploads/gallery/' . $item->image) }}"
                                     alt="Gallery Image"
                                     class="w-full h-auto object-cover transition duration-500 group-hover:scale-105">
                                <a href="{{ asset('uploads/gallery/' . $item->image) }}"
                                   data-fslightbox="gallery"
                                   class="absolute inset-0 flex items-center justify-center bg-etBlack/60 opacity-0 group-hover:opacity-100 transition">
                                    <i class="fa-plus fa-regular text-white text-2xl"></i>
                                </a>
                            @elseif ($videoId)
                                <iframe width="100%" height="200"
                                        src="https://www.youtube.com/embed/{{ $videoId }}"
                                        frameborder="0" allowfullscreen
                                        class="rounded-[20px]"></iframe>
                            @else
                                <div class="p-6 text-center bg-gray-100 text-gray-500">No Image or Video</div>
                            @endif

                            <p class="mt-3 text-center text-lg font-medium text-etBlue">{{ $item->title }}</p>
                        </div>
                    @empty
                        <p class="col-span-3 text-center text-gray-500">No gallery items found.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- GALLERY DETAILS SECTION END -->
    </main>
@endsection
