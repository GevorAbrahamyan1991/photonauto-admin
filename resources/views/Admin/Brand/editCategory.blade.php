@extends('layouts.admin')
@section('title','Brand Category Lists Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 text-center" style="color: #f4f93d; font-size: 26px">
                Brand Single  Category List Edit
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.CategoryLists.update',$brandCategoryLists->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label class="mt-5">
                        <input type="text" name="brand_unique" value="{{ $brandCategoryLists->brand_unique }}" id="name">
                        <div class="label-text">Brand Unique</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="category_list" value="{{ $brandCategoryLists->category_list }}"  id="name">
                        <div class="label-text">Category List</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="img"
                            class=""
                        >
                            <img
                                src="{{ asset('public/image/'.$brandCategoryLists->category_images) }}"
                                width="150px"
                                height="150px"
                                class="img-fluid"
                                id="preview"
                                alt="">
                            <input
                                type="file"
                                name="category_images"
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
