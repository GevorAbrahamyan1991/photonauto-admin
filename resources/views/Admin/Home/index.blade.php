@extends('layouts.admin')
@section('title','Admin-Home-Index')
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

    <div class="container" id="home_admin_section_phone_email">
        {{-- <div class="row">
            <div class="col-md-12">
                <h3>Home Page Brand Pictures</h3>
                <p class="text-light">
                    Այս բաժնում ավելացնոում եք բրանդները , Title ը պետք է անպայման գրվի փոքրատառով
                </p>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.home.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="title" id="name" required>
                        <div class="label-text">Title</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="image"
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
                <div class="row">
                    <table width="100%" border="2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($home_brand_images as $home_brand_image)
                            <tr>
                                <td>{{ $home_brand_image->id }}</td>
                                <td>
                                    <img src="{{ asset('public/image/'.$home_brand_image->image ) }}" width="150px" height="150px" class="img-fluid" alt="">
                                </td>
                                <td>
                                    {{ $home_brand_image->title }}
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.home.edit',$home_brand_image->id) }}">Edit</a>

                                    <form
                                        action="{{route('admin.home.delete' , $home_brand_image->id) }}"
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
        </div> --}}
        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Home Page Carousel</h3>
                <p class="text-light">
                    Այս բաժնում ավելացնոում եք նկարներ գլխավոր էջի կառուսելի համար։
                </p>
            </div>

            <div class="col-md-12">
                <form
                    action="{{ route('carousel.createCarousel') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="text-center">
                        <label
                            for="image_carousels"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="carousel_images"
                                id="image_carousels"
                                class="form-control"
                                hidden
                            >
                        </label>
                    </div>
                    <div class="text-center mt-3">
                        <label for="aaa">
                            <input type="text" name="carousel_images_title" id="aaa" required>
                            <div class="label-text">Carousel Title</div>
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carousel_images as $carousel_image)

                            <tr>
                                <td>{{ $carousel_image -> id }}</td>
                                <td>
                                    <img
                                        src="{{ asset('public/image/'.$carousel_image->carousel_images)}}"
                                        width="150px"
                                        height="150px"
                                        class="img-fluid"
                                        alt="{{ $carousel_image->carousel_title }}">
                                </td>
                                <td>
                                    {{ $carousel_image -> carousel_images_title }}
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.homeCarousel.edit',$carousel_image->id) }}">Edit</a>

                                    <form
                                        action="{{route('admin.home.deleteCarousel' , $carousel_image->id) }}"
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
        <div class="row">
            <div class="col-md-12">
                <h3>Home Page Data</h3>
                <p class="text-light">
                    Այս բաժնում ավելացնոում եք ֆիրմայի մասին կոնտակտային տվյալներ։
                </p>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.home.createHomeDatas') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="tel" id="name" required>
                        <div class="label-text">Tel</div>
                    </label>
                    <label>
                        <input type="email" name="email" id="name" required>
                        <div class="label-text">Email</div>
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
                    <label>
                        <input type="text" name="insta_link" id="name" required>
                        <div class="label-text">Instagram Link</div>
                    </label>
                    <label>
                        <input type="text" name="face_link" id="name" required>
                        <div class="label-text">Facebook Link</div>
                    </label>
                    <label>
                        <input type="text" name="youtube_link" id="name" required>
                        <div class="label-text">YouTube Link</div>
                    </label>
                    <label>
                        <input type="text" name="telegram_link" id="name">
                        <div class="label-text">Telegram Link</div>
                    </label>
                    <label>
                        <input type="text" name="vk_link" id="name">
                        <div class="label-text">Vk Link</div>
                    </label>

                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%" border="2">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tel</th>
                        <th>Email</th>
                        <th>Address Am</th>
                        <th>Address Ru</th>
                        <th>Address En</th>
                        <th>Insta</th>
                        <th>Face</th>
                        <th>Youtube</th>
                        <th>Telegram</th>
                        <th>VK</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($homeDatas as $homeData)

                        <tr>
                            <td>{{ $homeData -> id }}</td>
                            <td>{{ $homeData->tel }}</td>
                            <td>{{ $homeData->email }}</td>
                            <td>{{ $homeData->address_am }}</td>
                            <td>{{ $homeData->address_ru }}</td>
                            <td>{{ $homeData->address_en }}</td>
                            <td>{{ $homeData->insta_link }}</td>
                            <td>{{ $homeData->face_link }}</td>
                            <td>{{ $homeData->youtube_link }}</td>
                            <td>{{ $homeData->telegram_link }}</td>
                            <td>{{ $homeData->vk_link }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.editHomeData.edit',$homeData->id) }}">Edit</a>

                                <form
                                    action="{{route('admin.home.deleteHomeData' , $homeData->id) }}"
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
