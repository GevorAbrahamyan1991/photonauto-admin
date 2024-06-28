@extends('layouts.admin')
@section('title','Admin-Product')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>Product Page </h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.product.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="title_am" id="name" required>
                        <div class="label-text">Title Am</div>
                    </label>
                    <label>
                        <input type="text" name="title_ru" id="name" required>
                        <div class="label-text">Title Ru</div>
                    </label>
                    <label>
                        <input type="text" name="title_en" id="name" required>
                        <div class="label-text">Title En</div>
                    </label>
                    <label>
                        <input type="text" name="description_am" id="name" required>
                        <div class="label-text">Description Am</div>
                    </label>
                    <label>
                        <input type="text" name="description_ru" id="name" required>
                        <div class="label-text">Description Ru</div>
                    </label>
                    <label>
                        <input type="text" name="description_en" id="name" required>
                        <div class="label-text">Description En</div>
                    </label>
                    <label>
                        <input type="text" name="code" id="name" required>
                        <div class="label-text">Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="product_pictures"
                                id="image_carousel"
                                class="form-control"
                                hidden
                            >
                        </label>
                    </div>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title Am</th>
                            <th>Title Ru</th>
                            <th>Title En</th>
                            <th>Description Am</th>
                            <th>Description Ru</th>
                            <th>Description En</th>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product -> id }}</td>
                                <td>{{ $product -> title_am }}</td>
                                <td>{{ $product -> title_ru }}</td>
                                <td>{{ $product -> title_en }}</td>
                                <td>{{ $product -> description_am }}</td>
                                <td>{{ $product -> description_ru }}</td>
                                <td>{{ $product -> description_en }}</td>
                                <td>{{ $product -> code }}</td>
                                <td>
                                    <img
                                        src="{{ asset('public/image/'.$product->product_pictures)}}"
                                        width="150px"
                                        height="150px"
                                        class="img-fluid"
                                        alt="{{ $product ->title_en }}"
                                    >
                                </td>
                                <td>
                                    <a
                                        class="btn btn-info"
                                        href="{{ route('admin.product.edit',$product->id) }}"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{route('admin.product.delete' , $product->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data"
                                    >

                                        @method('DELETE')

                                        @csrf



                                        <button type="submit" class="btn btn-danger del_btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
