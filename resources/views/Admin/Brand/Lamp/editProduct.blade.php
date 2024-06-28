@extends('layouts.admin')
@section('title',"LAMP PRODUCT EDIT")
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>LAMP BRAND EDIT</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.LampProduct.update',$LampProducts->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                @csrf
                @method('PUT')
                    <label for="" >
                        <select name="lamp_product_brand" id="" class="form-control">

                            @foreach( $LampBrands as $LampBrand)
                                <option value="{{ $LampBrand->lamp_brand }}">
                                    {{ $LampBrand->lamp_brand }}
                                </option>
                            @endforeach
                        </select>

                    </label>
                    <label for="" >
                        <select name="lamp_product_type" id="" class="form-control">

                            @foreach( $LampTypes as $LampType)
                                <option value="{{ $LampType->lamp_type }}">
                                    {{ $LampType->lamp_type }}
                                </option>
                            @endforeach
                        </select>

                    </label>
                    <label for="" >
                        <select name="lamp_product_slot" id="" class="form-control">

                            @foreach( $LampSlots as $LampSlot)
                                <option value="{{ $LampSlot->lamp_slot }}">
                                    {{ $LampSlot->lamp_slot }}
                                </option>
                            @endforeach
                        </select>

                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $LampProducts->lamp_product_title_am }}" name="lamp_product_title_am" id="name" required>
                        <div class="label-text">LAMPS Products Title Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $LampProducts->lamp_product_title_ru }}" name="lamp_product_title_ru" id="name" required>
                        <div class="label-text">LAMPS Products Title Ru</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $LampProducts->lamp_product_title_en }}" name="lamp_product_title_en" id="name" required>
                        <div class="label-text">LAMPS Products Title En</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $LampProducts->lamp_product_desc_am }}" name="lamp_product_desc_am" id="name" required>
                        <div class="label-text">LAMPS Products Description Am</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $LampProducts->lamp_product_desc_ru }}" name="lamp_product_desc_ru" id="name" required>
                        <div class="label-text">LAMPS Products Description Ru</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $LampProducts->lamp_product_desc_en }}" name="lamp_product_desc_en" id="name" required>
                        <div class="label-text">LAMPS Products Description En</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" value="{{ $LampProducts->lamp_product_code }}" name="lamp_product_code" id="name" required>
                        <div class="label-text">LAMPS Products Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('image/'.$LampProducts->lamp_product_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="lamp_product_image"
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
