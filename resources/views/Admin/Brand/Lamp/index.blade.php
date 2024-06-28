@extends('layouts.admin')
@section('title','Lamp Page')
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
                <h3>Lamps Brand</h3>
            </div>
            <div class="col-md-12 mt-5">
                <form
                    action="{{ route('admin.LampBrand.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                @csrf
                    <label>
                        <input type="text" name="lamp_brand" id="name" required>
                        <div class="label-text">LAMPS BRAND</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>LAMP BRAND</th>
                        <th>OPERATIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($LampBrands as $LampBrand)
                        <tr>
                            <td>{{ $LampBrand->id }}</td>
                            <td>{{ $LampBrand-> lamp_brand}}</td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                    href="{{ route('admin.brand.edit',$LampBrand->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{route('admin.LampBrand.delete' , $LampBrand->id) }}"
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
            <div class="col-md-12 mt-5">
                <form
                    action="{{ route('admin.LampType.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                @csrf
                    <label>
                        <input type="text" name="lamp_type" id="name" required>
                        <div class="label-text">LAMPS TYPE</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>LAMP BRAND</th>
                        <th>OPERATIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($LampTypes as $LampType)
                        <tr>
                            <td>{{ $LampType->id }}</td>
                            <td>{{ $LampType-> lamp_type}}</td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                    href="{{ route('admin.type.edit',$LampType->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{route('admin.LampType.delete' , $LampType->id) }}"
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
            <div class="col-md-12 mt-5">
                <form
                    action="{{ route('admin.LampSlot.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                @csrf
                    <label>
                        <input type="text" name="lamp_slot" id="name" required>
                        <div class="label-text">LAMPS SLOT</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>LAMP SLOT</th>
                        <th>OPERATIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($LampSlots as $LampSlot)
                        <tr>
                            <td>{{ $LampSlot->id }}</td>
                            <td>{{ $LampSlot-> lamp_slot}}</td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                    href="{{ route('admin.slot.edit',$LampSlot->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{route('admin.LampSlot.delete' , $LampSlot->id) }}"
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
                <h3>Lamps Brand</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.LampProduct.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                @csrf
                    <label for="" >

                        <select name="lamp_product_brand" id="" class="form-control">

                            @foreach($LampBrands as $LampBrand)
                                <option value="{{ $LampBrand->lamp_brand }}">
                                    {{ $LampBrand->lamp_brand }}
                                </option>
                            @endforeach
                        </select>
                        <div class="label-text">LAMPS BRAND</div>
                    </label>
                    <label for="" >

                        <select name="lamp_product_type" id="" class="form-control">

                            @foreach($LampTypes as $LampType)
                                <option value="{{ $LampType->lamp_type }}">
                                    {{ $LampType->lamp_type }}
                                </option>
                            @endforeach
                        </select>
                        <div class="label-text">LAMPS TYPE</div>
                    </label>
                    <label for="" >

                        <select name="lamp_product_slot" id="" class="form-control">

                            @foreach($LampSlots as $LampSlot)
                                <option value="{{ $LampSlot->lamp_slot }}">
                                    {{ $LampSlot->lamp_slot }}
                                </option>
                            @endforeach
                        </select>
                        <div class="label-text">LAMPS SLOT</div>
                    </label>
                    <label>
                        <input type="text" name="lamp_product_title_am" id="name" required>
                        <div class="label-text">LAMP PRODUCT TITLE AM</div>
                    </label>
                    <label>
                        <input type="text" name="lamp_product_title_ru" id="name" required>
                        <div class="label-text">LAMP PRODUCT TITLE RU</div>
                    </label>
                    <label>
                        <input type="text" name="lamp_product_title_en" id="name" required>
                        <div class="label-text">LAMP PRODUCT TITLE EN</div>
                    </label>
                    <label>
                        <input type="text" name="lamp_product_desc_am" id="name" required>
                        <div class="label-text">LAMP PRODUCT DESCRIPTION AM</div>
                    </label>
                    <label>
                        <input type="text" name="lamp_product_desc_ru" id="name" required>
                        <div class="label-text">LAMP PRODUCT DESCRIPTION RU</div>
                    </label>
                    <label>
                        <input type="text" name="lamp_product_desc_en" id="name" required>
                        <div class="label-text">LAMP PRODUCT DESCRIPTION EN</div>
                    </label>
                    <label>
                        <input type="text" name="lamp_product_code" id="name" required>
                        <div class="label-text">LAMP PRODUCT CODE</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="lamp_product_image"
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
                        <th>LAMP  BRAND</th>
                        <th>LAMP  TYPE</th>
                        <th>LAMP  SLOT</th>
                        <th>LAMP  TITLE AM</th>
                        <th>LAMP  TITLE RU</th>
                        <th>LAMP  TITLE EN</th>
                        <th>LAMP  DESCRIPTION AM</th>
                        <th>LAMP  DESCRIPTION RU</th>
                        <th>LAMP  DESCRIPTION EN</th>
                        <th>LAMP  CODE</th>
                        <th>LAMP  IMAGE</th>
                        <th>OPERATIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($LampProducts as $LampProduct)
                        <tr>
                            <td>{{ $LampProduct->id }}</td>
                            <td>{{ $LampProduct->lamp_product_brand }}</td>
                            <td>{{ $LampProduct->lamp_product_type }}</td>
                            <td>{{ $LampProduct->lamp_product_slot }}</td>
                            <td>{{ $LampProduct->lamp_product_title_am}}</td>
                            <td>{{ $LampProduct->lamp_product_title_ru}}</td>
                            <td>{{ $LampProduct->lamp_product_title_en}}</td>
                            <td>{{ $LampProduct->lamp_product_desc_am}}</td>
                            <td>{{ $LampProduct->lamp_product_desc_ru}}</td>
                            <td>{{ $LampProduct->lamp_product_desc_en}}</td>
                            <td>{{ $LampProduct->lamp_product_code}}</td>
                            <td>
                                <img
                                    src="{{ asset('image/'.$LampProduct->lamp_product_image) }}"
                                    alt=""
                                    width="80px"
                                    height="80px"
                                />
                            </td>
                            <td class="operations">
                                <a
                                    class="btn btn-info"
                                    href="{{ route('admin.product.edit',$LampProduct->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{route('admin.LampProduct.delete' , $LampProduct->id) }}"
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
