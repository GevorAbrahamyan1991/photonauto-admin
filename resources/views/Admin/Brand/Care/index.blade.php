@extends("layouts.admin")
@section('title','Care')
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
                <h3>Care Brand</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.care.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="care_brands" id="name" required>
                        <div class="label-text">Care Brand</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Care Brands</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($CareBrands as $CareBrand)
                        <tr>
                            <td>{{ $CareBrand -> id }}</td>
                            <td>{{ $CareBrand -> care_brands }}</td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                    href="{{ route('admin.care.edit',$CareBrand->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{route('admin.care.delete' , $CareBrand->id) }}"
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
{{--                <form action="{{ route('search') }}" method="GET">--}}
{{--                    <input type="text" name="search" required/>--}}
{{--                    <button type="submit">Search</button>--}}
{{--                </form>--}}
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.careProduct.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label for="" >
                        <select name="care_product_brand" id="" class="form-control">

                        @foreach($CareBrands as $CareBrand)
                            <option value="{{ $CareBrand -> care_brands }}">
                                {{ $CareBrand -> care_brands }}
                            </option>
                        @endforeach
                        </select>

                    </label>
                    <label class="mt-5">
                        <input type="text" name="care_product_title_am" id="name" required>
                        <div class="label-text">Care Products Title Am</div>
                    </label>
                    <label>
                        <input type="text" name="care_product_title_ru" id="name" required>
                        <div class="label-text">Care Products Title Ru</div>
                    </label>
                    <label>
                        <input type="text" name="care_product_title_en" id="name" required>
                        <div class="label-text">Care Products Title En</div>
                    </label>
                    <label>
                        <input type="text" name="care_product_description_am" id="name" required>
                        <div class="label-text">Care Products Description Am</div>
                    </label>
                    <label>
                        <input type="text" name="care_product_description_ru" id="name" required>
                        <div class="label-text">Care Products Description Ru</div>
                    </label>
                    <label>
                        <input type="text" name="care_product_description_en" id="name" required>
                        <div class="label-text">Care Products Description En</div>
                    </label>
                    <label>
                        <input type="text" name="care_product_code" id="name" required>
                        <div class="label-text">Care Products Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="care_product_image"
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
                            <th>Care Product Brand</th>
                            <th>Care Product Title Am</th>
                            <th>Care Product Title Ru</th>
                            <th>Care Product Title En</th>
                            <th>Care Product Description Am</th>
                            <th>Care Product Description Ru</th>
                            <th>Care Product Description En</th>
                            <th>Care Product Code</th>
                            <th>Care Product Image</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($CareProducts as $CareProduct)
                            <tr>
                                <td>{{ $CareProduct -> id }}</td>
                                <td>{{ $CareProduct -> care_product_brand }}</td>
                                <td>{{ $CareProduct -> care_product_title_am }}</td>
                                <td>{{ $CareProduct -> care_product_title_ru }}</td>
                                <td>{{ $CareProduct -> care_product_title_en }}</td>
                                <td>{{ $CareProduct -> care_product_description_am }}</td>
                                <td>{{ $CareProduct -> care_product_description_ru }}</td>
                                <td>{{ $CareProduct -> care_product_description_en }}</td>
                                <td>{{ $CareProduct -> care_product_code }}</td>
                                <td >
                                    <img
                                        src="{{ asset('image/'.$CareProduct->care_product_image) }}"
                                        alt=""
                                        width="80px"
                                        height="80px"
                                    >
                                </td>
                                <td class="operations">
                                    <a
                                        class="btn btn-info"
                                       href="{{ route('admin.careProduct.edit',$CareProduct->id) }}"
                                    >
                                        Edit
                                    </a>

                                    <form
                                       action="{{route('admin.careProduct.delete' , $CareProduct->id) }}"
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
