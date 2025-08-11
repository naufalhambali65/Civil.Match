@extends('admin.layouts.main')
@section('container')
    <div class="row card shadow-sm col-lg-8">
        <div class="col">
            <form method="post" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" required autofocus value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                </div>
                <div class="mb-3">
                    <label for="job_status" class="form-label">Job Status</label>
                    <select class="form-select" id="job_status" name="job_status" aria-label="Select Category" required>
                        <option value="" disabled selected hidden>-- Select Job Status --</option>
                        <option value="part-time">Part Time</option>
                        <option value="full-time">Full Time</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input id="description" type="hidden" name="description"
                        value="{{ old('description') }} @error('description') is-invalid @enderror">
                    <trix-editor input="description"></trix-editor>
                    @error('description')
                        <p class="text-danger">
                            <small>{{ $message }}</small>
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="requirements" class="form-label">requirements</label>
                    <input id="requirements" type="hidden" name="requirements"
                        value="{{ old('requirements') }} @error('requirements') is-invalid @enderror">
                    <trix-editor input="requirements"></trix-editor>
                    @error('requirements')
                        <p class="text-danger">
                            <small>{{ $message }}</small>
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <a href="/admin/posts" class="btn btn-xs btn-primary">Back</a>
                    <button type="submit" class="btn btn-success" id="submitBtn" disabled>Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        function checkSlugFilled() {
            const slug = document.querySelector('#slug');
            const submitBtn = document.querySelector('#submitBtn');

            if (slug.value.trim() !== '') {
                submitBtn.removeAttribute('disabled');
            } else {
                submitBtn.setAttribute('disabled', true);
            }
        }


        title.addEventListener('change', function() {
            if (title.value == "") {
                slug.value = "";
                return 0;
            }
            fetch('/admin/posts/createSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => {
                    slug.value = data.slug
                    checkSlugFilled()
                });
        });

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
