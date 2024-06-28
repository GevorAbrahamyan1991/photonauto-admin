@extends('layouts.admin')
@section('title','Care Product Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Care Products Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.careproduct.update',$CareProducts->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label for="" >
                        <select name="care_product_brand" id="" class="form-control">

                        @foreach( $CareBrands as $CareBrand)
                            <option value="{{ $CareBrand -> care_brands }}">
                                {{ $CareBrand -> care_brands }}
                            </option>
                        @endforeach
                        </select>

                    </label>
                    <label class="mt-5">
                        <input type="text" name="care_product_title_am" value="{{ $CareProducts->care_product_title_am }}" id="name" required>
                        <div class="label-text">Care Product Title Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="care_product_title_ru" value="{{ $CareProducts->care_product_title_ru }}" id="name" required>
                        <div class="label-text">Care Product Title Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="care_product_title_en" value="{{ $CareProducts->care_product_title_en }}" id="name" required>
                        <div class="label-text">Care Product Title Ru</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="care_product_description_am" value="{{ $CareProducts->care_product_description_am }}" id="name" required>
                        <div class="label-text">Care Product Description Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="care_product_description_ru" value="{{ $CareProducts->care_product_description_ru }}" id="name" required>
                        <div class="label-text">Care Product Description Ru</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="care_product_description_en" value="{{ $CareProducts->care_product_description_en }}" id="name" required>
                        <div class="label-text">Care Product Description En</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="care_product_code" value="{{ $CareProducts->care_product_code }}" id="name" required>
                        <div class="label-text">Care Product Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('image/'.$CareProducts->care_product_image) }}"
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
