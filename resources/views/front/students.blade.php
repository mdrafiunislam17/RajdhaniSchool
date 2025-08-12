@extends('front.layouts.app')

@section('title', 'Students')

@section('content')
<main>
    <!-- Breadcrumb Section -->
    <section class="relative z-[1] overflow-hidden text-center pt-[327px] pb-[158px]">
        <img src="{{ asset('uploads/' . $settings['SETTING_PAGE_BANNER']) }}"
             alt="Breadcrumb Background"
             class="absolute inset-0 w-full h-full object-cover -z-[1] pointer-events-none">

        <div class="relative z-10 mx-[19.71%]">
            <h1 class="font-semibold text-[clamp(35px,6vw,56px)] text-white">Students</h1>
            <ul class="flex items-center justify-center gap-[10px] text-white">
                <li><a href="{{ route('front.index') }}" class="text-green">Home</a></li>
                <li><span class="text-[12px]"><i class="fa-solid fa-angle-double-right"></i></span></li>
                <li>Students</li>
            </ul>
        </div>

        <div class="vectors">
            <img src="{{ asset('assets/img/breadcrumb-vector-1.svg') }}"
                 alt="vector"
                 class="absolute -z-[1] pointer-events-none bottom-[34px] left-0 xl:left-auto xl:right-[90%]">
            <img src="{{ asset('assets/img/breadcrumb-vector-2.svg') }}"
                 alt="vector"
                 class="absolute -z-[1] pointer-events-none bottom-0 right-0 xl:right-auto xl:left-[60%]">
        </div>
    </section>
    <!-- End Breadcrumb -->

<section class="relative z-[1] overflow-hidden text-center " style="padding-top:50px">


    <form action="{{ route('students') }}" method="GET" enctype="multipart/form-data"
            class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]">


            <!-- Class -->
            <div>
                <label for="class" class="font-lato font-semibold text-edblue block mb-[12px]">
                    Class Name<span class="text-red-500">*</span>
                </label>
                    <select name="class" id="class"  required aria-required="true" aria-label="Select Class">
                <option value="" disabled {{ request('class') ? '' : 'selected' }}>-- Select Class --</option>
                @foreach(['One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten'] as $class)
                    <option value="{{ $class }}" {{ request('class') == $class ? 'selected' : '' }}>
                        Class {{ $class }}
                    </option>
                @endforeach
            </select>
            </div>

                <div>
                <label for="Section" class="font-lato font-semibold text-edblue block mb-[12px]">
                    Section<span class="text-red-500">*</span>
                </label>
                    <select name="Section" id="section"  required aria-required="true" aria-label="Select Section">
                    <option value="" disabled {{ request('section') ? '' : 'selected' }}>-- Select Section --</option>
                    <option value="N/A" {{ request('section') == 'N/A' ? 'selected' : '' }}>N/A</option>
                    <option value="A" {{ request('section') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ request('section') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ request('section') == 'C' ? 'selected' : '' }}>C</option>
                </select>
            </div>


            <!-- Submit Button -->
            <div class="col-span-2">
                <button type="submit"
                        class="bg-edpurple h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-edblue">
                    Submit Admission
                </button>
            </div>
        </form>
</section>



    <!-- Student Table -->
    <div class="card-body px-3" style="padding-bottom: 20px">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#SL</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Contact</th>
                        <th>Student Photo</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($student as $i => $item)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($item->student_photo)
                                        <img src="{{ asset($item->student_photo) }}"
                                             alt="Student Photo"
                                             width="30" height="30"
                                             class="rounded-circle me-2 border border-gray-300">
                                    @endif
                                    <span>{{ $item->first_name }} {{ $item->last_name }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-primary">{{ $item->class ?? 'N/A' }}</span>
                            </td>
                            <td>
                                {{ $item->student_phone ?? 'N/A' }}<br>
                                @if($item->student_email)
                                    <small>{{ $item->student_email }}</small>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->student_photo)
                                    <img src="{{ asset($item->student_photo) }}"
                                         alt="Student Photo"
                                         width="80"
                                         class="img-thumbnail preview-image"
                                         data-toggle="modal"
                                         data-target="#imageModal"
                                         data-image="{{ asset($item->student_photo) }}"
                                         data-title="{{ $item->first_name }} {{ $item->last_name }}">
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No admission records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</main>


@endsection

@push('styles')
<style>

</style>
@endpush
