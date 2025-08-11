
@extends('front.layouts.app')

@section('title', 'About Us')

@section('content')

 <main>
        <!-- BREADCRUMB SECTION START -->
        <section class="pt-[327px] xl:pt-[287px] lg:pt-[237px] sm:pt-[200px] xxs:pt-[180px] pb-[158px] xl:pb-[118px] lg:pb-[98px] sm:pb-[68px] xs:pb-[48px] text-center bg-[url('../assets/img/breadcrumb-bg.jpg')] bg-no-repeat bg-cover bg-center relative z-[1] overflow-hidden before:absolute before:-z-[1] before:inset-0 before:bg-edblue/70 before:pointer-events-none">
            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">About us</h1>
                <ul class="flex items-center justify-center gap-[10px] text-white">
                    <li><a href="index.html" class="text-edyellow">Home</a></li>
                    <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                    <li>About us</li>
                </ul>
            </div>

            <div class="vectors">
                <img src="assets/img/breadcrumb-vector-1.svg" alt="vector" class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
                <img src="assets/img/breadcrumb-vector-2.svg" alt="vector" class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
            </div>
        </section>
        <!-- BREADCRUMB SECTION END -->




        <!-- About SECTION START -->
        <section class="bg-[#FAF9F6] relative z-[1] overflow-hidden">
            <div class="flex lg:flex-col items-end gap-[130px] xxxl:gap-[100px] xxl:gap-[60px] lg:gap-y-0 ml-[19.5%] xxxl:ml-[14.71%] xxl:ml-[9.71%] xl:ml-[5.71%] lg:mx-[5.71%] md:mx-[12px]">
                <!-- left / text -->
                <div class="py-[120px] xl:py-[80px] md:py-[60px]">
                    <h6 class="text-green text-[18px] font-semibold uppercase tracking-wide mb-2">About us</h6>
                    <h2 class="text-green text-[28px] font-semibold uppercase tracking-wide mb-2">{{$about->title}}</h2>
                    <p class="text-edgray mb-[11px]">{!! $about->description !!}</p>


                </div>

                <!-- right / img / form -->
                <div class="relative shrink-0 xxxl:max-w-[55%] lg:max-w-full">
                    <img src="{{ asset('uploads/about/' . $about->image) }}" alt="image" style="margin-bottom: 300px">
                    {{-- <div class="absolute bottom-0 text-white p-[40px] xs:p-[20px] bg-white/5 backdrop-blur-[13.5914px] w-full shadow-[0_12px_16px_-4px_rgba(30,41,59,0.04),0_4px_6px_-2px_rgba(30,41,59,0.1)]">
                        <h4 class="font-semibold text-[30px] xs:text-[26px] xxs:text-[22px] mb-[12px]">Find A career that suits you</h4>

                        <form action="#">
                            <label for="career-interest" class="text-[15px] font-medium inline-block mb-[10px]">Choose a Career Interest</label>
                            <div class="flex xxs:flex-col gap-[15px]">
                                <input type="text" name="career-interest" id="career-interest" placeholder="Select career interest" class="bg-transparent border border-white rounded-[4px] p-[15px] w-full focus:outline-none placeholder:text-white/80">
                                <button type="submit" class="ed-btn !h-[56px] shrink-0 !rounded-[4px]">Continue</button>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>

            <!-- vector -->
            <img src="{{asset('assets/img/employability-vector.svg')}}" alt="vector" class="absolute -z-[1] bottom-[186px] left-[37px] pointer-events-none">
        </section>
        <!-- Avout SECTION END -->


    </main>
@endsection
