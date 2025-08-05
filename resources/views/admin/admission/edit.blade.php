@extends('admin.layouts.master')

@section('title', 'Edit Admission')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Admission</h1>
            <a href="{{ route('admission.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to List
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admission.update', $admission->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Personal Information Column -->
                        <div class="col-md-6">
                            <div class="form-section mb-4">
                                <h5 class="section-title"><i class="fas fa-user-circle mr-2"></i>Personal Information</h5>

                                <div class="form-group">
                                    <label for="class_id">Class <span class="text-danger">*</span></label>
                                    <select name="class_id" id="class_id" class="form-control" required>
                                        <option value="">Select Class</option>
                                        @foreach ($class as $cls)
                                            <option value="{{ $cls->id }}" {{ (old('class_id', $admission->class_id) == $cls->id) ? 'selected' : '' }}>
                                                {{ $cls->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name <span class="text-danger">*</span></label>
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                   value="{{ old('first_name', $admission->first_name) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                   value="{{ old('last_name', $admission->last_name) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender <span class="text-danger">*</span></label>
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ old('gender', $admission->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender', $admission->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                                <option value="other" {{ old('gender', $admission->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="birthday">Birthday</label>
                                            <input type="date" name="birthday" id="birthday" class="form-control"
                                                   value="{{ old('birthday', $admission->birthday) }}" max="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blood_group">Blood Group</label>
                                            <select name="blood_group" id="blood_group" class="form-control">
                                                <option value="">Select Blood Group</option>
                                                @php
                                                    $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
                                                @endphp
                                                @foreach ($bloodGroups as $bg)
                                                    <option value="{{ $bg }}" {{ old('blood_group', $admission->blood_group) == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="religion">Religion</label>
                                            <input type="text" name="religion" id="religion" class="form-control"
                                                   value="{{ old('religion', $admission->religion) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section mb-4">
                                <h5 class="section-title"><i class="fas fa-phone-alt mr-2"></i>Contact Information</h5>

                                <div class="form-group">
                                    <label for="student_phone">Student Phone <span class="text-danger">*</span></label>
                                    <input type="tel" name="student_phone" id="student_phone" class="form-control"
                                           value="{{ old('student_phone', $admission->student_phone) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="student_email">Student Email</label>
                                    <input type="email" name="student_email" id="student_email" class="form-control"
                                           value="{{ old('student_email', $admission->student_email) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Academic & Address Information Column -->
                        <div class="col-md-6">
                            <div class="form-section mb-4">
                                <h5 class="section-title"><i class="fas fa-graduation-cap mr-2"></i>Academic Information</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shift">Shift <span class="text-danger">*</span></label>
                                            <select name="shift" id="shift" class="form-control" required>
                                                <option value="">Select Shift</option>
                                                <option value="morning" {{ old('shift', $admission->shift) == 'morning' ? 'selected' : '' }}>Morning</option>
                                                <option value="day" {{ old('shift', $admission->shift) == 'day' ? 'selected' : '' }}>Day</option>
                                                <option value="evening" {{ old('shift', $admission->shift) == 'evening' ? 'selected' : '' }}>Evening</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="admission_date">Admission Date <span class="text-danger">*</span></label>
                                            <input type="date" name="admission_date" id="admission_date" class="form-control"
                                                   value="{{ old('admission_date', $admission->admission_date) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="school_name">Previous School</label>
                                    <input type="text" name="school_name" id="school_name" class="form-control"
                                           value="{{ old('school_name', $admission->school_name) }}">
                                </div>
                            </div>

                            <div class="form-section mb-4">
                                <h5 class="section-title"><i class="fas fa-map-marker-alt mr-2"></i>Address Information</h5>

                                <div class="form-group">
                                    <label for="present_address">Present Address</label>
                                    <textarea name="present_address" id="present_address" class="form-control" rows="3">{{ old('present_address', $admission->present_address) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <textarea name="permanent_address" id="permanent_address" class="form-control" rows="3">{{ old('permanent_address', $admission->permanent_address) }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" name="city" id="city" class="form-control"
                                                   value="{{ old('city', $admission->city) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" name="state" id="state" class="form-control"
                                                   value="{{ old('state', $admission->state) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section mb-4">
                                <h5 class="section-title"><i class="fas fa-user-shield mr-2"></i>Guardian Information</h5>

                                <div class="form-group">
                                    <label for="guardian_name">Guardian Name <span class="text-danger">*</span></label>
                                    <input type="text" name="guardian_name" id="guardian_name" class="form-control"
                                           value="{{ old('guardian_name', $admission->guardian_name) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="guardian_phone">Guardian Phone <span class="text-danger">*</span></label>
                                    <input type="tel" name="guardian_phone" id="guardian_phone" class="form-control"
                                           value="{{ old('guardian_phone', $admission->guardian_phone) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Photo Upload Section -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-section">
                                <h5 class="section-title"><i class="fas fa-camera mr-2"></i>Student Photo</h5>
                                <div class="form-group">
                                    @if($admission->student_photo)
                                        <div class="mb-3">
                                            <img src="{{ asset('uploads/student_photo/' . $admission->student_photo) }}"
                                                 alt="Current Student Photo"
                                                 class="img-thumbnail"
                                                 width="150">
                                            <div class="form-check mt-2">
                                                <input type="checkbox" name="remove_student_photo" id="remove_student_photo" class="form-check-input">
                                                <label for="remove_student_photo" class="form-check-label text-danger">Remove current photo</label>
                                            </div>
                                        </div>
                                    @endif
                                    <input type="file" name="student_photo" id="student_photo" class="form-control-file">
                                    <small class="form-text text-muted">Max file size: 2MB | Recommended: 300x300 pixels</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-section">
                                <h5 class="section-title"><i class="fas fa-camera mr-2"></i>Guardian Photo</h5>
                                <div class="form-group">
                                    @if($admission->guardian_photo)
                                        <div class="mb-3">
                                            <img src="{{ asset('uploads/guardian_photo/' . $admission->guardian_photo) }}"
                                                 alt="Current Guardian Photo"
                                                 class="img-thumbnail"
                                                 width="150">
                                            <div class="form-check mt-2">
                                                <input type="checkbox" name="remove_guardian_photo" id="remove_guardian_photo" class="form-check-input">
                                                <label for="remove_guardian_photo" class="form-check-label text-danger">Remove current photo</label>
                                            </div>
                                        </div>
                                    @endif
                                    <input type="file" name="guardian_photo" id="guardian_photo" class="form-control-file">
                                    <small class="form-text text-muted">Max file size: 2MB | Recommended: 300x300 pixels</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save mr-2"></i> Update Admission
                        </button>
                        <a href="{{ route('admission.index') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-times mr-2"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Phone number validation
            $('#student_phone, #guardian_phone').on('input', function() {
                this.value = this.value.replace(/[^0-9+]/g, '');
            });

            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>
@endsection

@section('styles')
    <style>
        .section-title {
            color: #4e73df;
            font-size: 1.1rem;
            border-bottom: 1px solid #e3e6f0;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .form-section {
            background-color: #f8f9fc;
            padding: 1.5rem;
            border-radius: 0.35rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid #4e73df;
        }
        .img-thumbnail {
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
        }
    </style>
@endsection
