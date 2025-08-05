@extends('admin.layouts.master')

@section('title', 'Create Result')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Result</h1>
            <a href="{{ route('result.index') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Result
            </a>
        </div>

        <!-- Alerts -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">
                    <i class="fas fa-exclamation-circle"></i> Please fix the following errors
                </h5>
                <ul class="mb-0 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle mr-2"></i> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation mr-2"></i> {{ session('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="fas fa-info-circle mr-2"></i> {{ session('info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <!-- Form Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Result Information</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('result.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label font-weight-bold">Title *</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title') }}" required autofocus>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label font-weight-bold">Description</label>
                        <div class="col-md-9">
                        <textarea name="description" id="description" rows="5"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="form-group row">
                        <label for="image" class="col-md-3 col-form-label font-weight-bold">Image </label>
                        <div class="col-md-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                       id="image" name="image" >
                                <label class="custom-file-label" for="image">Choose file</label>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                Allowed formats: jpeg, png, jpg, gif, svg. Max size: 2MB
                            </small>
                        </div>
                    </div>

                    <!-- PDF File -->
                    <div class="form-group row">
                        <label for="pdf" class="col-md-3 col-form-label font-weight-bold">PDF Attachment</label>
                        <div class="col-md-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('pdf') is-invalid @enderror"
                                       id="pdf" name="pdf" accept=".pdf">
                                <label class="custom-file-label" for="pdf">Choose PDF file</label>
                                @error('pdf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                Max size: 10MB
                            </small>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group row">
                        <label for="status" class="col-md-3 col-form-label font-weight-bold">Status *</label>
                        <div class="col-md-9">
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Notice
                            </button>
                            <button type="reset" class="btn btn-outline-secondary ml-2">
                                <i class="fas fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .custom-file-label::after {
            content: "Browse";
        }
    </style>
@endpush

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
