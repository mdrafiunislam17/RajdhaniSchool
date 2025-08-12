@extends('front.layouts.app')

@section('title', 'Admission Online ')

@section('content')
    <main>



          <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
            <img src="{{ asset("uploads/" . $settings["SETTING_PAGE_BANNER"]) }}"
                alt="Breadcrumb Background"
                class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none" />

            <div class="relative z-10 mx-[19.71%]">
                <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">Admission Online </h1>
                <ul class="flex items-center justify-center gap-[10px] text-white">
                    <li><a href="{{route('front.index')}}" class="text-green">Home</a></li>
                    <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                    <li>Admission Online </li>
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
                                    <h4 class="{{asset('font-medium text-[24px] xxs:text-[22px]')}}"><a href="tel:{{ $settings["CONTACT_PHONE"] }}">{{ $settings["CONTACT_PHONE"] }}</a></h4>
                                </div>
                            </div>

                            <!-- single contact info -->
                            <div class="flex flex-wrap xxs:flex-col items-center xxs:items-start gap-[20px] gap-y-[10px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="{{asset('assets/img/icon/mail-at.svg')}}" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-normal">Make a Eamil</span>
                                    <h4 class="font-medium text-[24px] xxs:text-[22px]"><a href="mailto:{{ $settings["CONTACT_EMAIL"] }}">{!! $settings["CONTACT_EMAIL"] !!}</a></h4>
                                </div>
                            </div>

                            <!-- single contact info -->
                            <div class="flex flex-wrap xxs:flex-col items-center xxs:items-start gap-[20px] gap-y-[10px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="{{asset('assets/img/icon/location-dot-circle.svg')}}" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-normal">Location</span>
                                    <h4 class="font-medium text-[24px] xxs:text-[22px]">{{ $settings["CONTACT_ADDRESS"] }}</h4>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- right side contact form -->
                    <div>
                        <h2 class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-semibold text-edblue mb-[7px]">Ready to Get Started Admission Online?</h2>
                        {{-- <p class="text-edgray font-normal text-[16px] mb-[38px]">
                            Nullam varius, erat quis iaculis dictum, eros urna varius
                            eros, ut blandit felis odio in turpis. Quisque rhoncus, eros
                            in auctor ultrices,</p> --}}

                      <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data"
                            class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]">
                            @csrf

                            <!-- Class -->
                            <div>
                                <label for="class_id" class="font-lato font-semibold text-edblue block mb-[12px]">
                                    Class <span class="text-red-500">*</span>
                                </label>
                                <select name="class_id" id="class_id"
                                        class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none"
                                        required>
                                    <option value="">Select Class</option>
                                    @foreach ($class as $cls)
                                        <option value="{{ $cls->id }}" {{ old('class_id') == $cls->id ? 'selected' : '' }}>
                                            {{ $cls->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="font-lato font-semibold text-edblue block mb-[12px]">First Name</label>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="font-lato font-semibold text-edblue block mb-[12px]">Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender" class="font-lato font-semibold text-edblue block mb-[12px]">
                                    Gender <span class="text-red-500">*</span>
                                </label>
                                <select name="gender" id="gender"
                                        class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none"
                                        required>
                                    <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <!-- Shift -->
                            <div>
                                <label for="shift" class="font-lato font-semibold text-edblue block mb-[12px]">
                                    Shift <span class="text-red-500">*</span>
                                </label>
                                <select name="shift" id="shift"
                                        class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none"
                                        required>
                                    <option value="" disabled {{ old('shift') ? '' : 'selected' }}>Select Shift</option>
                                    <option value="morning" {{ old('shift') == 'morning' ? 'selected' : '' }}>Morning</option>
                                    <option value="day" {{ old('shift') == 'day' ? 'selected' : '' }}>Day</option>
                                </select>
                            </div>

                            <!-- Admission Date -->
                            <div>
                                <label for="admission_date" class="font-lato font-semibold text-edblue block mb-[12px]">Admission Date</label>
                                <input type="date" name="admission_date" id="admission_date" value="{{ old('admission_date') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Birthday -->
                            <div>
                                <label for="birthday" class="font-lato font-semibold text-edblue block mb-[12px]">Birthday</label>
                                <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Blood Group -->
                            <div>
                                <label for="blood_group" class="font-lato font-semibold text-edblue block mb-[12px]">Blood Group</label>
                                <select name="blood_group" id="blood_group"
                                        class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                                    <option value="" disabled {{ old('blood_group') ? '' : 'selected' }}>Select Blood Group</option>
                                    @foreach (['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
                                        <option value="{{ $bg }}" {{ old('blood_group') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Student Phone -->
                            <div>
                                <label for="student_phone" class="font-lato font-semibold text-edblue block mb-[12px]">Student Phone</label>
                                <input type="text" name="student_phone" id="student_phone" value="{{ old('student_phone') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Student Email -->
                            <div>
                                <label for="student_email" class="font-lato font-semibold text-edblue block mb-[12px]">Student Email</label>
                                <input type="email" name="student_email" id="student_email" value="{{ old('student_email') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Religion -->
                            <div>
                                <label for="religion" class="font-lato font-semibold text-edblue block mb-[12px]">Religion</label>
                                <input type="text" name="religion" id="religion" value="{{ old('religion') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Present Address -->
                            <div class="col-span-2 xxs:col-span-1">
                                <label for="present_address" class="font-lato font-semibold text-edblue block mb-[12px]">Present Address</label>
                                <textarea name="present_address" id="present_address"
                                        class="border border-[#ECECEC] h-[100px] p-[20px] rounded-[4px] w-full focus:outline-none">{{ old('present_address') }}</textarea>
                            </div>

                            <!-- Permanent Address -->
                            <div class="col-span-2 xxs:col-span-1">
                                <label for="permanent_address" class="font-lato font-semibold text-edblue block mb-[12px]">Permanent Address</label>
                                <textarea name="permanent_address" id="permanent_address"
                                        class="border border-[#ECECEC] h-[100px] p-[20px] rounded-[4px] w-full focus:outline-none">{{ old('permanent_address') }}</textarea>
                            </div>

                            <!-- City -->
                            <div>
                                <label for="city" class="font-lato font-semibold text-edblue block mb-[12px]">City</label>
                                <input type="text" name="city" id="city" value="{{ old('city') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- State -->
                            <div>
                                <label for="state" class="font-lato font-semibold text-edblue block mb-[12px]">State</label>
                                <input type="text" name="state" id="state" value="{{ old('state') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- School Name -->
                            <div>
                                <label for="school_name" class="font-lato font-semibold text-edblue block mb-[12px]">School Name</label>
                                <input type="text" name="school_name" id="school_name" value="{{ old('school_name') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Guardian Name -->
                            <div>
                                <label for="guardian_name" class="font-lato font-semibold text-edblue block mb-[12px]">Guardian Name</label>
                                <input type="text" name="guardian_name" id="guardian_name" value="{{ old('guardian_name') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Guardian Phone -->
                            <div>
                                <label for="guardian_phone" class="font-lato font-semibold text-edblue block mb-[12px]">Guardian Phone</label>
                                <input type="text" name="guardian_phone" id="guardian_phone" value="{{ old('guardian_phone') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none">
                            </div>

                            <!-- Student Photo -->
                            <div>
                                <label for="student_photo" class="font-lato font-semibold text-edblue block mb-[12px]">Student Photo</label>
                                <input type="file" name="student_photo" id="student_photo"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none file:py-2 file:px-4 file:rounded file:border-0 file:bg-edblue file:text-white file:cursor-pointer">
                            </div>

                            <!-- Guardian Photo -->
                            <div>
                                <label for="guardian_photo" class="font-lato font-semibold text-edblue block mb-[12px]">Guardian Photo</label>
                                <input type="file" name="guardian_photo" id="guardian_photo"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] rounded-[4px] w-full focus:outline-none file:py-2 file:px-4 file:rounded file:border-0 file:bg-edblue file:text-white file:cursor-pointer">
                            </div>

                            <!-- Submit Button -->
                            <div class="col-span-2">
                                <button type="submit"
                                        class="bg-edpurple h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-edblue">
                                    Submit Admission
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection
