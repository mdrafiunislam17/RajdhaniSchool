@extends('admin.layouts.master')

@section('title', 'Review Details')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Review Details</h1>
        <a href="{{ route('review.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left text-white-50"></i> Back to All Reviews
        </a>
    </div>

    <!-- Review Details Card -->
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user-edit mr-2"></i>Review by {{ $review->name }}</h5>
                </div>

                <div class="card-body">

                    {{-- User Image --}}
                    @if ($review->image)
                        <div class="text-center mb-4">
                            <img src="{{ asset('uploads/review/' . $review->image) }}" class="rounded-circle shadow" style="width: 120px; height: 120px;" alt="Review Image">
                        </div>
                    @endif

                    {{-- Name & Email --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold">Name:</h6>
                            <p>{{ $review->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-weight-bold">Email:</h6>
                            <p>{{ $review->email }}</p>
                        </div>
                    </div>

                    {{-- Message --}}
                    <div class="mb-3">
                        <h6 class="font-weight-bold">Message:</h6>
                        <div class="border rounded p-3 bg-light">
                            {!! $review->message !!}
                        </div>
                    </div>

                    {{-- Rating --}}
                    <div class="mb-3">
                        <h6 class="font-weight-bold">Rating:</h6>
                        <div class="text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $review->rating >= $i ? 's' : 'r' }} fa-star fa-lg"></i>
                            @endfor
                            <span class="text-muted ml-2">({{ $review->rating }}/5)</span>
                        </div>
                    </div>

                    {{-- Created At --}}
                    <div class="mb-3">
                        <h6 class="font-weight-bold">Submitted On:</h6>
                        <p>{{ $review->created_at->format('d M Y, h:i A') }}</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
