@extends('layouts.admin')
@section('title','Product - Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Product Page  Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.product.update',$products -> id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label>
                        <input type="text" value="{{ $products -> title_am }}" name="title_am" id="name" required>
                        <div class="label-text">Title Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $products -> title_ru }}" name="title_ru" id="name" required>
                        <div class="label-text">Title Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $products -> title_en }}" name="title_en" id="name" required>
                        <div class="label-text">Title En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $products -> description_am }}" name="description_am" id="name" required>
                        <div class="label-text">Description Am</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $products -> description_ru }}" name="description_ru" id="name" required>
                        <div class="label-text">Description Ru</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $products -> description_en }}" name="description_en" id="name" required>
                        <div class="label-text">Description En</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $products -> code }}" name="code" id="name" required>
                        <div class="label-text">Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('image/'.$products->product_pictures) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="product_pictures"
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
