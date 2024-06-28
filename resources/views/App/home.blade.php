<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div>
            <form action="/search/query" method="GET">
                @csrf
                <input
                    type="text"
                    name="search"
                    placeholder="Search"
                    class="ps-4 pe-10 py-3 loading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                    required/>
                <button
                    type="submit"
                    class="bg-green-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl"
                >
                    Search
                </button>
            </form>
        </div>
        @foreach ($CareBrands as $CareBrand)
            <div class="row">
                <div class="col-md-12">
                     <h3 class="text-center alert-danger">
                        {{ $CareBrand->care_brands }}
                    </h3>
                </div>
                <div class="col-md-12">
                    <div class="row">

                    @foreach ($CareProducts as $CareProduct)
                        @if ($CareProduct->care_product_brand == $CareBrand->care_brands)
                                <div class="col-md-2 border">
                                    <div class="for_img">
                                        <img
                                        src="{{ asset('image/'.$CareProduct->care_product_image) }}"
                                        class="img-fluid w-100"
                                        alt="img"
                                    >
                                    </div>
                                    <div class="for_title">
                                        <h4>{{ $CareProduct->care_product_title_am }}</h4>
                                    </div>
                                    <div class="for_title">
                                        <h4>{{ $CareProduct->care_product_description_am }}</h4>
                                    </div>
                                    <div class="for_title">
                                        <h4>{{ $CareProduct->care_product_code }}</h4>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                </div>

                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
