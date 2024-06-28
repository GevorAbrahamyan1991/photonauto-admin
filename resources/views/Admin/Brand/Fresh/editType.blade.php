@extends('layouts.admin')
@section('title','FRESHENERS TYPE EDIT')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>FRESHENERS TYPE EDIT</h3>
            </div>
            <div class="col-md-12 mt-5">
                <form
                                        action="{{ route('admin.FreshType.update',$FreshTypes->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label>
                        <input type="text" value="{{ $FreshTypes->fresh_type }}" name="fresh_type" id="name" required>
                        <div class="label-text">Fresh Type</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>
@endsection
