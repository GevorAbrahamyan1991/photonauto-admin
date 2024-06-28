@extends('layouts.admin')
@section('title','Partners-Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Partners  Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.partners.update',$partners->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label>
                        <select name="location" id="">
                            @foreach ($regions as $item)
                            <option value="{{ $item->region_en }}" {{ $item->region_en == $selectedRegion ? 'selected' : '' }}>
                                {{ $item->region_ru }}
                            </option>
                            @endforeach
                        </select>
                    <div class="label-text">Location</div>
                </label>
                    <label>
                        <input type="text" value="{{ $partners->title_am}}" name="title_am" id="title_am">
                        <div class="label-text">Title AM</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $partners->title_ru}}" name="title_ru" id="title_am">
                        <div class="label-text">Title RU</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $partners->title_en}}" name="title_en" id="title_am">
                        <div class="label-text">Title EN</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $partners->address_am}}" name="address_am" id="title_am">
                        <div class="label-text">Address AM</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $partners->address_ru}}" name="address_ru" id="name">
                        <div class="label-text">Address Ru</div>
                    </label>
                    <label>
                        <input type="text" name="address_en" value="{{ $partners->address_en}}" id="name">
                        <div class="label-text">Address En</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('public/image/'.$partners->partner_image) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="partner_image"
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
