@extends('layouts.admin')
@section('title','Snow Product Edit')
@section('content')

<div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Care Products Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.snowProduct.update',$SnowProducts->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >

                    @csrf
                    @method('PUT')

                    <label for="" >
                        <select name="snow_product_brand" id="" class="form-control">

                        @foreach( $SnowBrands as $SnowBrand)
                            <option value="{{ $SnowBrand -> snow_brands }}">
                                {{ $SnowBrand->snow_brands }}
                            </option>
                        @endforeach
                        </select>

                    </label>
                    <label class="mt-5">
                        <input type="text" name="snow_product_title_am" value="{{ $SnowProducts->snow_product_title_am }}" id="name" required>
                        <div class="label-text">Snow Brushes Product Title Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="snow_product_title_ru" value="{{ $SnowProducts->snow_product_title_ru }}" id="name" required>
                        <div class="label-text">Snow Brushes Product Title Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="snow_product_title_en" value="{{ $SnowProducts->snow_product_title_en }}" id="name" required>
                        <div class="label-text">Snow Brushes Product Title Ru</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="snow_product_description_am" value="{{ $SnowProducts->snow_product_description_am }}" id="name" required>
                        <div class="label-text">Snow Brushes Product Description Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="snow_product_description_ru" value="{{ $SnowProducts->snow_product_description_ru }}" id="name" required>
                        <div class="label-text">Snow Brushes Product Description Ru</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="snow_product_description_en" value="{{ $SnowProducts->snow_product_description_en }}" id="name" required>
                        <div class="label-text">Snow Brushes Product Description En</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="snow_product_code" value="{{ $SnowProducts->snow_product_code }}" id="name" required>
                        <div class="label-text">Snow Brushes Product Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('image/'.$SnowProducts->snow_product_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="care_product_image"
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
