@extends('layouts.admin')
@section('title','Partner Text Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Partners  Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.partnersText.update',$partnerTexts->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    <label>
                        <input type="text" value="{{ $partnerTexts->desc_am}}" name="desc_am" id="title_am" required>
                        <div class="label-text">Title AM</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $partnerTexts->desc_ru}}" name="desc_ru" id="title_am" required>
                        <div class="label-text">Title RU</div>
                    </label>
                    <label>
                        <input type="text" value="{{ $partnerTexts->desc_en}}" name="desc_en" id="title_am" required>
                        <div class="label-text">Title EN</div>
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
