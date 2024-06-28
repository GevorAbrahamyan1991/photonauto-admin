@extends('layouts.admin')
@section('title','Snow Brushes Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Care Brand Edit</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.snow.update',$SnowBrands->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                @csrf
                @method('PUT')
                    <label>
                        <input type="text" value="{{ $SnowBrands->snow_brands}}" name="snow_brands" id="name" required>
                        <div class="label-text">Snow Brushes Brand</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>
@endsection
