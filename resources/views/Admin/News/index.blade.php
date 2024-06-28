@extends('layouts.admin')
@section('title','News-Page')
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
        <div class="row">
            <div class="col-md-12">
                <h3>News Page </h3>
                <p class="text-light">
                    Այս բաժնում ավելացնոում եք նորություններ
                </p>
            </div>
{{--            <div class="col-md-12">--}}
{{--                <form--}}
{{--                    action="{{ route('news.search') }}"--}}
{{--                    method="GET"--}}
{{--                >--}}
{{--                    <input type="text" name="search" class="form-control">--}}
{{--                    <button type="submit"  class="btn-dark text-light form-control">Search</button>--}}
{{--                </form>--}}
{{--            </div>--}}
            <div class="col-md-12">
                <form
                    action="{{ route('admin.news.create') }}"
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
                        <input type="text" name="news_unqiue" id="name" required>
                        <div class="label-text">News Unique</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="news_images"
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
                            <th>Title AM</th>
                            <th>Title RU</th>
                            <th>Title EN</th>
                            <th>Description AM</th>
                            <th>Description RU</th>
                            <th>Description EN</th>
                            <th>Image</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $new)
                            <tr>
                                <th>{{ $new -> id }}</th>
                                <th>{{ $new -> title_am }}</th>
                                <th>{{ $new -> title_ru }}</th>
                                <th>{{ $new -> title_en }}</th>
                                <th>{{ $new -> description_am }}</th>
                                <th>{{ $new -> description_ru }}</th>
                                <th>{{ $new -> description_en }}</th>
                                <td>
                                    <img
                                        src="{{ asset('public/image/'.$new->news_images)}}"
                                        width="150px"
                                        height="150px"
                                        class="img-fluid"
                                        alt="{{ $new ->title_en }}"
                                    >
                                </td>
                                <td>
                                    <a
                                        class="btn btn-info"
                                        href="{{ route('admin.news.edit',$new->id) }}"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{route('admin.news.delete' , $new->id) }}"
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
