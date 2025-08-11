@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-md-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline ">
                <button type="button"
                    class="btn btn-primary badge {{ $data->status == 'active' ? 'bg-success' : 'bg-secondary' }} position-absolute"
                    style="top: 10px; right: 10px;" data-bs-toggle="modal" data-bs-target="#statusModal">
                    {{ $data->status == 'active' ? 'Active' : 'Non Active' }}
                </button>
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
                            <b>Bio</b>
                            @if ($data->bio)
                                <p style="text-align: justify;">
                                    {!! $data->bio !!}
                                </p>
                            @else
                                <p class="float-right">-</p>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Graduation Year</b>
                            @if ($data->graduation_year)
                                <p class="float-right">{{ $data->graduation_year }}</p>
                            @else
                                <p class="float-right">-</p>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Work Experience</b>
                            @if ($data->work_experience_years)
                                <p class="float-right">{{ $data->work_experience_years }}
                                    {{ $data->work_experience_years > 1 ? 'Years' : 'Year' }}
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
                        <li class="list-group-item">
                            <b>Address</b>
                            @if ($data->address)
                                <p class="float-right">{{ $data->address }}</p>
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
        @if ($data->resume)
            <div class="col-md-6">
                <!-- About Me Box -->
                <div class="card card-primary  card-outline">
                    <div class="card-header">
                        <h3 class="card-title center">Curriculum Vitae</h3>
                    </div>
                    <div id="pdf-container">
                        <embed src="{{ asset('storage/' . $data->resume) }}" id="pdf-preview" type="application/pdf"
                            style="width:100%; height:70vh;"></embed>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        @endif
    </div>

    <!-- Update Profile Modal -->
    <div class="modal fade" id="updateProfile" tabindex="-1" aria-labelledby="updateProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateProfileLabel">Update Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="/admin/jobseeker/{{ $data->id }}" enctype="multipart/form-data">
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
                            <label for="graduation_year" class="form-label">Graduation Year</label>
                            <input type="number" class="form-control @error('graduation_year') is-invalid @enderror"
                                min="1900" max="{{ now()->year }}" placeholder="e.g., 2025" id="graduation_year"
                                name="graduation_year" autofocus
                                value="{{ old('graduation_year', $data->graduation_year) }}">
                            @error('graduation_year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">bio</label>
                            <input id="bio" type="hidden" name="bio" value="{{ old('bio', $data->bio) }}">
                            <trix-editor input="bio"></trix-editor>
                            @error('bio')
                                <p class="text-danger">
                                    <small>{{ $message }}</small>
                                </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label">Resume</label>
                            @if ($data->resume)
                                <input type="hidden" name="oldresume" value="{{ $data->resume }}">
                            @endif
                            <input class="form-control" type="file" id="resume" name="resume"
                                value="{{ old('bio', $data->resume) }}">
                            @error('resume')
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
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                id="address" name="address" autofocus value="{{ old('address', $data->address) }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="work_experience_years" class="form-label">Work Experience Years</label>
                            <input type="number"
                                class="form-control @error('work_experience_years') is-invalid @enderror" min="0"
                                max="50" placeholder="e.g., 3" id="work_experience_years"
                                name="work_experience_years" autofocus
                                value="{{ old('work_experience_years', $data->work_experience_years) }}">
                            @error('work_experience_years')
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
