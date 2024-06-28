@extends('layouts.admin')
@section('title','FRESHENERS PRODUCT EDIT')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Glass Brushes  Product Edit</h3>
            </div>
            <div class="col-md-12">
                <div class="col-md-12 mt-5">
                    <form
                        action="{{ route('admin.FreshProduct.update',$FreshProducts->id) }}"
                        method="POST"
                        class="w-100"
                        enctype="multipart/form-data"
                    >
                    @csrf
                    @method('PUT')
                        <label for="" >
                            <select name="fresh_product_brand" id="" class="form-control">

                                @foreach( $FreshBrands as $FreshBrand)
                                    <option value="{{ $FreshBrand->fresh_brand }}">
                                        {{ $FreshBrand->fresh_brand }}
                                    </option>
                                @endforeach
                            </select>

                        </label>
                        <label for="" >
                            <select name="fresh_product_type" id="" class="form-control">

                                @foreach( $FreshTypes as $FreshType)
                                    <option value="{{ $FreshType->fresh_type }}">
                                        {{ $FreshType->fresh_type }}
                                    </option>
                                @endforeach
                            </select>

                        </label>
                        <label for="" >
                            <select name="fresh_product_smell" id="" class="form-control">

                                @foreach( $FreshSmells as $FreshSmell)
                                    <option value="{{ $FreshSmell->fresh_smell }}">
                                        {{ $FreshSmell->fresh_smell }}
                                    </option>
                                @endforeach
                            </select>

                        </label>
                        <label class="mt-5">
                            <input type="text" value="{{ $FreshProducts->fresh_product_title_am }}" name="fresh_product_title_am" id="name" required>
                            <div class="label-text">FRESHENERS Products Title Am</div>
                        </label>
                        <label class="mt-5">
                            <input type="text" value="{{ $FreshProducts->fresh_product_title_ru }}" name="fresh_product_title_ru" id="name" required>
                            <div class="label-text">FRESHENERS Products Title Ru</div>
                        </label>
                        <label class="mt-5">
                            <input type="text" value="{{ $FreshProducts->fresh_product_title_en }}" name="fresh_product_title_en" id="name" required>
                            <div class="label-text">FRESHENERS Products Title En</div>
                        </label>
                        <label class="mt-5">
                            <input type="text" value="{{ $FreshProducts->fresh_product_desc_am }}" name="fresh_product_desc_am" id="name" required>
                            <div class="label-text">FRESHENERS Products Description Am</div>
                        </label>
                        <label class="mt-5">
                            <input type="text" value="{{ $FreshProducts->fresh_product_desc_ru }}" name="fresh_product_desc_ru" id="name" required>
                            <div class="label-text">FRESHENERS Products Description Ru</div>
                        </label>
                        <label class="mt-5">
                            <input type="text" value="{{ $FreshProducts->fresh_product_desc_en }}" name="fresh_product_desc_en" id="name" required>
                            <div class="label-text">FRESHENERS Products Description En</div>
                        </label>
                        <label class="mt-5">
                            <input type="text" value="{{ $FreshProducts->fresh_product_code }}" name="fresh_product_code" id="name" required>
                            <div class="label-text">FRESHENERS Products Code</div>
                        </label>
                        <div class="text-center">
                            <label
                                for="img"
                                class=""
                            >
                                <img
                                    src="{{ asset('image/'.$FreshProducts->fresh_product_image) }}"
                                    width="150px"
                                    height="150px"
                                    class="img-fluid"
                                    id="preview"
                                    alt="">
                                <input
                                    type="file"
                                    name="fresh_product_image"
                                    id="img"
                                    class="form-control"
                                    hidden
                                >
                            </label>
                        </div>
                        <button type="submit" class="btn-dark mt-5 ms-0 me-0 form-control">ADD</button>
                    </form>
                </div>
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
