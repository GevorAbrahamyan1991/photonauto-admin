@extends('layouts.admin')
@section('title','PreNews')
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
                    Այս բաժնում ավելացնոում եք կոնկրետ նորությանը վերաբերվող ենթանորություն , այստեղ
                    PreNews Unique ը պետք է նույնը լինի ինչ գրել էիք News Unique դաշտում
                </p>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.PreNews.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                @csrf
                    <label>
                        <input type="text" name="pre_unique" id="name" required>
                        <div class="label-text">PreNews Unique</div>
                    </label>
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
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="pre_images"
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
                <table width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Unique</th>
                            <th>Desc AM</th>
                            <th>Desc Ru</th>
                            <th>Desc EN</th>
                            <th>PreNews Image</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($preNews as $preNew)
                            <tr>
                                <td>{{ $preNew->id }}</td>
                                <td>{{ $preNew->pre_unique }}</td>
                                <td>{{ $preNew->desc_am }}</td>
                                <td>{{ $preNew->desc_ru }}</td>
                                <td>{{ $preNew->desc_en }}</td>
                                <td>
                                    <img
                                        src="{{ asset('public/image/'.$preNew->pre_images)}}"
                                        width="150px"
                                        height="150px"
                                        class="img-fluid"
                                        alt=""
                                    >
                                </td>
                                <td>
                                    <a
                                        class="btn btn-info"
                                        href="{{ route('admin.PreNews.edit', $preNew->id) }}"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{route('admin.PreNews.delete' , $preNew->id) }}"
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
