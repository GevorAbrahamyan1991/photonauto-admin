@extends('layouts.admin')
@section('title','Admin-About-Index')
@section('content')
    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12">
                <h3>About Page About US</h3>
                    <p class="text-light">Նախատեսված է մեր մասին բաժնի համար , եթե LOCATION ը ընտրեք For Home Page ,
                        ապա ձեր ավելացրածը ցույց կտա գլխավոր էջում , իսկ եթե ըտրեք For About Page ապա ձեր ընտրածը ցույց կտա About էջում: </p>
            </div>
            <div class="col-md-12 mt-5">
                <form
                    action="{{ route('admin.about.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                @csrf
                    <label>
                        <select name="location" id="">
                            <option value=""></option>
                            <option value="home_page">For Home Page</option>
                            <option value="about_page">For About Page</option>
                            <option value="about_footer">For Footer</option>
                        </select>
                        <div class="label-text">Location</div>
                    </label>
                    <label>
                        <input type="text" name="title_am" id="title_am" required>
                        <div class="label-text">Title AM</div>
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
                        <div class="label-text">Description AM</div>
                    </label>
                    <label>
                        <input type="text" name="description_ru" id="name" required>
                        <div class="label-text">Description Ru</div>
                    </label>
                    <label>
                        <input type="text" name="description_en" id="name" required>
                        <div class="label-text">Description En</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="about_images"
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
                        <th>ID</th>
                        <th>Location</th>
                        <th>Title Am</th>
                        <th>Title Ru</th>
                        <th>Title En</th>
                        <th>Description Am</th>
                        <th>Description Ru</th>
                        <th>Description En</th>
                        <th>Image</th>
                        <th>Operation</th>
                    </thead>
                    <tbody>
                        @foreach($abouts as $about)
                            <tr>
                                <td>{{ $about->id }}</td>
                                <td>{{ $about->location }}</td>
                                <td>{{ $about->title_am }}</td>
                                <td>{{ $about->title_ru }}</td>
                                <td>{{ $about->title_en }}</td>
                                <td>{{ $about->description_am }}</td>
                                <td>{{ $about->description_ru }}</td>
                                <td>{{ $about->description_en }}</td>
                                <td>
                                    <img
                                        src="{{ asset('public/image/'.$about->about_images) }}"
                                        width="80px"
                                        height="80px"
                                        alt="img"
                                    >
                                </td>
                                <td>
                                    <a
                                        class="btn btn-info"
                                        href="{{ route('admin.about.edit',$about->id) }}"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{route('admin.about.delete' , $about->id) }}"
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
