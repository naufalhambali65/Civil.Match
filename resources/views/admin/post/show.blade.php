@extends('admin.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Job Post Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Title</th>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <th>Author</th>
                            <td>{{ $post->author->name }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                                        style="max-width: 300px;">
                                @else
                                    <span>No image uploaded</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($post->status == 'public')
                                    <span class="badge bg-success">Public</span>
                                @elseif($post->status == 'waiting')
                                    <span class="badge bg-warning">Waiting</span>
                                @else
                                    <span class="badge bg-dark">Private</span>
                                @endif
                                <button type="button" class="btn btn-primary badge position-absolute"
                                    style="top: 10px; right: 10px;" data-bs-toggle="modal" data-bs-target="#statusModal">
                                    Update Status
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th>Job Status</th>
                            <td>
                                @if ($post->job_status == 'full-time')
                                    <span class="badge bg-primary">Full Time</span>
                                @else
                                    <span class="badge bg-warning">Part Time</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $post->description !!}</td>
                        </tr>
                        <tr>
                            <th>Requirements</th>
                            <td>{!! $post->requirements !!}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/admin/posts" class="btn btn-success"><i class="bi bi-arrow-left"></i></a>
                    <a href="/admin/posts/{{ $post->slug }}/edit" class="btn btn-primary"><i
                            class="bi bi-pencil-fill"></i></a>
                    <form action="/admin/posts/{{ $post->slug }}" method="post" class="d-inline ">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger border-0 btn-hapus">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- Status Modal --}}
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statusModalLabel">Update Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/posts/status/{{ $post->slug }}" method="post">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" aria-label="Select Status" required>
                            <option value="public" @if ($post->status == 'public') selected @endif>Public</option>
                            <option value="private" @if ($post->status == 'private') selected @endif>Private
                            </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.btn-hapus').on('click', function(e) {
            e.preventDefault();

            const form = $(this).closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This post will be permanently deleted.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
