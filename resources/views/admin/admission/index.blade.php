@extends("admin.layouts.master")
@section("title", "Admission Management")

@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admission Management</h1>
{{--            <a href="{{ route('admission.create') }}" class="btn btn-sm btn-primary shadow-sm">--}}
{{--                <i class="fas fa-plus fa-sm text-white-50"></i> Create New Admission--}}
{{--            </a>--}}
        </div>

        <!-- Alerts -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            </div>
        @endif

        <!-- Table Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Admission Records</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%">
                        <thead class="bg-primary text-white">
                        <tr>
                            <th>#SL</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Contact</th>
                            <th>Student Photo</th>
                            <th>Guardian Photo</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($admissions as $i => $item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item->student_photo)
                                            <img src="{{ asset('uploads/student_photo/' . $item->student_photo) }}" width="30" height="30" class="rounded-circle mr-2">
                                        @endif
                                        <span>{{ $item->first_name }} {{ $item->last_name }}</span>
                                    </div>
                                </td>
                                <td><span class="badge badge-primary">{{ $item->schoolClass->name ?? 'N/A' }}</span></td>
                                <td>
                                    {{ $item->student_phone }}<br>
                                    <small>{{ $item->student_email }}</small>
                                </td>
                                <td class="text-center">
                                    @if($item->student_photo)
                                        <img src="{{ asset('uploads/student_photo/' . $item->student_photo) }}" width="80" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('uploads/student_photo/' . $item->student_photo) }}" data-title="Student Photo">
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($item->guardian_photo)
                                        <img src="{{ asset('uploads/guardian_photo/' . $item->guardian_photo) }}" width="80" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('uploads/guardian_photo/' . $item->guardian_photo) }}" data-title="Guardian Photo">
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('admission.show', $item->id) }}"
                                           class="btn btn-sm "
                                           title="View"
                                           data-toggle="tooltip">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Edit Button -->
{{--                                        <a href="{{ route('admission.edit', $item->id) }}"--}}
{{--                                           class="btn btn-sm "--}}
{{--                                           title="Edit"--}}
{{--                                           data-toggle="tooltip">--}}
{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </a>--}}

                                        <!-- Delete Button -->
{{--                                        <form action="{{ route('admission.destroy', $item->id) }}"--}}
{{--                                              method="POST"--}}
{{--                                              class="d-inline delete-form">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="button"--}}
{{--                                                    class="btn btn-sm  delete-btn"--}}
{{--                                                    title="Delete"--}}
{{--                                                    data-toggle="tooltip">--}}
{{--                                                <i class="fas fa-trash"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No admission records found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($admissions instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="d-flex justify-content-between mt-3">
                        <small>Showing {{ $admissions->firstItem() }} to {{ $admissions->lastItem() }} of {{ $admissions->total() }} entries</small>
                        <div>{{ $admissions->links() }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-danger">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel"><i class="fa fa-trash me-2"></i> Confirm Deletion</h5>
                </div>
                <div class="modal-body text-center">
                    <p class="fs-5">Are you sure you want to delete this item?</p>
                    <i class="fa fa-exclamation-triangle fa-2x text-warning"></i>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger px-4" id="confirmDeleteBtn">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid" alt="Preview">
                </div>
            </div>
        </div>
    </div>
@endsection


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            let deleteForm = null;

            // Delete button handler
            $(document).on('click', '.delete-btn', function () {
                deleteForm = $(this).closest('form');
                $('#deleteModal').modal('show');
            });

            // Confirm delete
            $('#confirmDeleteBtn').click(function () {
                if (deleteForm) {
                    deleteForm.submit();
                }
            });

            // Image modal handler
            $('#imageModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget);
                $('#modalImage').attr('src', button.data('image'));
                $('#imageModalLabel').text(button.data('title'));
            });

            // Auto-dismiss alerts
            setTimeout(() => {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>


@section('styles')
    <style>
        .img-thumbnail {
            cursor: pointer;
            transition: transform 0.2s;
        }
        .img-thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .btn-group .btn {
            margin-right: 5px;
        }
        .btn-group .btn:last-child {
            margin-right: 0;
        }
    </style>
@endsection
