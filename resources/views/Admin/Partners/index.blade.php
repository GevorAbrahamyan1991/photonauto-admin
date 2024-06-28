@extends('layouts.admin')
@section('title', 'Product-Admin')
@section('content')
    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                Partners Page
                <p class="text-light">
                    Այս բաժնում ավելացնոում եք գործընկերների մարզեր
                </p>
            </div>
            <div class="col-md-12">
                <form action="{{ route('admin.partnersRegions.create') }}" method="POST" class="w-100"
                    enctype="multipart/form-data">
                    @csrf
                    <label>
                        <input type="text" name="region_am" id="name" required>
                        <div class="label-text">Region Am</div>
                    </label>
                    <label>
                        <input type="text" name="region_ru" id="name" required>
                        <div class="label-text">Region Ru</div>
                    </label>
                    <label>
                        <input type="text" name="region_en" id="name" required>
                        <div class="label-text">Region En</div>
                    </label>

                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>

                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Region AM</th>
                            <th>Region RU</th>
                            <th>Region EN</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regions as $region)
                            <tr>
                                <td>{{ $region->id }}</td>
                                <td>{{ $region->region_am }}</td>
                                <td>{{ $region->region_ru }}</td>
                                <td>{{ $region->region_en }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.partnersRegions.edit', $region->id) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.partnersRegions.delete', $region->id) }}" method="POST"
                                        enctype="multipart/form-data">

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
    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                Partners Page
                <p class="text-light">
                    Այս բաժնում ավելացնոում եք գործընկերներ
                </p>
            </div>
            <div class="col-md-12">
                <form action="{{ route('admin.partners.create') }}" method="POST" class="w-100"
                    enctype="multipart/form-data">
                    @csrf
                    <label>
                            <select name="location" id="">
                                @foreach ($regions as $item)
                                    <option value="{{ $item->region_en }}">{{ $item->region_ru }}</option>
                                @endforeach
                            </select>
                        <div class="label-text">Location</div>
                    </label>
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
                        <input type="text" name="address_am" id="name" required>
                        <div class="label-text">Address Am</div>
                    </label>
                    <label>
                        <input type="text" name="address_ru" id="name" required>
                        <div class="label-text">Address Ru</div>
                    </label>
                    <label>
                        <input type="text" name="address_en" id="name" required>
                        <div class="label-text">Address En</div>
                    </label>
                    <div class="text-center">
                        <label for="image_carousel" class="">
                            <i class="fas fa-download"></i> 1
                            <input type="file" name="partner_image" id="image_carousel" class="form-control" hidden>
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
                            <th>Location</th>
                            <th>Title AM</th>
                            <th>Title RU</th>
                            <th>Title EN</th>
                            <th>Address AM</th>
                            <th>Address Ru</th>
                            <th>Address EN</th>
                            <th>Image</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $partner)
                            <tr>
                                <td>{{ $partner->id }}</td>
                                <td>{{ $partner->location }}</td>
                                <td>{{ $partner->title_am }}</td>
                                <td>{{ $partner->title_ru }}</td>
                                <td>{{ $partner->title_en }}</td>
                                <td>{{ $partner->address_am }}</td>
                                <td>{{ $partner->address_ru }}</td>
                                <td>{{ $partner->address_en }}</td>
                                <td>
                                    <img src="{{ asset('public/image/' . $partner->partner_image) }}" width="150px"
                                        height="150px" class="img-fluid" alt="{{ $partner->title_en }}">
                                </td>

                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.partners.edit', $partner->id) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.partners.delete', $partner->id) }}" method="POST"
                                        enctype="multipart/form-data">

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
    <div class="container py-5" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                Become Partners Page Description
            </div>
        </div>
        <div class="col-md-12">
            <form action="{{ route('admin.partnersText.create') }}" method="POST" class="w-100"
                enctype="multipart/form-data">
                @csrf
            
                <label>
                    <input type="text" name="desc_am" id="name" required>
                    <div class="label-text">Description Am</div>
                </label>
                <label>
                    <input type="text" name="desc_ru" id="name" required>
                    <div class="label-text">Description Ru</div>
                </label>
                <label>
                    <input type="text" name="desc_en" id="name" required>
                    <div class="label-text">Description En</div>
                </label>
                <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
            </form>
        </div>
        <div class="col-md-12">
            <table width="100%">
                <thead>
                    <th>ID</th>
                    <th>DESC AM</th>
                    <th>DESC RU</th>
                    <th>DESC EN</th>
                    <th>OPERATIONS</th>
                </thead>
                <tbody>
                    @foreach ($partnerTexts as $partnerText)
                        <tr>
                            <td>{{ $partnerText->id }}</td>
                            <td>{{ $partnerText->desc_am }}</td>
                            <td>{{ $partnerText->desc_ru }}</td>
                            <td>{{ $partnerText->desc_en }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.partnersText.edit', $partnerText->id) }}">
                                    Edit
                                </a>

                                <form action="{{ route('admin.partnersText.delete', $partnerText->id) }}" method="POST"
                                    enctype="multipart/form-data">

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

@endsection()
