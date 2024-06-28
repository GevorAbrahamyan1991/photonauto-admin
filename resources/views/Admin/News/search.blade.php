@extends('layouts.admin')
@section('title','Search')
@section('content')
    <div class="container">
        <div class="row">
            @if($news->isNotEmpty())
                @foreach($news as $item)
                <div class="col-md-3">
                    <p>{{ $item->title_am }}</p>
                    <p>{{ $item->title_ru }}</p>
                    <p>{{ $item->title_en }}</p>
                    <p>{{ $item->description_am }}</p>
                    <p>{{ $item->description_ru }}</p>
                    <p>{{ $item->description_en }}</p>
                </div>
                @endforeach
            @else
            <div>
                <h1>Ban Chgta</h1>
            </div>
            @endif
        </div>
    </div>
@endsection
