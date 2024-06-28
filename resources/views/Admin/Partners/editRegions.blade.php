@extends('layouts.admin')
@section('title', 'Edit Partner Region')
@section('content')
<div class="container py-5" id="home_admin_section_phone_email">
    <div class="row">
        <div class="col-md-12">
            <form
                action="{{ route('admin.partnersRegions.update' , ['id' => $regions->id]) }}"
                method="POST"
                class="w-100"
                enctype="multipart/form-data"
            >
            @method("PUT")
                @csrf
                <label>
                    <input type="text" name="region_am" value="{{ $regions->region_am }}" id="name">
                    <div class="label-text">Region Am</div>
                </label>
                <label>
                    <input type="text" name="region_ru" value="{{ $regions->region_ru }}" id="name">
                    <div class="label-text">Region Ru</div>
                </label>
                <label>
                    <input type="text" name="region_en" value="{{ $regions->region_en }}" id="name">
                    <div class="label-text">Region En</div>
                </label>

                <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>

            </form>
        </div>
    </div>
</div>
@endsection