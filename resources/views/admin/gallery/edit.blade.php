@extends('admin.layouts.master')

@section('title', 'Edit Gallery')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
        <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> All Gallery
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
            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="form-group">
                    <label for="title" class="font-weight-bold">Title *</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title', $gallery->title) }}">
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Youtube Link --}}
                <div class="form-group">
                    <label for="youtube" class="font-weight-bold">YouTube Link</label>
                    <input type="url" class="form-control @error('youtube') is-invalid @enderror" id="youtube" name="youtube"
                           value="{{ old('youtube', $gallery->youtube) }}">
                    @error('youtube') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Show current YouTube Embed --}}
                @php
                    $videoId = null;
                    if ($gallery->youtube) {
                        if (Str::contains($gallery->youtube, 'youtu.be/')) {
                            $videoId = Str::after($gallery->youtube, 'youtu.be/');
                            $videoId = Str::before($videoId, '?');
                        } elseif (Str::contains($gallery->youtube, 'watch?v=')) {
                            $videoId = Str::after($gallery->youtube, 'watch?v=');
                            $videoId = Str::before($videoId, '&');
                        }
                    }
                @endphp

                @if($videoId && !$gallery->image)
                    <div class="form-group">
                        <label class="font-weight-bold">Current YouTube Video</label><br>
                        <iframe width="360" height="215"
                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                @endif

                {{-- Current Image --}}
                @if($gallery->image)
                    <div class="form-group">
                        <label class="font-weight-bold">Current Image</label><br>
                        <img src="{{ asset('uploads/gallery/' . $gallery->image) }}" alt="gallery Image"
                             style="max-height: 150px;">
                    </div>
                @endif

                {{-- Replace Image --}}
                <div class="form-group">
                    <label for="image" class="font-weight-bold">Replace Image</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                           id="image" name="image">
                    @error('image') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label for="status" class="font-weight-bold">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ old('status', $gallery->status) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $gallery->status) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Gallery</button>
            </form>
        </div>
    </div>

</div>
@endsection
