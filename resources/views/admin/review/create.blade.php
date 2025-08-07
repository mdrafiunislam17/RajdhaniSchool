@extends('admin.layouts.master')

@section('title', 'Create Review')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Review</h1>
        <a href="{{ route('review.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> All Reviews
        </a>
    </div>

    <!-- Alerts -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Name --}}
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name') }}" autofocus>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email') }}">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Message --}}
                <div class="form-group">
                    <label for="message" class="font-weight-bold">Message *</label>
                    <textarea name="message" id="message" rows="5"
                              class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <label for="image" class="font-weight-bold">Photo</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                           id="image" name="image">
                    @error('image') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                {{-- Rating --}}
            <div class="form-group">
            <label class="font-weight-bold">Rating *</label>
            <div class="d-flex gap-2 text-warning rating-stars">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fa{{ old('rating', 0) >= $i ? 's' : 'r' }} fa-star fa-lg cursor-pointer" data-value="{{ $i }}"></i>
                @endfor
            </div>
            <input type="hidden" name="rating" id="rating" value="{{ old('rating', 0) }}">
            @error('rating') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>


                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#message',
        height: 250,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
    });


    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll('.rating-stars i');
        const ratingInput = document.getElementById('rating');

        function updateStars(selectedRating) {
            stars.forEach((star, index) => {
                if (index < selectedRating) {
                    star.classList.remove('far');
                    star.classList.add('fas');
                } else {
                    star.classList.remove('fas');
                    star.classList.add('far');
                }
            });
        }

        stars.forEach((star) => {
            star.addEventListener('click', function () {
                const ratingValue = parseInt(this.getAttribute('data-value'));
                ratingInput.value = ratingValue;
                updateStars(ratingValue);
            });
        });

        // Initialize on load if value already set (e.g., validation error redirect)
        if (ratingInput.value > 0) {
            updateStars(ratingInput.value);
        }
    });
</script>
@endpush
