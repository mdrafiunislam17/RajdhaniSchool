@extends('front.layouts.app')

@section('title', 'Event ')

@section('content')
    <main>
        <!-- BREADCRUMB SECTION START -->
        <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
            <img src="{{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }}"
                 alt="Breadcrumb Background"
                 class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

            <div class="relative z-10 mx-[19.71%]">
                <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">Event </h1>
                <ul class="flex items-center justify-center gap-[10px] text-white">
                    <li><a href="{{ route('front.index') }}" class="text-edyellow">Home</a></li>
                    <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                    <li>Event </li>
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

        <div class="py-[120px] xl:py-[80px] md:py-[60px]">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <!-- event cards -->
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
                            <div class="bg-edyellow rounded-[10px] font-medium text-[16px] text-black inline-block uppercase overflow-hidden text-center shrink-0">
                                <span class="bg-edpurple text-white text-[20px] block py-[7px] px-[30px] rounded-[10px]">
                                    {{ $eventDate->format('Y') }}
                                </span>
                                <span class="px-[15px] p-[10px] block leading-[1.44] font-semibold">
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
    </main>
@endsection
