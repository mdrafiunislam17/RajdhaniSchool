@extends('admin.layouts.master')

@section('title', 'Admission Details')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admission Details</h1>
            <div>
                <a href="{{ route('admission.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
{{--                <a href="{{ route('admission.edit', $admission->id) }}" class="btn btn-primary">--}}
{{--                    <i class="fas fa-edit"></i> Edit Admission--}}
{{--                </a>--}}
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Student Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Class:</span>
                            <span class="detail-value">{{ $admission->schoolClass->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Full Name:</span>
                            <span class="detail-value">{{ $admission->first_name }} {{ $admission->last_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Gender:</span>
                            <span class="detail-value">{{ ucfirst($admission->gender) }}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Shift:</span>
                            <span class="detail-value">{{ ucfirst($admission->shift) }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Admission Date:</span>
                            <span class="detail-value">{{ $admission->admission_date }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Birthday:</span>
                            <span class="detail-value">{{ $admission->birthday }}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Blood Group:</span>
                            <span class="detail-value">{{ $admission->blood_group ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Phone:</span>
                            <span class="detail-value">{{ $admission->student_phone }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Email:</span>
                            <span class="detail-value">{{ $admission->student_email }}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Religion:</span>
                            <span class="detail-value">{{ $admission->religion }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Previous School:</span>
                            <span class="detail-value">{{ $admission->school_name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Address Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">City:</span>
                            <span class="detail-value">{{ $admission->city }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">State:</span>
                            <span class="detail-value">{{ $admission->state }}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Present Address:</span>
                            <span class="detail-value">{{ $admission->present_address }}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Permanent Address:</span>
                            <span class="detail-value">{{ $admission->permanent_address }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Guardian Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Name:</span>
                            <span class="detail-value">{{ $admission->guardian_name }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold">Phone:</span>
                            <span class="detail-value">{{ $admission->guardian_phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Photos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3 text-center">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold d-block mb-2">Student Photo:</span>
                            @if ($admission->student_photo)
                                <img src="{{ asset('uploads/student_photo/' . $admission->student_photo) }}"
                                     alt="Student Photo"
                                     class="img-thumbnail"
                                     style="max-width: 250px; max-height: 250px;">
                            @else
                                <div class="text-muted">No photo available</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 mb-3 text-center">
                        <div class="detail-item">
                            <span class="detail-label font-weight-bold d-block mb-2">Guardian Photo:</span>
                            @if ($admission->guardian_photo)
                                <img src="{{ asset('uploads/guardian_photo/' . $admission->guardian_photo) }}"
                                     alt="Guardian Photo"
                                     class="img-thumbnail"
                                     style="max-width: 250px; max-height: 250px;">
                            @else
                                <div class="text-muted">No photo available</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .detail-item {
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            height: 100%;
        }
        .detail-label {
            color: #6c757d;
            display: block;
            margin-bottom: 3px;
        }
        .detail-value {
            color: #495057;
            font-size: 1rem;
            display: block;
        }
        .card {
            margin-bottom: 20px !important;
        }
    </style>
@endsection
