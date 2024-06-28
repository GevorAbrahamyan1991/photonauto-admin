@extends('layouts.admin')
@section('title','ForHome => Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>For Home Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.ForHomes.update',$ForHomes->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                @csrf
                @method('PUT')
                    <label>
                        <input type="text" value="{{ $ForHomes -> for_home_title_am}}" name="for_home_title_am" id="name" required>
                        <div class="label-text">ForHome Title Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $ForHomes -> for_home_title_ru}}" name="for_home_title_ru" id="name" required>
                        <div class="label-text">ForHome Title Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $ForHomes -> for_home_title_en}}" name="for_home_title_en" id="name" required>
                        <div class="label-text">ForHome Title En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $ForHomes -> for_home_description_am}}" name="for_home_description_am" id="name" required>
                        <div class="label-text">ForHome Description Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $ForHomes -> for_home_description_ru}}" name="for_home_description_ru" id="name" required>
                        <div class="label-text">ForHome Description Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $ForHomes -> for_home_description_en}}" name="for_home_description_en" id="name" required>
                        <div class="label-text">ForHome Description En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $ForHomes -> for_home_code}}" name="for_home_code" id="name" required>
                        <div class="label-text">ForHome Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('image/'.$ForHomes->for_home_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="for_home_image"
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
