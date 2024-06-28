@extends('layouts.admin')
@section('title','Snow Brushes')
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
            <h3>Snow Brushes Brand</h3>
        </div>
        <div class="col-md-12">
            <form
                action="{{ route('admin.SnowBrands.create') }}"
                method="POST"
                class="w-100"
                enctype="multipart/form-data"
            >
                @csrf
                <label>
                    <input type="text" name="snow_brands" id="name" required>
                    <div class="label-text">Snow Brushes Brand</div>
                </label>
                <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
            </form>
        </div>
        <div class="col-md-12">
            <table width="100%" border="2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Snow Brands</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($SnowBrands as $SnowBrand)
                    <tr>
                        <td>{{ $SnowBrand -> id }}</td>
                        <td>{{ $SnowBrand -> snow_brands }}</td>
                        <td class="operations">
                            <a
                                class="btn btn-info"
                                href="{{ route('admin.snowBrand.edit',$SnowBrand->id) }}"
                            >
                                Edit
                            </a>

                            <form
                                action="{{route('admin.snowBrand.delete' , $SnowBrand->id) }}"
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
<div class="container" id="home_admin_section_phone_email">
    <div class="row">
        <div class="col-md-12">
            <h3>Care Product</h3>
        </div>
        <div class="col-md-12">
            <form
                action="{{ route('admin.snowProduct.create') }}"
                method="POST"
                class="w-100"
                enctype="multipart/form-data"
            >
                @csrf
                <label for="" >
                    <select name="snow_product_brand" id="" class="form-control">

                    @foreach($SnowBrands as $SnowBrands)
                        <option value="{{ $SnowBrands -> snow_brands }}">
                            {{ $SnowBrands->snow_brands }}
                        </option>
                    @endforeach
                    </select>

                </label>
                <label class="mt-5">
                    <input type="text" name="snow_product_title_am" id="name" required>
                    <div class="label-text">Snow Products Title Am</div>
                </label>
                <label>
                    <input type="text" name="snow_product_title_ru" id="name" required>
                    <div class="label-text">Snow Products Title Ru</div>
                </label>
                <label>
                    <input type="text" name="snow_product_title_en" id="name" required>
                    <div class="label-text">Snow Products Title En</div>
                </label>
                <label>
                    <input type="text" name="snow_product_description_am" id="name" required>
                    <div class="label-text">Snow Products Description Am</div>
                </label>
                <label>
                    <input type="text" name="snow_product_description_ru" id="name" required>
                    <div class="label-text">Snow Products Description Ru</div>
                </label>
                <label>
                    <input type="text" name="snow_product_description_en" id="name" required>
                    <div class="label-text">Snow Products Description En</div>
                </label>
                <label>
                    <input type="text" name="snow_product_code" id="name" required>
                    <div class="label-text">Snow Products Code</div>
                </label>
                <div class="text-center">
                    <label
                        for="image_carousel"
                        class=""
                    >
                        <i class="fas fa-download"></i>
                        <input
                            type="file"
                            name="snow_product_image"
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
                        <th>Snow Brushes Product Brand</th>
                        <th>Snow Brushes Product Title Am</th>
                        <th>Snow Brushes Product Title Ru</th>
                        <th>Snow Brushes Product Title En</th>
                        <th>Snow Brushes Product Description Am</th>
                        <th>Snow Brushes Product Description Ru</th>
                        <th>Snow Brushes Product Description En</th>
                        <th>Snow Brushes Product Code</th>
                        <th>Snow Brushes Product Image</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($SnowProducts as $SnowProduct)
                        <tr>
                            <td>{{ $SnowProduct->id }}</td>
                            <td>{{ $SnowProduct->snow_product_brand }}</td>
                            <td>{{ $SnowProduct->snow_product_title_am }}</td>
                            <td>{{ $SnowProduct->snow_product_title_ru }}</td>
                            <td>{{ $SnowProduct->snow_product_title_en }}</td>
                            <td>{{ $SnowProduct->snow_product_description_am }}</td>
                            <td>{{ $SnowProduct->snow_product_description_ru }}</td>
                            <td>{{ $SnowProduct->snow_product_description_en }}</td>
                            <td>{{ $SnowProduct->snow_product_code }}</td>
                            <td >
                                <img
                                    src="{{ asset('image/'.$SnowProduct->snow_product_image) }}"
                                    alt=""
                                    width="80px"
                                    height="80px"
                                >
                            </td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                   href="{{ route('admin.snowProduct.edit',$SnowProduct->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                   action="{{route('admin.snowProduct.delete' , $SnowProduct->id) }}"
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
