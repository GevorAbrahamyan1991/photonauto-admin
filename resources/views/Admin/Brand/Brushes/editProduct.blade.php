@extends('layouts.admin')
@section('title','Brushes Product Eit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Glass Brushes  Product Edit</h3>
            </div>
            <div class="col-md-12 mt-5">
                <form
                    action="{{ route('admin.BrushesProduct.update',$BrushesProducts->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label for="" >
                        <select name="brushes_product_brand" id="" class="form-control">

                            @foreach( $BrushesBrands as $BrushesBrand)
                                <option value="{{ $BrushesBrand->brushes_brands }}">
                                    {{ $BrushesBrand->brushes_brands }}
                                </option>
                            @endforeach
                        </select>

                    </label>
                    <label for="" >
                        <select name="brushes_product_type" id="" class="form-control">

                            @foreach( $BrushesTypes as $BrushesType)
                                <option value="{{ $BrushesType->brushes_type }}">
                                    {{ $BrushesType->brushes_type }}
                                </option>
                            @endforeach
                        </select>

                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $BrushesProducts->brushes_product_title_am }}" name="brushes_product_title_am" id="name" required>
                        <div class="label-text">Brushes Products Title Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $BrushesProducts->brushes_product_title_ru }}" name="brushes_product_title_ru" id="name" required>
                        <div class="label-text">Brushes Products Title Ru</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $BrushesProducts->brushes_product_title_en }}" name="brushes_product_title_en" id="name" required>
                        <div class="label-text">Brushes Products Title EN</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $BrushesProducts->brushes_product_desc_am }}" name="brushes_product_desc_am" id="name" required>
                        <div class="label-text">Brushes Products Description Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $BrushesProducts->brushes_product_desc_ru }}" name="brushes_product_desc_ru" id="name" required>
                        <div class="label-text">Brushes Products Description Ru</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $BrushesProducts->brushes_product_desc_en }}" name="brushes_product_desc_en" id="name" required>
                        <div class="label-text">Brushes Products Description En</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $BrushesProducts->brushes_product_size }}" name="brushes_product_size" id="name" required>
                        <div class="label-text">Brushes Products Size</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $BrushesProducts->brushes_product_code }}" name="brushes_product_code" id="name" required>
                        <div class="label-text">Brushes Products Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('image/'.$BrushesProducts->brushes_product_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="brushes_product_image"
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
