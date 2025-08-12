@extends('admin.layouts.master')

@section('title', 'Edit Student')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary text-white">
                <h1 class="h4 mb-0 font-weight-bold"><i class="fas fa-user-edit"></i> Edit Student</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Please fix these errors:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data" id="studentForm">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="section-header mb-4">
                        <h5><i class="fas fa-user-graduate"></i> Basic Information</h5>
                        <hr class="border-primary">
                    </div>

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="class">Class Name <span class="text-danger">*</span></label>
                                <select name="class" id="class" class="form-control selectpicker">
                                    <option value="">-- Select Class --</option>
                                    @foreach(['One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten'] as $class)
                                        <option value="{{ $class }}" {{ old('class', $student->class) == $class ? 'selected' : '' }}>
                                            Class {{ $class }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="section">Section <span class="text-danger">*</span></label>
                                <select name="section" id="section" class="form-control selectpicker">
                                    <option value="">-- Select Section --</option>
                                    <option value="N/A" {{ old('section', $student->section) == 'N/A' ? 'selected' : '' }}>N/A</option>
                                    <option value="A" {{ old('section', $student->section) == 'A' ? 'selected' : '' }}> A</option>
                                    <option value="B" {{ old('section', $student->section) == 'B' ? 'selected' : '' }}> B</option>
                                    <option value="C" {{ old('section', $student->section) == 'C' ? 'selected' : '' }}> C</option>
                                </select>
                            </div>

                            <div class="form-group" id="groupField">
                                <label for="student_group">Student Group/Stream <span class="text-danger">*</span></label>
                                <select name="student_group" id="student_group" class="form-control selectpicker">
                                    <option value="">-- Select Group --</option>
                                    <option value="N/A" {{ old('student_group', $student->student_group) == 'N/A' ? 'selected' : '' }}>N/A</option>
                                    <option value="science" {{ old('student_group', $student->student_group) == 'science' ? 'selected' : '' }}>Science</option>
                                    <option value="arts" {{ old('student_group', $student->student_group) == 'arts' ? 'selected' : '' }}>Arts</option>
                                    <option value="business" {{ old('student_group', $student->student_group) == 'business' ? 'selected' : '' }}>Business Studies</option>
                                </select>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                       value="{{ old('first_name', $student->first_name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                       value="{{ old('last_name', $student->last_name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                <select name="gender" id="gender" class="form-control selectpicker" required>
                                    <option value="">-- Select Gender --</option>
                                    <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Details Section -->
                    <div class="section-header mb-4 mt-4">
                        <h5><i class="fas fa-book"></i> Academic Details</h5>
                        <hr class="border-primary">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shift">Shift <span class="text-danger">*</span></label>
                                <select name="shift" id="shift" class="form-control selectpicker" required>
                                    <option value="">-- Select Shift --</option>
                                    <option value="morning" {{ old('shift', $student->shift) == 'morning' ? 'selected' : '' }}>Morning</option>
                                    <option value="day" {{ old('shift', $student->shift) == 'day' ? 'selected' : '' }}>Day</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="admission_date">Admission Date <span class="text-danger">*</span></label>
                                <input type="date" name="admission_date" id="admission_date" class="form-control"
                                       value="{{ old('admission_date', $student->admission_date) }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthday">Birthday <span class="text-danger">*</span></label>
                                <input type="date" name="birthday" id="birthday" class="form-control"
                                       value="{{ old('birthday', $student->birthday) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group" id="blood_group" class="form-control selectpicker">
                                    <option value="">-- Select Blood Group --</option>
                                    <option value="A+" {{ old('blood_group', $student->blood_group) == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ old('blood_group', $student->blood_group) == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ old('blood_group', $student->blood_group) == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ old('blood_group', $student->blood_group) == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="O+" {{ old('blood_group', $student->blood_group) == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ old('blood_group', $student->blood_group) == 'O-' ? 'selected' : '' }}>O-</option>
                                    <option value="AB+" {{ old('blood_group', $student->blood_group) == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ old('blood_group', $student->blood_group) == 'AB-' ? 'selected' : '' }}>AB-</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="section-header mb-4 mt-4">
                        <h5><i class="fas fa-address-book"></i> Contact Information</h5>
                        <hr class="border-primary">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student_phone">Student Phone</label>
                                <input type="text" name="student_phone" id="student_phone" class="form-control"
                                       value="{{ old('student_phone', $student->student_phone) }}" placeholder="+8801XXXXXXXXX">
                            </div>

                            <div class="form-group">
                                <label for="student_email">Student Email</label>
                                <input type="email" name="student_email" id="student_email" class="form-control"
                                       value="{{ old('student_email', $student->student_email) }}" placeholder="student@example.com">
                            </div>

                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <input type="text" name="religion" id="religion" class="form-control"
                                       value="{{ old('religion', $student->religion) }}" placeholder="Islam/Christianity/Hinduism etc.">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="present_address">Present Address</label>
                                <textarea name="present_address" id="present_address" class="form-control"
                                          rows="3" placeholder="Current living address">{{ old('present_address', $student->present_address) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="permanent_address">Permanent Address</label>
                                <textarea name="permanent_address" id="permanent_address" class="form-control"
                                          rows="3" placeholder="Permanent home address">{{ old('permanent_address', $student->permanent_address) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Location Information Section -->
                    <div class="section-header mb-4 mt-4">
                        <h5><i class="fas fa-map-marker-alt"></i> Location Information</h5>
                        <hr class="border-primary">
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                <input type="text" name="school_name" id="school_name" class="form-control"
                                       value="{{ old('school_name', $student->school_name) }}" placeholder="School name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" class="form-control"
                                       value="{{ old('city', $student->city) }}" placeholder="City">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" class="form-control"
                                       value="{{ old('state', $student->state) }}" placeholder="State">
                            </div>
                        </div>
                    </div>

                    <!-- Guardian Information Section -->
                    <div class="section-header mb-4 mt-4">
                        <h5><i class="fas fa-user-shield"></i> Guardian Information</h5>
                        <hr class="border-primary">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guardian_name">Guardian Name</label>
                                <input type="text" name="guardian_name" id="guardian_name" class="form-control"
                                       value="{{ old('guardian_name', $student->guardian_name) }}" placeholder="Guardian's full name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guardian_phone">Guardian Phone</label>
                                <input type="text" name="guardian_phone" id="guardian_phone" class="form-control"
                                       value="{{ old('guardian_phone', $student->guardian_phone) }}" placeholder="+8801XXXXXXXXX">
                            </div>
                        </div>
                    </div>

                    <!-- Photo Uploads Section -->
                    <div class="section-header mb-4 mt-4">
                        <h5><i class="fas fa-images"></i> Photo Uploads</h5>
                        <hr class="border-primary">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student_photo">Student Photo</label>
                                <div class="custom-file">
                                    <input type="file" name="student_photo" id="student_photo" class="custom-file-input">
                                    <label class="custom-file-label" for="student_photo">Choose file...</label>
                                </div>
                                <small class="form-text text-muted">Max size: 2MB | Format: jpg, png, jpeg</small>
                                <div class="mt-2" id="studentPhotoPreview">
                                    @if($student->student_photo)
                                        <img src=" {{ asset($student->student_photo) }}" class="img-thumbnail" alt="Student Photo">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guardian_photo">Guardian Photo</label>
                                <div class="custom-file">
                                    <input type="file" name="guardian_photo" id="guardian_photo" class="custom-file-input">
                                    <label class="custom-file-label" for="guardian_photo">Choose file...</label>
                                </div>
                                <small class="form-text text-muted">Max size: 2MB | Format: jpg, png, jpeg</small>
                                <div class="mt-2" id="guardianPhotoPreview">
                                    @if($student->guardian_photo)
                                        <img src="{{ asset($student->guardian_photo) }}" class="img-thumbnail" alt="Guardian Photo">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Section -->
                    <div class="section-header mb-4 mt-4">
                        <h5><i class="fas fa-cog"></i> Status</h5>
                        <hr class="border-primary">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Account Status</label>
                                <select name="status" id="status" class="form-control selectpicker">
                                    <option value="1" {{ old('status', $student->status) == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $student->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Form Buttons -->
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary btn-lg mr-3">
                            <i class="fas fa-save"></i> Update Student
                        </button>
                        <button type="reset" class="btn btn-outline-secondary mr-3">
                            <i class="fas fa-undo"></i> Reset
                        </button>
                        <a href="{{ route('student.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .section-header h5 {
            color: #4e73df;
            font-weight: 600;
        }
        .border-primary {
            border-color: #4e73df !important;
        }
        .custom-file-label::after {
            content: "Browse";
        }
        #studentPhotoPreview, #guardianPhotoPreview {
            width: 100px;
            height: 100px;
            border: 1px dashed #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        #studentPhotoPreview img, #guardianPhotoPreview img {
            max-width: 100%;
            max-height: 100%;
        }
        .selectpicker {
            width: 100% !important;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <script>
        $(document).ready(function() {
            // Initialize select picker
            $('.selectpicker').selectpicker();

            // Show/hide student group field based on class selection
            function toggleGroupField() {
                const selectedClass = $('#class').val();
                const groupField = $('#groupField');
                const studentGroup = $('#student_group');

                if (['Nine', 'Ten'].includes(selectedClass)) {
                    groupField.show();
                    studentGroup.prop('required', true);
                } else {
                    groupField.hide();
                    studentGroup.prop('required', false);
                    studentGroup.val('');
                    $('.selectpicker').selectpicker('refresh');
                }
            }

            // Initial check
            toggleGroupField();

            // On class change
            $('#class').change(function() {
                toggleGroupField();
            });

            // File input handling
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').html(fileName);
            });

            // Preview image before upload
            $('#student_photo').change(function(e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#studentPhotoPreview').html('<img src="' + e.target.result + '" class="img-thumbnail">');
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            $('#guardian_photo').change(function(e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#guardianPhotoPreview').html('<img src="' + e.target.result + '" class="img-thumbnail">');
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script>
@endsection
