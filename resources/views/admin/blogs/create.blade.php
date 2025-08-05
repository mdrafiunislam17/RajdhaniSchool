@extends("admin.layouts.master")
@section("title", "Create Blog")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Blog</h1>
            <a href="{{ route("blogs.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i> View All Blogs
            </a>
        </div>

        <!-- Alert Messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6><strong>Please fix the following errors:</strong></h6>
                <ul class="m-0 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="fas fa-check-circle mr-2"></i> {{ session("success") }}
            </div>
        @endif

        @if (session()->has("error"))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session("error") }}
            </div>
        @endif

        <!-- Blog Creation Form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog Information</h6>
            </div>
            <div class="card-body">
                <form action="{{ route("blogs.store") }}" method="post" enctype="multipart/form-data" id="blogForm">
                    @csrf

                    <!-- Title -->
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label text-right font-weight-bold">Title *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" value="{{ old("title") }}" name="title" required autofocus>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label text-right font-weight-bold">Image *</label>
                        <div class="col-sm-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*" required>
                                <label class="custom-file-label" for="image">Choose file</label>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Recommended size: 1200x630 pixels</small>
                            <div class="mt-2" id="imagePreview"></div>
                        </div>
                    </div>

                    <!-- Posted By -->
                    <div class="form-group row">
                        <label for="posted_by" class="col-sm-3 col-form-label text-right font-weight-bold">Posted By *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control @error('posted_by') is-invalid @enderror"
                                   id="posted_by" value="{{ old("posted_by", "Admin") }}" name="posted_by" required>
                            @error('posted_by')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Posted On -->
                    <div class="form-group row">
                        <label for="posted_on" class="col-sm-3 col-form-label text-right font-weight-bold">Posted On *</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control @error('posted_on') is-invalid @enderror"
                                   id="posted_on" value="{{ old("posted_on", now()->format('Y-m-d\TH:i')) }}" name="posted_on" required>
                            @error('posted_on')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Short Detail -->
                    <div class="form-group row">
                        <label for="short_detail" class="col-sm-3 col-form-label text-right font-weight-bold">Short Detail *</label>
                        <div class="col-sm-6">
                            <textarea name="short_detail" id="short_detail" class="form-control @error('short_detail') is-invalid @enderror"
                                      style="height: 120px" required>{{ old("short_detail") }}</textarea>
                            <small class="form-text text-muted">Maximum 200 characters</small>
                            @error('short_detail')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Detail (Rich Text Editor) -->
                    <div class="form-group row">
                        <label for="detail" class="col-sm-3 col-form-label text-right font-weight-bold">Detail *</label>
                        <div class="col-sm-8">
                            <textarea name="detail" id="detail" class="form-control @error('detail') is-invalid @enderror"
                                      required>{{ old("detail") }}</textarea>
                            @error('detail')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i> Save Blog
                            </button>
                            <button type="reset" class="btn btn-secondary ml-2">
                                <i class="fas fa-undo mr-2"></i> Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push("styles")
    <style>
        .tox-notifications-container { display: none !important; }
        .custom-file-label::after { content: "Browse"; }
    </style>
@endpush

@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

    <script>

        // Image preview functionality
        document.getElementById('image').addEventListener('change', function(event) {


            tinymce.init({
                selector: '#detail',
                height: 300,
                plugins: 'advlist autolink lists link image charmap print preview anchor',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
                menubar: false,
            });
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div class="border p-2" style="max-width: 300px;">
                            <img src="${e.target.result}" class="img-fluid" alt="Preview">
                            <div class="mt-2 text-center">${file.name}</div>
                        </div>
                    `;
                }
                reader.readAsDataURL(file);

                // Update the file label
                const label = document.querySelector('.custom-file-label');
                label.textContent = file.name;
            }
        });

        // Form validation
        document.getElementById('blogForm').addEventListener('submit', function(e) {
            const title = document.getElementById('title').value.trim();
            const shortDetail = document.getElementById('short_detail').value.trim();

            if (!title) {
                e.preventDefault();
                alert('Please enter a title for the blog');
                document.getElementById('title').focus();
                return;
            }

            if (!shortDetail) {
                e.preventDefault();
                alert('Please enter a short detail for the blog');
                document.getElementById('short_detail').focus();
                return;
            }

            if (shortDetail.length > 200) {
                e.preventDefault();
                alert('Short detail should not exceed 200 characters');
                document.getElementById('short_detail').focus();
                return;
            }

            // You can add more validation as needed
        });
    </script>
@endpush
