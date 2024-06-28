@extends('layouts.admin')
@section('title','Brushes Type Edit')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Glass Brushes  Type Edit</h3>
            </div>
            <div class="col-md-12 mt-5">
                <form
                    action="{{ route('admin.BrushesType.update',$BrushesTypes->id) }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label>
                        <input type="text" value="{{ $BrushesTypes->brushes_type }}" name="brushes_type" id="name" required>
                        <div class="label-text">Glass Brushes Type</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
        </div>
    </div>
@endsection
