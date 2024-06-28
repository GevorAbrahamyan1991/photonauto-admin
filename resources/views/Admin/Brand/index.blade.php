@extends('layouts.admin')
@section('title','Brand-Page')
@section('content')



    <div class="container" id="home_admin_section_phone_email">
      <div class="row">
          <div class="col-md-12 text-center" style="color: #f4f93d; font-size: 26px">
              Brand Page
          </div>
       <p class="text-light">
           Նախատեսված է Բրենդներ բաժնի համար , սրա միջոցով մենք Բրենդներ էջում ավելացնում
           ենք տեքստ ,որը պատմում է մեր ներմուծվող ֆիրմաների մասին։
       </p>
          <div class="col-md-12">
              <form
                  action="{{ route('admin.brand.create') }}"
                  method="POST"
                  enctype="multipart/form-data"
              >
                  @csrf
                  <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                      Description AM
                      <textarea name="desc_am" id="" cols="60" rows="3"></textarea>
                  </label>
                  <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                      Description RU
                      <textarea name="desc_ru" id="" cols="60" rows="3"></textarea>
                  </label>
                  <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                      Description EN
                      <textarea name="desc_en" id="" cols="60" rows="3"></textarea>
                  </label>
                  <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
              </form>

          </div>
          <div class="col-md-12">
              <table width="100%">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description AM</th>
                        <th>Description RU</th>
                        <th>Description EN</th>
                        <th>OPERATIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($newBrands as $newBrand)
                        <tr>
                            <th>{{ $newBrand -> id  }}</th>
                            <th>{{ $newBrand -> desc_am  }}</th>
                            <th>{{ $newBrand -> desc_ru  }}</th>
                            <th>{{ $newBrand -> desc_en  }}</th>
                            <th class="operations">
                                <a
                                    class="btn btn-info"
                                    href="{{ route('admin.NewBrand.edit',$newBrand->id) }}"
                                >
                                    Edit
                                </a>
                                <form
                                    action="{{route('admin.NewBrand.delete' , $newBrand->id) }}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                >

                                    @method('DELETE')

                                    @csrf



                                    <button type="submit" class="btn btn-danger del_btn">Delete</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
    </div>

    <div class="container" id="home_admin_section_phone_email">
        <div class="row">
            <div class="col-md-12 text-center" style="color: #f4f93d; font-size: 26px">
                Brand Single  Page
            </div>
            <p class="text-light">
                Այստեղ մենք կավելացնենք ինֆորմացիա կոնկրետ մեկ բրենդի մասին , ասյտեղ Brand Name և
                Brand Unique պետք է նույնը լինեն։
            </p>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.SingleBrand.create') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <label class="mt-5">
                        <input type="text" name="brand_name" id="name" required>
                        <div class="label-text">Brand Name</div>
                    </label>
                    <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                        Description AM
                        <textarea name="desc_am" id="" cols="60" rows="3"></textarea>
                    </label>
                    <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                        Description RU
                        <textarea name="desc_ru" id="" cols="60" rows="3"></textarea>
                    </label>
                    <label class="mt-5 text-light" style="display: flex;flex-direction: column">
                        Description EN
                        <textarea name="desc_en" id="" cols="60" rows="3"></textarea>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="brand_unique" id="name" required>
                        <div class="label-text">Brand Unique</div>
                    </label>
                    <button type="submit" class="btn-dark ms-0 me-0 form-control">ADD</button>
                </form>
            </div>
            <div class="col-md-12">
                <table width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Brand Name</th>
                        <th>Description AM</th>
                        <th>Description RU</th>
                        <th>Description EN</th>
                        <th>Brand Unique</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($brandSingles as $brandSingle)
                            <tr>
                                <td>{{ $brandSingle->id }}</td>
                                <td>{{ $brandSingle->brand_name }}</td>
                                <td>{{ $brandSingle->desc_am }}</td>
                                <td>{{ $brandSingle->desc_ru }}</td>
                                <td>{{ $brandSingle->desc_en }}</td>
                                <td>{{ $brandSingle->brand_unique }}</td>
                                <td>
                                    <a
                                        class="btn btn-info"
                                        href="{{ route('admin.SingleBrand.edit',$brandSingle->id) }}"
                                    >
                                        Edit
                                    </a>
                                    <form
                                        action="{{route('admin.SingleBrand.destroy' , $brandSingle->id) }}"
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
            <div class="col-md-12 text-center" style="color: #f4f93d; font-size: 26px">
                Brand Single  Category List
            </div>
            <p class="text-light">
                Այստեղ մենք կավելացնենք ինֆորմացիա կոնկրետ  բրենդի կատեգորիաների , ասյտեղ
                Brand Unique պետք է նույնը լինի ինչ գրել էինք  նախորդ բաժնի Brand Unique - ի դաշտում։
            </p>
            <div class="col-md-12">
                <form
                    action="{{ route('admin.CategoryLists.create') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <label class="mt-5">
                        <input type="text" name="brand_unique" id="name" required>
                        <div class="label-text">Brand Unique</div>
                    </label>
                    <label class="mt-5">
                        <input type="text" name="category_list" id="name" required>
                        <div class="label-text">Category List</div>
                    </label>
                    <div class="text-center">
                        <label
                            for="image_carousel"
                            class=""
                        >
                            <i class="fas fa-download"></i>
                            <input
                                type="file"
                                name="category_images"
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
                            <th>Brand Unique</th>
                            <th>Brand Category</th>
                            <th>Category Image</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brandCategoryLists as $brandCategoryList)
                            <tr>
                                <td>{{ $brandCategoryList -> id }}</td>
                                <td>{{ $brandCategoryList -> brand_unique }}</td>
                                <td>{{ $brandCategoryList -> category_list }}</td>
                                <td>
                                    <img
                                        src="{{ asset('public/image/'.$brandCategoryList->category_images)}}"
                                        width="150px"
                                        height="150px"
                                        class="img-fluid"
                                        alt=""
                                    >
                                </td>
                                <td>
                                    <a
                                        class="btn btn-info"
                                        href="{{ route('admin.CategoryLists.edit', $brandCategoryList->id) }}"
                                    >
                                        Edit
                                    </a>
                                    <form
                                        action="{{ route('admin.CategoryLists.destroy' , $brandCategoryList->id) }}"
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
