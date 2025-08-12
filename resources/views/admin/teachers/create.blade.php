@extends('admin.layouts.master')

@section('title', 'Create Teacher')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Teacher & Employee</h1>
        <a href="{{ route('teacher.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> All Teachers & Employee
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
            <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Name --}}
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name') }}" autofocus>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Position --}}
                <div class="form-group">
                    <label for="position" class="font-weight-bold">Position *</label>
                    <input type="text" class="form-control @error('position') is-invalid @enderror"
                           id="position" name="position" value="{{ old('position') }}">
                    @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Experience --}}
                <div class="form-group">
                    <label for="experience" class="font-weight-bold">Experience</label>
                    <input type="text" class="form-control" id="experience" name="experience"
                           value="{{ old('experience') }}">
                </div>

                {{-- Phone --}}
                <div class="form-group">
                    <label for="phone" class="font-weight-bold">Phone Number *</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                           id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Social Links --}}
                <div class="form-group">
                    <label for="facebook" class="font-weight-bold">Facebook</label>
                    <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}">
                </div>

                <div class="form-group">
                    <label for="twitter" class="font-weight-bold">Twitter</label>
                    <input type="url" class="form-control" id="twitter" name="twitter" value="{{ old('twitter') }}">
                </div>

                <div class="form-group">
                    <label for="linkedin" class="font-weight-bold">LinkedIn</label>
                    <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
                </div>

                <div class="form-group">
                    <label for="instagram" class="font-weight-bold">Instagram</label>
                    <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram') }}">
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description</label>
                    <textarea name="description" id="description"
                              class="form-control">{{ old('description') }}</textarea>
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

                <button type="submit" class="btn btn-primary">Create Teacher</button>
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
