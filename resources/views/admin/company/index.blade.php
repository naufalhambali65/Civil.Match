@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-md-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline ">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            @if ($data->image) src="{{ asset('storage/' . $data->image) }}"
                        @else
                        src="/admin_assets/dist/img/profile/default.png" @endif
                            alt="{{ $data->user->name }}">
                    </div>

                    <h3 class="profile-username text-center">{{ $data->user->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Description</b>
                            @if ($data->description)
                                <p style="text-align: justify;">
                                    {!! $data->description !!}
                                </p>
                            @else
                                <p class="float-right">-</p>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b>
                            @if ($data->phone)
                                <p class="float-right">{{ $data->phone }}</p>
                            @else
                                <p class="float-right">-</p>
                            @endif
                        </li>
                    </ul>
                    <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal"
                        data-bs-target="#updateProfile">
                        Update
                    </button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Update Profile Modal -->
    <div class="modal fade" id="updateProfile" tabindex="-1" aria-labelledby="updateProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateProfileLabel">Update Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="/admin/company/{{ $data->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            @if ($data->image)
                                <input type="hidden" name="oldimage" value="{{ $data->image }}">
                                <img class="img-preview img-fluid mb-3 col-sm-5"
                                    src="{{ asset('storage/' . $data->image) }}" style="display:block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                                name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input id="description" type="hidden" name="description"
                                value="{{ old('description', $data->description) }}">
                            <trix-editor input="description"></trix-editor>
                            @error('description')
                                <p class="text-danger">
                                    <small>{{ $message }}</small>
                                </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="+62 812 3456 789" maxlength="20" id="phone" name="phone" autofocus
                                value="{{ old('phone', $data->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
