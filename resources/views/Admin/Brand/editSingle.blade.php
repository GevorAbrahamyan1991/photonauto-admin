@extends('layouts.admin')
@section('title','Single Brand')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 text-center" style="color: #f4f93d; font-size: 26px">
                Brand Single  Page Edit
            </div>
            <div class="col-md-12">
                <div class="col-md-12">
                    <form
                        action="{{ route('admin.SingleBrand.updateSingle' , $brandSingles->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')
                        <label class="mt-5">
                            <input type="text" name="brand_name" value="{{ $brandSingles -> brand_name }}" id="name" required>
                            <div class="label-text">Brand Name</div>
                        </label>
                        <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                            Description AM
                            <textarea name="desc_am" id="" value="" cols="60" rows="3">
                                {{ $brandSingles -> desc_am }}
                            </textarea>
                        </label>
                        <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                            Description RU
                            <textarea name="desc_ru" id="" cols="60" rows="3">
                                {{ $brandSingles -> desc_ru }}
                            </textarea>
                        </label>
                        <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                            Description EN
                            <textarea name="desc_en" id="" cols="60" rows="3">
                                {{ $brandSingles -> desc_en }}
                            </textarea>
                        </label>
                        <label class="mt-5">
                            <input type="text" name="brand_unique" value="{{  $brandSingles -> brand_unique  }}" id="name" required>
                            <div class="label-text">Brand Unique</div>
                        </label>
                        <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
