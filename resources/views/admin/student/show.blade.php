@extends('admin.layouts.master')

@section('title', 'Student Details')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary text-white">
                <h1 class="h4 mb-0 font-weight-bold"><i class="fas fa-user-graduate"></i> Student Details</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Student Photo -->
                    <div class="col-md-3 text-center mb-4">
                        @if($student->student_photo)
                            <img src="{{ asset($student->student_photo) }}" class="img-thumbnail rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" alt="Student Photo">
                        @else
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 200px; height: 200px; margin: 0 auto;">
                                <i class="fas fa-user fa-5x text-secondary"></i>
                            </div>
                        @endif
                        <h4 class="mt-3">{{ $student->first_name }} {{ $student->last_name }}</h4>
{{--                        <p class="text-muted">Student ID: {{ $student->id }}</p>--}}
                    </div>

                    <!-- Student Details -->
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-item mb-3">
                                    <h5 class="text-primary"><i class="fas fa-id-card"></i> Basic Information</h5>
                                    <hr class="border-primary">
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Class:</div>
                                        <div class="col-7">Class {{ $student->class }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Section:</div>
                                        <div class="col-7">{{ $student->section == 'N/A' ? 'Not Applicable' : 'Section '.$student->section }}</div>
                                    </div>
                                    @if(in_array($student->class, ['Nine', 'Ten']))
                                        <div class="row mb-2">
                                            <div class="col-5 font-weight-bold">Group:</div>
                                            <div class="col-7">{{ $student->student_group == 'N/A' ? 'Not Applicable' : ucfirst($student->student_group) }}</div>
                                        </div>
                                    @endif
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Gender:</div>
                                        <div class="col-7">{{ ucfirst($student->gender) }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Date of Birth:</div>
                                        <div class="col-7">{{ \Carbon\Carbon::parse($student->birthday)->format('d M, Y') }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Age:</div>
                                        <div class="col-7">{{ \Carbon\Carbon::parse($student->birthday)->age }} years</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Blood Group:</div>
                                        <div class="col-7">{{ $student->blood_group ?: 'N/A' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Religion:</div>
                                        <div class="col-7">{{ $student->religion ?: 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-item mb-3">
                                    <h5 class="text-primary"><i class="fas fa-school"></i> Academic Information</h5>
                                    <hr class="border-primary">
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Shift:</div>
                                        <div class="col-7">{{ ucfirst($student->shift) }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Admission Date:</div>
                                        <div class="col-7">{{ \Carbon\Carbon::parse($student->admission_date)->format('d M, Y') }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Status:</div>
                                        <div class="col-7">
                                            <span class="badge badge-{{ $student->status ? 'success' : 'danger' }}">
                                                {{ $student->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">School Name:</div>
                                        <div class="col-7">{{ $student->school_name ?: 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="detail-item mb-3">
                                    <h5 class="text-primary"><i class="fas fa-phone"></i> Contact Information</h5>
                                    <hr class="border-primary">
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Student Phone:</div>
                                        <div class="col-7">{{ $student->student_phone ?: 'N/A' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Student Email:</div>
                                        <div class="col-7">{{ $student->student_email ?: 'N/A' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Present Address:</div>
                                        <div class="col-7">{{ $student->present_address ?: 'N/A' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Permanent Address:</div>
                                        <div class="col-7">{{ $student->permanent_address ?: 'N/A' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">City:</div>
                                        <div class="col-7">{{ $student->city ?: 'N/A' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">State:</div>
                                        <div class="col-7">{{ $student->state ?: 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-item mb-3">
                                    <h5 class="text-primary"><i class="fas fa-user-shield"></i> Guardian Information</h5>
                                    <hr class="border-primary">
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Guardian Name:</div>
                                        <div class="col-7">{{ $student->guardian_name ?: 'N/A' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Guardian Phone:</div>
                                        <div class="col-7">{{ $student->guardian_phone ?: 'N/A' }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 font-weight-bold">Guardian Photo:</div>
                                        <div class="col-7">
                                            @if($student->guardian_photo)
                                                <img src=" {{ asset($student->guardian_photo) }}" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;" alt="Guardian Photo">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                                    <i class="fas fa-user text-secondary"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary mr-2">
                        <i class="fas fa-edit"></i> Edit Student
                    </a>
                    <a href="{{ route('student.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .detail-item {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 15px;
            height: 100%;
        }
        .detail-item h5 {
            font-weight: 600;
        }
        .border-primary {
            border-color: #4e73df !important;
        }
        .badge-success {
            background-color: #1cc88a;
        }
        .badge-danger {
            background-color: #e74a3b;
        }
    </style>
@endsection
