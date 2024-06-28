@extends('layouts.admin')
@section('title','Prenews Edid')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Product Page  Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.PreNews.update',$preNews -> id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label>
                        <input type="text" value="{{ $preNews ->pre_unique  }}" name="pre_unique" id="name" required>
                        <div class="label-text">Pre Unique</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $preNews -> desc_am }}" name="desc_am" id="name" required>
                        <div class="label-text">DESC AM</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $preNews -> desc_ru }}" name="desc_ru" id="name" required>
                        <div class="label-text">Desc RU</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $preNews -> desc_en }}" name="desc_en" id="name" required>
                        <div class="label-text">Desc EN</div>
                    </label>

                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('public/image/'.$preNews->pre_images) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="pre_images"
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
