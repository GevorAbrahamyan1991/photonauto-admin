@extends('layouts.admin')
@section('title','Fresh Page')
@section('content')
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
    <div class="container-fluid" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3 title="Avelacnum enq tuperi tesakner"> FRESHENERS ADD BRAND</h3>
            </div>
            <div class="col-md-12 border">
                <form
                    action="{{ route('admin.FreshBrand.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="fresh_brand" id="name" required>
                        <div class="label-text">FRESHENERS BRAND</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FRESHENERS BRAND</th>
                            <th>OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($FreshBrands as $FreshBrand)
                            <tr>
                                <td>{{ $FreshBrand->id }}</td>
                                <td>{{ $FreshBrand-> fresh_brand}}</td>
                                <td class="operations">
                                    <a
                                        class="btn btn-info"
                                        href="{{ route('admin.FreshBrandEdit.edit',$FreshBrand->id) }}"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{route('admin.FreshBrand.delete' , $FreshBrand->id) }}"
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
                <h3 title="Avelacnum enq hoteri tesakner">FRESHENERS ADD TYPE</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.FreshType.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="fresh_type" id="name" required>
                        <div class="label-text">FRESHENERS TYPE</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FRESH TYPE</th>
                            <th>OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($FreshTypes as $FreshType)
                        <tr>
                            <td>{{ $FreshType->id }}</td>
                            <td>{{ $FreshType->fresh_type}}</td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                                                            href="{{ route('admin.FreshTypeEdit.edit',$FreshType->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                                                            action="{{route('admin.FreshType.delete' , $FreshType->id) }}"
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
                <h3 title="Avelacnum enq hoteri tesakner">FRESHENERS ADD SMELL</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.FreshSmell.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="fresh_smell" id="name" required>
                        <div class="label-text">FRESHENERS SMELL</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>FRESH TYPE</th>
                        <th>OPERATIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($FreshSmells as $FreshSmell)
                        <tr>
                            <td>{{ $FreshSmell->id }}</td>
                            <td>{{ $FreshSmell->fresh_smell}}</td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                                                            href="{{ route('admin.FreshSmellEdit.edit',$FreshSmell->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                                                            action="{{route('admin.FreshSmell.delete' , $FreshSmell->id) }}"
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
                <h3 title="Avelacnum enq hoter">FRESHENERS ADD PRODUCT</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.FreshProduct.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label for="" >

                        <select name="fresh_product_brand" id="" class="form-control">

                            @foreach($FreshBrands as $FreshBrand)
                                <option value="{{ $FreshBrand->fresh_brand }}">
                                    {{ $FreshBrand->fresh_brand }}
                                </option>
                            @endforeach
                        </select>
                        <div class="label-text">FRESHENERS BRAND</div>
                    </label>
                    <label for="" >

                        <select name="fresh_product_type" id="" class="form-control">

                            @foreach($FreshTypes as $FreshType)
                                <option value="{{ $FreshType->fresh_type }}">
                                    {{ $FreshType->fresh_type }}
                                </option>
                            @endforeach
                        </select>
                        <div class="label-text">FRESHENERS TYPE</div>
                    </label>
                    <label for="" >

                        <select name="fresh_product_smell" id="" class="form-control">

                            @foreach($FreshSmells as $FreshSmell)
                                <option value="{{ $FreshSmell->fresh_smell }}">
                                    {{ $FreshSmell->fresh_smell }}
                                </option>
                            @endforeach
                        </select>
                        <div class="label-text">FRESHENERS SMELL</div>
                    </label>
                    <label>
                        <input type="text" name="fresh_product_title_am" id="name" required>
                        <div class="label-text">FRESHENERS PRODUCT TITLE AM</div>
                    </label>
                    <label>
                        <input type="text" name="fresh_product_title_ru" id="name" required>
                        <div class="label-text">FRESHENERS PRODUCT TITLE RU</div>
                    </label>
                    <label>
                        <input type="text" name="fresh_product_title_en" id="name" required>
                        <div class="label-text">FRESHENERS PRODUCT TITLE EN</div>
                    </label>
                    <label>
                        <input type="text" name="fresh_product_desc_am" id="name" required>
                        <div class="label-text">FRESHENERS PRODUCT DESCRIPTION AM</div>
                    </label>
                    <label>
                        <input type="text" name="fresh_product_desc_ru" id="name" required>
                        <div class="label-text">FRESHENERS PRODUCT DESCRIPTION RU</div>
                    </label>
                    <label>
                        <input type="text" name="fresh_product_desc_en" id="name" required>
                        <div class="label-text">FRESHENERS PRODUCT DESCRIPTION EN</div>
                    </label>
                    <label>
                        <input type="text" name="fresh_product_code" id="name" required>
                        <div class="label-text">FRESHENERS PRODUCT CODE</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="fresh_product_image"
                                id="image_carousel"
                                class="form-control"
                                hidden
                            >
                        </label>
                    </div>
                    <button type="submit" class="btn-dark ms-0 me-0 mt-3 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>FRESH PRODUCT BRAND</th>
                        <th>FRESH PRODUCT TYPE</th>
                        <th>FRESH PRODUCT SMELL</th>
                        <th>FRESH PRODUCT TITLE AM</th>
                        <th>FRESH PRODUCT TITLE RU</th>
                        <th>FRESH PRODUCT TITLE EN</th>
                        <th>FRESH PRODUCT DESC AM</th>
                        <th>FRESH PRODUCT DESC RU</th>
                        <th>FRESH PRODUCT DESC EN</th>
                        <th>FRESH PRODUCT CODE</th>
                        <th>FRESH PRODUCT IMAGE</th>
                        <th>OPERATIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($FreshProducts as $FreshProduct)
                        <tr>
                            <td>{{ $FreshProduct->id }}</td>
                            <td>{{ $FreshProduct->fresh_product_brand}}</td>
                            <td>{{ $FreshProduct->fresh_product_type}}</td>
                            <td>{{ $FreshProduct->fresh_product_smell}}</td>
                            <td>{{ $FreshProduct->fresh_product_title_am}}</td>
                            <td>{{ $FreshProduct->fresh_product_title_ru}}</td>
                            <td>{{ $FreshProduct->fresh_product_title_en}}</td>
                            <td>{{ $FreshProduct->fresh_product_desc_am}}</td>
                            <td>{{ $FreshProduct->fresh_product_desc_ru}}</td>
                            <td>{{ $FreshProduct->fresh_product_desc_en}}</td>
                            <td>{{ $FreshProduct->fresh_product_code}}</td>
                            <td>
                                <img
                                    src="{{ asset('image/'.$FreshProduct->fresh_product_image) }}"
                                    alt=""
                                    width="80px"
                                    height="80px"
                                />
                            </td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                    href="{{ route('admin.FreshProductEdit.edit',$FreshProduct->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                                                            action="{{route('admin.FreshProduct.delete' , $FreshProduct->id) }}"
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
