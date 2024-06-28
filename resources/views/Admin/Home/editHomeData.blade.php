@extends('layouts.admin')
@section('title','Home-Data-Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Home Page Brand Pictures Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.updateHomeData.update',$homeDatas->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    {{--                        {{ $HomeBrandImage->title }}--}}
                    <label>
                        <input type="text" name="tel" value="{{ $homeDatas->tel }}" id="name" required>
                        <div class="label-text">Tel</div>
                    </label>
                    <label>
                        <input type="email" name="email" value="{{ $homeDatas->email }}" id="name" required>
                        <div class="label-text">Email</div>
                    </label>
                    <label>
                        <input type="text" name="address_am" value="{{ $homeDatas->address_am }}" id="name" required>
                        <div class="label-text">Address Am</div>
                    </label>
                    <label>
                        <input type="text" name="address_ru" value="{{ $homeDatas->address_ru }}" id="name" required>
                        <div class="label-text">Address Ru</div>
                    </label>
                    <label>
                        <input type="text" name="address_en" value="{{ $homeDatas->address_en }}" id="name" required>
                        <div class="label-text">Address En</div>
                    </label>
                    <label>
                        <input type="text" name="insta_link" value="{{ $homeDatas->insta_link }}" id="name" required>
                        <div class="label-text">Insta Link</div>
                    </label>
                    <label>
                        <input type="text" name="face_link" value="{{ $homeDatas->face_link }}" id="name" required>
                        <div class="label-text">Face Link</div>
                    </label>
                    <label>
                        <input type="text" name="youtube_link" value="{{ $homeDatas->youtube_link }}" id="name" required>
                        <div class="label-text">Youtube Link</div>
                    </label>
                    <label>
                        <input type="text" name="telegram_link" value="{{ $homeDatas->telegram_link }}" id="name">
                        <div class="label-text">Telegram Link</div>
                    </label>
                    <label>
                        <input type="text" name="vk_link" value="{{ $homeDatas->vk_link }}" id="name">
                        <div class="label-text">Vk Link</div>
                    </label>

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
