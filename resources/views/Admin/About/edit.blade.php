@extends('layouts.admin')
@section('title','About-Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Home Page Brand Pictures Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.about.update',$abouts->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label>
                        <select name="location" id="">
                            <option value=""></option>
                            <option value="home_page">For Home Page</option>
                            <option value="about_page">For About Page</option>
                        </select>
                        <div class="label-text">Location</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $abouts->title_am}}" name="title_am" id="title_am" required>
                        <div class="label-text">Title AM</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $abouts->title_ru}}" name="title_ru" id="name" required>
                        <div class="label-text">Title Ru</div>
                    </label>
                    <label>
                        <input type="text" name="title_en" value="{{ $abouts->title_en}}" id="name" required>
                        <div class="label-text">Title En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $abouts->description_am}}" name="description_am" id="name" required>
                        <div class="label-text">Description AM</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $abouts->description_ru}}" name="description_ru" id="name" required>
                        <div class="label-text">Description Ru</div>
                    </label>
                    <label>
                        <input type="text" name="description_en" value="{{ $abouts->description_en}}" id="name" required>
                        <div class="label-text">Description En</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                {{--                                    src="'./image/'.{{ $home_brand_images->image }}" --}}
                                src="{{ asset('public/image/'.$abouts->about_images) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="about_images"
                                id="img"
                                class="form-control"
                                hidden
                            >
                        </label>
                    </div>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#img').on('change', function (e) {
                const blobUrl = URL.createObjectURL(e.target.files[0])
                $('#preview').attr('src', blobUrl)
            })

        })
    </script>
@endsection
