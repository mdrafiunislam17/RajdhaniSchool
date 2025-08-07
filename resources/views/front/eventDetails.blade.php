@extends('front.layouts.app')

@section('title', $event->event_name ?? 'Event Details')

@section('content')
    <main>
        <!-- BREADCRUMB SECTION START -->
        <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
            <img src="{{ asset('uploads/' . ($settings['SETTING_PAGE_BANNER'] ?? 'default-banner.jpg')) }}"
                 alt="Event Banner"
                 class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none"
                 loading="lazy">

            <div class="relative z-10 mx-[19.71%]">
                <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">{{ $event->event_name ?? 'Event Details' }}</h1>
                <ul class="flex items-center justify-center gap-[10px] text-white">
                    <li><a href="{{ route('front.index') }}" class="text-edyellow hover:underline">Home</a></li>
                    <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                    <li>{{ $event->event_name ?? 'Event' }}</li>
                </ul>
            </div>

            <div class="vectors">
                <img src="{{ asset('assets/img/breadcrumb-vector-1.svg') }}" alt="vector"
                     class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]"
                     loading="lazy">
                <img src="{{ asset('assets/img/breadcrumb-vector-2.svg') }}" alt="vector"
                     class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]"
                     loading="lazy">
            </div>
        </section>
        <!-- BREADCRUMB SECTION END -->

        <div class="et-event-details-content py-[130px] lg:py-[80px] md:py-[60px]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="flex gap-[30px] lg:gap-[20px] md:flex-col md:items-center">
                    <!-- left content -->
                    <div class="left max-w-full">
                        @if($event)
                            <!-- Event Image -->
                            <div class="relative rounded-[8px] overflow-hidden mb-[30px]">
                                @if($event->image)
                                    <img src="{{ asset("uploads/event/$event->image") }}"
                                         alt="{{ $event->event_name }}"
                                         class="w-full h-auto max-h-[500px] object-cover rounded-[8px]"
                                         loading="lazy">
                                @else
                                    <img src="{{ asset('assets/img/event-default.jpg') }}"
                                         alt="Default Event Image"
                                         class="w-full h-auto max-h-[500px] object-cover rounded-[8px]"
                                         loading="lazy">
                                @endif
                            </div>

                            <!-- Event Details -->
                            <div>
                                <!-- Event Info Badges -->
                                <div class="flex flex-wrap gap-[16px] mb-[20px]">
                                    <div class="inline-flex items-center gap-[8px] rounded-[6px] px-[12px] py-[8px] font-semibold bg-edpurple text-white">
                                        <i class="fa-regular fa-calendar"></i>
                                        <span>{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('F j, Y') : 'TBA' }}</span>
                                    </div>
                                    <div class="inline-flex items-center gap-[8px] rounded-[6px] px-[12px] py-[8px] font-semibold border border-edpurple text-edpurple">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>
                                            @if($event->start_time && $event->end_time)
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }} -
                                                {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                                            @else
                                                Time TBA
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <h4 class="text-[30px] xs:text-[25px] xxs:text-[22px] font-semibold text-edblue mb-[15px]">
                                    {{ $event->event_name }}
                                </h4>

                                <div class="prose max-w-none">
                                    {!! $event->description ?? '<p class="text-gray-500">No description available.</p>' !!}
                                </div>

                                @if($event->gallery)
                                    <h4 class="text-[30px] xs:text-[25px] xxs:text-[22px] font-semibold text-edblue mb-[15px] mt-[30px]">
                                        Event Gallery
                                    </h4>

                                    <div class="grid grid-cols-2 gap-[20px] mt-[20px] mb-[30px]">
                                        @foreach(json_decode($event->gallery) as $image)
                                            <a href="{{ asset('uploads/gallery/' . $image) }}"
                                               data-fslightbox="event-gallery"
                                               class="block overflow-hidden rounded-[8px] hover:shadow-lg transition-shadow">
                                                <img src="{{ asset('uploads/gallery/' . $image) }}"
                                                     alt="Event gallery image"
                                                     class="w-full h-[200px] object-cover hover:scale-105 transition-transform"
                                                     loading="lazy">
                                            </a>
                                        @endforeach
                                    </div>
                                @endif


                            </div>
                        @else
                            <div class="text-center py-[50px]">
                                <h3 class="text-[24px] font-semibold text-edblue mb-[20px]">Event Not Found</h3>
                                <p class="text-gray-500 mb-[30px]">The event you're looking for doesn't exist or has been removed.</p>
                                <a href="{{ route('front.index') }}" class="inline-block bg-edpurple text-white px-[24px] py-[12px] rounded-[8px] hover:bg-edblue transition-colors">
                                    Return to Home
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- right sidebar -->
                    @if($event)
                        <div class="right max-w-full w-[370px] lg:w-[360px] shrink-0 space-y-[30px]">
                            <!-- EVENT INFORMATION -->
                            <div class="border border-[#e5e5e5] rounded-[10px] px-[30px] xxs:px-[15px] py-[35px] xxs:py-[25px]">
                                <h5 class="font-semibold text-[24px] text-edblue mb-[20px]">Event Information:</h5>

                                <ul class="mb-[30px] space-y-[15px]">
                                    <li class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5]">
                                    <span class="flex items-center gap-[5px] font-semibold text-edblue">
                                        <i class="fa-regular fa-calendar text-[18px]"></i>
                                        <span>Start Date:</span>
                                    </span>
                                        <span class="text-[15px] text-edgray">
                                        {{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('F j, Y') : 'TBA' }}
                                    </span>
                                    </li>

                                    <li class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5]">
                                    <span class="flex items-center gap-[5px] font-semibold text-edblue">
                                        <i class="fa-regular fa-clock text-[18px]"></i>
                                        <span>Duration:</span>
                                    </span>
                                        <span class="text-[15px] text-edgray">
                                        @if($event->start_time && $event->end_time)
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }} -
                                                {{ \Carbon\Carbon::parse($event->end_time)->format('g:i A') }}
                                            @else
                                                Time TBA
                                            @endif
                                    </span>
                                    </li>

                                    <li class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5]">
                                    <span class="flex items-center gap-[5px] font-semibold text-edblue">
                                        <i class="fa-solid fa-location-dot text-[18px]"></i>
                                        <span>Location:</span>
                                    </span>
                                        <span class="text-[15px] text-edgray">
                                        {{ $event->location ?? 'Location not specified' }}
                                    </span>
                                    </li>

                                    <li class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5]">
                                    <span class="flex items-center gap-[5px] font-semibold text-edblue">
                                        <i class="fa-solid fa-phone text-[18px]"></i>
                                        <span>Phone:</span>
                                    </span>
                                        <span class="text-[15px] text-edgray">
                                        {{ $event->phone ?? 'Not provided' }}
                                    </span>
                                    </li>

                                    <li class="py-[15px] flex flex-wrap gap-[10px] items-center justify-between border-t border-[#e5e5e5]">
                                    <span class="flex items-center gap-[5px] font-semibold text-edblue">
                                        <i class="fa-regular fa-envelope text-[18px]"></i>
                                        <span>Email:</span>
                                    </span>
                                        <span class="text-[15px] text-edgray">
                                        {{ $event->email ?? 'Not provided' }}
                                    </span>
                                    </li>
                                </ul>



                                <!-- social links -->
                             <div class="flex gap-[15px] items-center justify-center mt-[22px]">
                                    <h6 class="font-semibold text-[16px] text-black">Share:</h6>
                                    <div class="flex gap-[15px] text-[16px]">
                                        @if (!empty($settings['SETTING_SOCIAL_FACEBOOK']))
                                            <a href="{{ $settings['SETTING_SOCIAL_FACEBOOK'] }}" target="_blank" class="text-[#757277] hover:text-edpurple transition-colors">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        @endif

                                        @if (!empty($settings['SETTING_SOCIAL_TWITTER']))
                                            <a href="{{ $settings['SETTING_SOCIAL_TWITTER'] }}" target="_blank" class="text-[#757277] hover:text-edpurple transition-colors">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        @endif

                                        @if (!empty($settings['SETTING_SOCIAL_LINKEDIN']))
                                            <a href="{{ $settings['SETTING_SOCIAL_LINKEDIN'] }}" target="_blank" class="text-[#757277] hover:text-edpurple transition-colors">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                        @endif

                                        @if (!empty($settings['SETTING_SOCIAL_INSTAGRAM']))
                                            <a href="{{ $settings['SETTING_SOCIAL_INSTAGRAM'] }}" target="_blank" class="text-[#757277] hover:text-edpurple transition-colors">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <!-- location map -->
                            @if($event->location_map)
                                <iframe src="{{ $event->location_map }}"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                        class="w-full h-[280px] rounded-[5px] border-0"></iframe>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <style>
        .prose ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }
        .prose ol {
            list-style-type: decimal;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }
        .prose p {
            margin-bottom: 1rem;
            color: #555;
            line-height: 1.6;
        }
        .prose img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1rem 0;
        }
    </style>
@endpush
