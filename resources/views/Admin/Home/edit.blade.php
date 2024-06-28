@extends('layouts.admin')
@section('title','Home-Brand-Image-Edit')
@section('content')
        <div class="container" id="home_admin_section_phone_email">
            <div class="row">
                <div class="col-md-12">
                    <h3>Home Page Brand Pictures Edit</h3>
                </div>
                <div class="col-md-12">
                    <form
                        action="{{ route('admin.home.update',$home_brand_images->id) }}"
                        method="POST"
                        class="w-100"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

{{--                        {{ $HomeBrandImage->title }}--}}
                        <label>
                            <input type="text" name="title" value="{{ $home_brand_images->title }}" id="name" required>
                            <div class="label-text">Title</div>
                        </label>
                        <div class="text-center">
                            <label
                                for="img"
                                class=""
                            >
                                <img
{{--                                    src="'./image/'.{{ $home_brand_images->image }}" --}}
                                    src="{{ asset('public/image/'.$home_brand_images->image) }}"
                                    width="150px"
                                    height="150px"
                                    class="img-fluid"
                                    id="preview"
                                    alt="">
                                <input
                                    type="file"
                                    name="image"
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
