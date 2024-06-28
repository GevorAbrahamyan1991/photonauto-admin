@extends('layouts.admin')
@section('title','Edit Brand')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 text-center" style="color: #f4f93d; font-size: 26px">
                Brand Page Edit
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.NewBrand.update',$newBrands->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                        Description AM
                        <textarea name="desc_am"  id="" cols="60" rows="3">
                            {{ $newBrands->desc_am }}
                        </textarea>
                    </label>
                    <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                        Description RU
                        <textarea name="desc_ru" id="" cols="60" rows="3">
                            {{ $newBrands->desc_ru }}
                        </textarea>
                    </label>
                    <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                        Description EN
                        <textarea name="desc_en" id="" cols="60" rows="3">
                            {{ $newBrands->desc_en }}
                        </textarea>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>
@endsection
