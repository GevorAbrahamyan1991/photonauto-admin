@extends("layouts.admin")
@section('title','Interier')
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
                <h3>For Interier</h3>
            </div>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.interier.create') }}"
                    method="POST"
                    class="w-100"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label>
                        <input type="text" name="interier_title_am" id="name" required>
                        <div class="label-text">Interier Title Am</div>
                    </label>
                    <label>
                        <input type="text" name="interier_title_ru" id="name" required>
                        <div class="label-text">Interier Title Ru</div>
                    </label>
                    <label>
                        <input type="text" name="interier_title_en" id="name" required>
                        <div class="label-text">Interier Title En</div>
                    </label>
                    <label>
                        <input type="text" name="interier_description_am" id="name" required>
                        <div class="label-text">Interier Description Am</div>
                    </label>
                    <label>
                        <input type="text" name="interier_description_ru" id="name" required>
                        <div class="label-text">Interier Description Ru</div>
                    </label>
                    <label>
                        <input type="text" name="interier_description_en" id="name" required>
                        <div class="label-text">Interier Description En</div>
                    </label>
                    <label>
                        <input type="text" name="interier_code" id="name" required>
                        <div class="label-text">Interier Code</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="interier_image"
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
                        <th>Title Am</th>
                        <th>Title Ru</th>
                        <th>Title En</th>
                        <th>Description Am</th>
                        <th>Description Ru</th>
                        <th>Description En</th>
                        <th>Code</th>
                        <th>Image</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Interiers as $Interier)
                        <tr>
                            <td>{{ $Interier -> id }}</td>
                            <td>{{ $Interier -> interier_title_am }}</td>
                            <td>{{ $Interier -> interier_title_ru }}</td>
                            <td>{{ $Interier -> interier_title_en }}</td>
                            <td>{{ $Interier -> interier_description_am }}</td>
                            <td>{{ $Interier -> interier_description_ru }}</td>
                            <td>{{ $Interier -> interier_description_en }}</td>
                            <td>{{ $Interier -> interier_code }}</td>
                            <td>
                                <img
                                    src="{{ asset('image/'.$Interier->interier_image) }}"
                                    width="80px"
                                    height="80px"
                                    alt="img"
                                >
                            </td>
                            <td>
                                <a
                                    class="btn btn-info"
                                    href="{{ route('admin.interier.edit',$Interier->id) }}"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{route('admin.interier.delete' , $Interier->id) }}"
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
