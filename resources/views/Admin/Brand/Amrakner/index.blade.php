@extends('layouts.admin')
@section('title','Brand => Amrakner')
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
                <h3>ADD CLIPS</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.brandClips.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="clips_title" id="name" required>
                        <div class="label-text">Clips Title</div>
                    </label>
                    <label>
                        <input type="text" name="clips_code" id="name" required>
                        <div class="label-text">Clips Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="clips_image"
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
                            <th>Clips Title</th>
                            <th>Clips Code</th>
                            <th>Clips Image</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clips as $clip)
                            <tr>
                                <td>{{ $clip -> id }}</td>
                                <td>{{ $clip -> clips_title}}</td>
                                <td>{{ $clip -> clips_code }}</td>
                                <td>
                                    <img
                                        src="{{ asset('image/'.$clip->clips_image) }}"
                                        width="80px"
                                        height="80px"
                                        alt="img"
                                    >
                                </td>
                                <td>
                                    <a
                                        class="btn btn-info"
                                        href="{{ route('admin.brandClips.edit',$clip->id) }}"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{route('admin.clips.delete' , $clip->id) }}"
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
