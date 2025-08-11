@extends('admin.layouts.main')
@section('container')
    <div class="card col-lg-12 px-0">
        <div class="card-header">
            <h2 class="card-title"><b>Your Posts</b></h2>
            <div class="card-tools">
                <a href="/admin/posts/create" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i>
                    Add Post!</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Job Status</th>
                        <th style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>
                                    @if ($post->status == 'public')
                                        <span class="badge bg-success">Public</span>
                                    @elseif($post->status == 'waiting')
                                        <span class="badge bg-warning">Waiting</span>
                                    @else
                                        <span class="badge bg-dark">Private</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($post->job_status == 'full-time')
                                        <span class="badge bg-primary">Full Time</span>
                                    @else
                                        <span class="badge bg-warning">Part Time</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/posts/{{ $post->slug }}">
                                        <button class="btn btn-success">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="/admin/posts/{{ $post->slug }}/edit">
                                        <button class="btn btn-primary">
                                            <i class="fas fa-pencil-alt "></i>
                                        </button>
                                    </a>
                                    <form action="/admin/posts/{{ $post->slug }}" method="post" class="d-inline ">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger border-0 btn-hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-light">
                            <td colspan="6" class="text-muted py-4 text-center">
                                <i class="fas fa-info-circle me-1"></i>
                                You haven't created any posts. Start by adding one!
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $("#dataTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        });

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
