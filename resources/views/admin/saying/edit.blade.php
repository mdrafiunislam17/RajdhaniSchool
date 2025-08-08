@extends('admin.layouts.master')

@section('title', 'Edit Saying')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-edit text-primary mr-2"></i> Edit Saying
            </h1>
            <a href="{{ route('saying.index') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i> All Sayings
            </a>
        </div>

        <!-- Alerts -->
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
        @endif

        <!-- Form Card -->
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <strong>Edit Saying Details</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('saying.update', $saying->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Name <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               name="name"
                               placeholder="Enter name"
                               value="{{ old('name', $saying->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Position --}}
                    <div class="form-group">
                        <label for="position" class="font-weight-bold">Position <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('position') is-invalid @enderror"
                               id="position"
                               name="position"
                               placeholder="Enter position"
                               value="{{ old('position', $saying->position) }}">
                        @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label for="description" class="font-weight-bold">Description</label>
                        <textarea name="description"
                                  id="description"
                                  class="form-control"
                                  placeholder="Write description...">{{ old('description', $saying->description) }}</textarea>
                    </div>

                    {{-- Current Image --}}
                    @if ($saying->image)
                        <div class="form-group">
                            <label class="font-weight-bold">Current Image</label><br>
                            <img src="{{ asset('uploads/saying/' . $saying->image) }}"
                                 alt="Saying Image"
                                 class="img-thumbnail shadow-sm"
                                 style="max-height: 150px;">
                        </div>
                    @endif

                    {{-- Upload New Image --}}
                    <div class="form-group">
                        <label for="image" class="font-weight-bold">Replace Image</label>
                        <input type="file"
                               class="form-control-file @error('image') is-invalid @enderror"
                               id="image"
                               name="image">
                        @error('image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Sort --}}
                    <div class="form-group">
                        <label for="sort" class="font-weight-bold">Sort Order</label>
                        <input type="number"
                               class="form-control"
                               id="sort"
                               name="sort"
                               placeholder="Enter sort order"
                               value="{{ old('sort', $saying->sort) }}">
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status" class="font-weight-bold">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status', $saying->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $saying->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fas fa-save mr-1"></i> Update Saying
                        </button>
                    </div>
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
