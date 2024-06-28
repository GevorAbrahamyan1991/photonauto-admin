@extends('layouts.admin')
@section('title','Brushes')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="for_new_menu">
                    <li>
                        <a href="{{ route('admin.lamp.index') }}">Lamps</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.fresh.index') }}">Fresheners</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.brushes.index') }}">Glass Brushes</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.snow.index') }}">Snow Brushes</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.care.index') }}">Care</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.interier.index') }}">For Interior</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.brandsForHome.index') }}">For Home</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.brandsAmrak.index') }}">Clips</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<div class="container" id="home_admin_section_phone_email">
    <div class="row">
        <div class="col-md-12">
            <h3>Glass Brushes Brand</h3>
        </div>
        <div class="col-md-12">
            <form
                action="{{ route('admin.BrushesBrands.create') }}"
                method="POST"
                class="w-100"
                enctype="multipart/form-data"
            >
                @csrf
                <label>
                    <input type="text" name="brushes_brands" id="name" required>
                    <div class="label-text">Glass Brushes Brand</div>
                </label>
                <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
            </form>
        </div>
        <div class="col-md-12">
            <table width="100%" border="2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Brushes Brands</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($BrushesBrands as $BrushesBrand)
                    <tr>
                        <td>{{ $BrushesBrand->id }}</td>
                        <td>{{ $BrushesBrand->brushes_brands }}</td>
                        <td class="operations">
                            <a
                                class="btn btn-info"
                                 href="{{ route('admin.brushesEdit.index',$BrushesBrand->id) }}"
                            >
                                Edit
                            </a>

                            <form
                                 action="{{route('admin.BrushesBrand.delete' , $BrushesBrand->id) }}"
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
        <div class="col-md-12">
            <h3>Glass Brushes Type</h3>
        </div>
        <div class="col-md-12">
            <form
                action="{{ route('admin.BrushesType.create') }}"
                method="POST"
                class="w-100"
                enctype="multipart/form-data"
            >
                @csrf
                <label>
                    <input type="text" name="brushes_type" id="name" required>
                    <div class="label-text">Glass Brushes Type</div>
                </label>
                <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
            </form>
        </div>
        <div class="col-md-12">
            <table width="100%" border="2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Brushes Types</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($BrushesTypes as $BrushesType)
                    <tr>
                        <td>{{ $BrushesType->id }}</td>
                        <td>{{ $BrushesType->brushes_type}}</td>
                        <td class="operations">
                            <a
                                class="btn btn-info"
                                 href="{{ route('admin.brushesType.edit',$BrushesType->id) }}"
                            >
                                Edit
                            </a>

                            <form
                                 action="{{route('admin.BrushesType.delete' , $BrushesType->id) }}"
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
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container" id="home_admin_section_phone_email">
    <div class="row">
        <div class="col-md-12">
            <h3>Brushes Product</h3>


        </div>
        <div class="col-md-12">
            <form
                action="{{ route('admin.BrushesProduct.create') }}"
                method="POST"
                class="w-100"
                enctype="multipart/form-data"
            >
                @csrf
                <label for="" >

                    <select name="brushes_product_brand" id="" class="form-control">

                    @foreach($BrushesBrands as $BrushesBrand)
                        <option value="{{ $BrushesBrand->brushes_brands }}">
                            {{ $BrushesBrand->brushes_brands }}
                        </option>
                    @endforeach
                    </select>
                    <div class="label-text">Glass Brushes Brand</div>
                </label>
                <label for="" >
                    <select name="brushes_product_type" id="" class="form-control">

                    @foreach($BrushesTypes as $BrushesType)
                        <option value="{{ $BrushesType->brushes_type }}">
                            {{ $BrushesType->brushes_type }}
                        </option>
                    @endforeach
                    </select>
                    <div class="label-text">Glass Brushes Type</div>
                </label>
                <label>
                    <input type="text" name="brushes_product_title_am" id="name" required>
                    <div class="label-text">Glass Brushes Title Am</div>
                </label>
                <label>
                    <input type="text" name="brushes_product_title_ru" id="name" required>
                    <div class="label-text">Glass Brushes Title Ru</div>
                </label>
                <label>
                    <input type="text" name="brushes_product_title_en" id="name" required>
                    <div class="label-text">Glass Brushes Title En</div>
                </label>
                <label>
                    <input type="text" name="brushes_product_desc_am" id="name" required>
                    <div class="label-text">Glass Brushes Description En</div>
                </label>
                <label>
                    <input type="text" name="brushes_product_desc_ru" id="name" required>
                    <div class="label-text">Glass Brushes Description Ru</div>
                </label>
                <label>
                    <input type="text" name="brushes_product_desc_en" id="name" required>
                    <div class="label-text">Glass Brushes Description En</div>
                </label>
                <label>
                    <input type="text" name="brushes_product_size" id="name" required>
                    <div class="label-text">Glass Brushes Size</div>
                </label>
                <label>
                    <input type="text" name="brushes_product_code" id="name" required>
                    <div class="label-text">Glass Brushes Code</div>
                </label>
                <div class="text-center">
                    <label
                        for="image_carousel"
                        class=""
                    >
                        <i class="fas fa-download"></i>
                        <input
                            type="file"
                            name="brushes_product_image"
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
                        <th>Brushes Product Brand</th>
                        <th>Brushes Product Type</th>
                        <th>Brushes Product Title Am</th>
                        <th>Brushes Product Title Ru</th>
                        <th>Brushes Product Title En</th>
                        <th>Brushes Product Desc Am</th>
                        <th>Brushes Product Desc Ru</th>
                        <th>Brushes Product Desc EN</th>
                        <th>Brushes Product Size</th>
                        <th>Brushes Product Code</th>
                        <th>Brushes Product Image</th>
                        <th> Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($BrushesProducts as $BrushesProduct)
                        <tr>
                            <td>{{ $BrushesProduct->id }}</td>
                            <td>{{ $BrushesProduct->brushes_product_brand }}</td>
                            <td>{{ $BrushesProduct->brushes_product_type }}</td>
                            <td>{{ $BrushesProduct->brushes_product_title_am }}</td>
                            <td>{{ $BrushesProduct->brushes_product_title_ru }}</td>
                            <td>{{ $BrushesProduct->brushes_product_title_en }}</td>
                            <td>{{ $BrushesProduct->brushes_product_desc_am }}</td>
                            <td>{{ $BrushesProduct->brushes_product_desc_ru }}</td>
                            <td>{{ $BrushesProduct->brushes_product_desc_en }}</td>
                            <td>{{ $BrushesProduct->brushes_product_size }}</td>
                            <td>{{ $BrushesProduct->brushes_product_code }}</td>
                            <td >
                                <img
                                    src="{{ asset('image/'.$BrushesProduct->brushes_product_image) }}"
                                    alt=""
                                    width="80px"
                                    height="80px"
                                />
                            </td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                    href="{{ route('admin.brushesProduct.edit',$BrushesProduct->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{route('admin.BrushesProduct.delete' , $BrushesProduct->id) }}"
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
