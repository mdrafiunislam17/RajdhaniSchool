@extends('front.layouts.app')

@section('title', 'Contact us ')

@section('content')
    <main>
        <!-- BREADCRUMB SECTION START -->
        {{-- <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
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
        </section> --}}


          <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
            <img src="{{ asset("uploads/" . $settings["SETTING_PAGE_BANNER"]) }}"
                alt="Breadcrumb Background"
                class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

            <div class="relative z-10 mx-[19.71%]">
                <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">Complaints </h1>
                <ul class="flex items-center justify-center gap-[10px] text-white">
                    <li><a href="{{route('front.index')}}" class="text-green">Home</a></li>
                    <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                    <li>Complaints </li>
                </ul>
            </div>

            <div class="vectors">
                <img src="{{asset('assets/img/breadcrumb-vector-1.svg')}}" alt="vector" class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
                <img src="{{asset('assets/img/breadcrumb-vector-2.svg')}}" alt="vector" class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
            </div>
        </section>
        <!-- BREADCRUMB SECTION END -->

      <section class="py-[120px] xl:py-[80px] md:py-[60px]">
            <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                <div class="grid grid-cols-2 md:grid-cols-1 gap-[60px] xl:gap-[40px] items-center">
                    <!-- left side contact infos -->
                    <div class="rounded-[16px] overflow-hidden">
                        <div class="bg-edpurple p-[40px] sm:p-[30px] xxs:p-[20px] space-y-[24px] text-[16px]">
                            <!-- single contact info -->
                            <div class="flex flex-wrap xxs:flex-col items-center xxs:items-start gap-[20px] gap-y-[10px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="{{asset('assets/img/icon/call-msg.svg')}}" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-normal">Call Us 7/24</span>
                                    <h4 class="{{asset('font-medium text-[24px] xxs:text-[22px]')}}"><a href="#">{!! $settings["CONTACT_PHONE"] !!}</a></h4>
                                </div>
                            </div>

                            <!-- single contact info -->
                            <div class="flex flex-wrap xxs:flex-col items-center xxs:items-start gap-[20px] gap-y-[10px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="{{asset('assets/img/icon/mail-at.svg')}}" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-normal">Make a Eamil</span>
                                    <h4 class="font-medium text-[24px] xxs:text-[22px]"><a href="#">{!! $settings["CONTACT_EMAIL"] !!}</a></h4>
                                </div>
                            </div>

                            <!-- single contact info -->
                            <div class="flex flex-wrap xxs:flex-col items-center xxs:items-start gap-[20px] gap-y-[10px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="{{asset('assets/img/icon/location-dot-circle.svg')}}" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-normal">Location</span>
                                    <h4 class="font-medium text-[24px] xxs:text-[22px]">{!! $settings["CONTACT_ADDRESS"] !!}</h4>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- right side contact form -->
                    <div>
                        <h2 class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-semibold text-edblue mb-[7px]">Ready to Get Started complaints?</h2>
                        {{-- <p class="text-edgray font-normal text-[16px] mb-[38px]">
                            Nullam varius, erat quis iaculis dictum, eros urna varius
                            eros, ut blandit felis odio in turpis. Quisque rhoncus, eros
                            in auctor ultrices,</p> --}}

                        <form action="{{ route("contact.store") }}" method="post" enctype="multipart/form-data" class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]">

                             @csrf
                              <div>
                                <label for="ed-contact-name" class="font-lato font-semibold text-edblue block mb-[12px]">Your Name*</label>
                                <input type="text" name="name" id="ed-contact-name" placeholder="Your Name" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            </div>
                            <div>
                                <label for="ed-contact-email" class="font-lato font-semibold text-edblue block mb-[12px]">Your Email*</label>
                                <input type="email" name="email" id="ed-contact-email" placeholder="Your Email" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            </div>
                            <div class="col-span-2 xxs:col-span-1">
                                <label for="ed-contact-message" class="font-lato font-semibold text-edblue block mb-[12px]">Your Complaints*</label>
                                <textarea name="message" id="ed-contact-message" placeholder="Your Complaints" class="border border-[#ECECEC] h-[145px] p-[20px] rounded-[4px] w-full focus:outline-none"></textarea>
                            </div>

                             <div>

                                <input type="hidden" name="status" id="status" value="1" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <div>
                                <button type="submit" class="bg-edpurple h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-edblue">Send Complaints <span class="icon pl-[10px]"><i class="fa-solid fa-arrow-right-long"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection
