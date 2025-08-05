@extends('admin.layouts.master')

@section('title', 'Edit Result')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Result</h1>
            <a href="{{ route('result.index') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Result
            </a>
        </div>

        <!-- Alerts -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> Please fix the following errors:
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Form Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Result Information</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('result.update', $result->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label font-weight-bold">Title *</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title', $result->title) }}" required>
                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label font-weight-bold">Description</label>
                        <div class="col-md-9">
                        <textarea name="description" id="description" rows="5"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $result->description) }}</textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="form-group row">
                        <label for="image" class="col-md-3 col-form-label font-weight-bold">Image</label>
                        <div class="col-md-9">
                            @if($result->image)
                                <div class="mb-2">
                                    <img src="{{ asset('uploads/result/'.$result->image) }}"
                                         alt="Notice Image"
                                         class="img-thumbnail"
                                         style="max-width: 200px; max-height: 200px;">
                                    <div class="mt-2">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="remove_image" value="1"> Remove current image
                                        </label>
                                    </div>
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*">
                                <label class="custom-file-label" for="image">
                                    {{ $result->image ? 'Replace image' : 'Choose image' }}
                                </label>
                            </div>
                            <small class="form-text text-muted">
                                Leave empty to keep current image. Max size: 2MB. Formats: jpg, png, gif, webp
                            </small>
                            @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- PDF -->
                    <div class="form-group row">
                        <label for="pdf" class="col-md-3 col-form-label font-weight-bold">PDF Attachment</label>
                        <div class="col-md-9">
                            @if($result->pdf)
                                <div class="mb-2">
                                    <a href="{{ asset('uploads/result/pdf/'.$result->pdf) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-file-pdf"></i> View Current PDF
                                    </a>
                                    <div class="mt-2">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="remove_pdf" value="1"> Remove current PDF
                                        </label>
                                    </div>
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('pdf') is-invalid @enderror"
                                       id="pdf" name="pdf" accept=".pdf">
                                <label class="custom-file-label" for="pdf">
                                    {{ $result->pdf ? 'Replace PDF' : 'Choose PDF file' }}
                                </label>
                            </div>
                            <small class="form-text text-muted">
                                Leave empty to keep current file. Max size: 10MB
                            </small>
                            @error('pdf')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group row">
                        <label for="status" class="col-md-3 col-form-label font-weight-bold">Status *</label>
                        <div class="col-md-9">
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status', $result->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $result->status) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Update Notice
                            </button>
                            <a href="{{ route('notice.index') }}" class="btn btn-outline-secondary ml-2">
                                <i class="fas fa-times"></i> Cancel
                            </a>
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
        .img-thumbnail {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 0.25rem;
            background-color: #fff;
        }
    </style>
@endpush

@push('scripts')
    <!-- TinyMCE with more plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            height: 400,
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen media table help wordcount',
            toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | code help',
            menubar: false,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            // Image upload handler
            images_upload_handler: function (blobInfo, success, failure) {
                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                formData.append('_token', '{{ csrf_token() }}');

                fetch('{{ url('uploads/result') }}', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => success(data.location))
                    .catch(() => failure('Upload failed'));
            }
        });

        // Show file names in file inputs
        document.querySelectorAll('.custom-file-input').forEach(input => {
            input.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name ||
                    (this.id === 'image' ? '{{ $result->image ? "Replace image" : "Choose image" }}' :
                        '{{ $result->pdf ? "Replace PDF" : "Choose PDF" }}');
                this.nextElementSibling.textContent = fileName;
            });
        });

        // Handle remove checkboxes
        document.querySelectorAll('[name="remove_image"], [name="remove_pdf"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    const fileInput = this.closest('.form-group').querySelector('.custom-file-input');
                    fileInput.value = '';
                    fileInput.nextElementSibling.textContent = 'Choose file';
                }
            });
        });
    </script>
@endpush
