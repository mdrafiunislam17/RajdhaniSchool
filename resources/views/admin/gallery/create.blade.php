@extends('admin.layouts.master')

@section('title', 'Create Gallery')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Gallery</h1>
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
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div class="form-group">
                    <label for="title" class="font-weight-bold">Title *</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title') }}" autofocus>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>



                {{-- Youtube Links --}}
                <div class="form-group">
                    <label for="youtube" class="font-weight-bold">Youtube</label>
                    <input type="url" class="form-control" id="youtube" name="youtube" value="{{ old('youtube') }}">
                </div>




                {{-- Image --}}
                <div class="form-group">
                    <label for="image" class="font-weight-bold">Image *</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                           id="image" name="image">
                    @error('image') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label for="status" class="font-weight-bold">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Gallery</button>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description',
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image',
        menubar: false
    });
</script>
@endpush
