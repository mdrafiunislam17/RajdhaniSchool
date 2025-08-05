@extends('admin.layouts.master')

@section('title', 'Create Admission')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Create Admission</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="class_id">Class <span class="text-danger">*</span></label>
                <select name="class_id" id="class_id" class="form-control" required>
                    <option value="">Select Class</option>
                    @foreach ($class as $cls)
                        <option value="{{ $cls->id }}" {{ old('class_id') == $cls->id ? 'selected' : '' }}>
                            {{ $cls->name }}  {{-- or whatever column has class name --}}
                        </option>
                    @endforeach
                </select>
                @error('class_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
            </div>

            <div class="form-group">
                <label for="gender">Gender <span class="text-danger">*</span></label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="shift">Shift <span class="text-danger">*</span></label>
                <select name="shift" id="shift" class="form-control" required>
                    <option value="" disabled {{ old('shift') ? '' : 'selected' }}>Select Shift</option>
                    <option value="morning" {{ old('shift') == 'morning' ? 'selected' : '' }}>Morning</option>
                    <option value="day" {{ old('shift') == 'day' ? 'selected' : '' }}>Day</option>
                </select>
            </div>

            <div class="form-group">
                <label for="admission_date">Admission Date</label>
                <input type="date" name="admission_date" id="admission_date" class="form-control" value="{{ old('admission_date') }}">
            </div>

            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday') }}">
            </div>

            <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <select name="blood_group" id="blood_group" class="form-control">
                    <option value="" disabled {{ old('blood_group') ? '' : 'selected' }}>Select Blood Group</option>
                    <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                    <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                </select>
            </div>

            <div class="form-group">
                <label for="student_phone">Student Phone</label>
                <input type="text" name="student_phone" id="student_phone" class="form-control" value="{{ old('student_phone') }}">
            </div>

            <div class="form-group">
                <label for="student_email">Student Email</label>
                <input type="email" name="student_email" id="student_email" class="form-control" value="{{ old('student_email') }}">
            </div>

            <div class="form-group">
                <label for="religion">Religion</label>
                <input type="text" name="religion" id="religion" class="form-control" value="{{ old('religion') }}">
            </div>

            <div class="form-group">
                <label for="present_address">Present Address</label>
                <textarea name="present_address" id="present_address" class="form-control">{{ old('present_address') }}</textarea>
            </div>

            <div class="form-group">
                <label for="permanent_address">Permanent Address</label>
                <textarea name="permanent_address" id="permanent_address" class="form-control">{{ old('permanent_address') }}</textarea>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
            </div>

            <div class="form-group">
                <label for="state">State</label>
                <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}">
            </div>

            <div class="form-group">
                <label for="school_name">School Name</label>
                <input type="text" name="school_name" id="school_name" class="form-control" value="{{ old('school_name') }}">
            </div>

            <div class="form-group">
                <label for="guardian_name">Guardian Name</label>
                <input type="text" name="guardian_name" id="guardian_name" class="form-control" value="{{ old('guardian_name') }}">
            </div>

            <div class="form-group">
                <label for="guardian_phone">Guardian Phone</label>
                <input type="text" name="guardian_phone" id="guardian_phone" class="form-control" value="{{ old('guardian_phone') }}">
            </div>

            <div class="form-group">
                <label for="student_photo">Student Photo</label>
                <input type="file" name="student_photo" id="student_photo" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="guardian_photo">Guardian Photo</label>
                <input type="file" name="guardian_photo" id="guardian_photo" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Submit Admission</button>
        </form>

    </div>
@endsection
