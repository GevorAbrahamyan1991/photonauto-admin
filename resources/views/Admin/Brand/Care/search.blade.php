@extends('layouts.admin')
@section('title',"Search")
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if($CareProducts->isNotEmpty())
                @foreach ($CareProducts as $CareProducts)
                    <div class="post-list">
                        <p>{{ $CareProducts->care_product_title_am }}</p>
                        <p>{{ $CareProducts->care_product_title_ru }}</p>
                        <p>{{ $CareProducts->care_product_title_en }}</p>
{{--                        <img src="{{ $post->image }}">--}}
                    </div>
                @endforeach
            @else
                <div>
                    <h2>No posts found</h2>
                </div>
            @endif
        </div>
    </div>
@endsection
