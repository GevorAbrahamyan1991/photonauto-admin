@extends('layouts.admin')
@section('title','News-Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Product Page  Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.news.update',$news -> id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label>
                        <input type="text" value="{{ $news -> title_am }}" name="title_am" id="name" required>
                        <div class="label-text">Title Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news -> title_ru }}" name="title_ru" id="name" required>
                        <div class="label-text">Title Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news -> title_en }}" name="title_en" id="name" required>
                        <div class="label-text">Title En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news -> description_am }}" name="description_am" id="name" required>
                        <div class="label-text">Description Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news -> description_ru }}" name="description_ru" id="name" required>
                        <div class="label-text">Description Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $news -> description_en }}" name="description_en" id="name" required>
                        <div class="label-text">Description En</div>
                    </label>
                    <label>
                        <input type="text" name="news_unqiue" value="{{ $news -> news_unqiue }}" id="name" required>
                        <div class="label-text">News Unique</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('public/image/'.$news->news_images) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="news_images"
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
