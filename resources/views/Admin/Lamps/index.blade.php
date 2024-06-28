@extends('layouts.admin')
@section('title', 'Lamps Admin')
@section('content')
<div class="bg-slate-800  py-8">
    <div class="max-w-screen-lg mx-auto">
        <div class="flex gap-8">
            <div class="border-2">
                <a
                 href="{{ route('admin.lamps.create') }}"
                    class="block w-full h-full px-8 py-6 text-white text-2xl font-extrabold hover:bg-slate-900 transition-all duration-300 cursor-pointer">
                    Create New Lamp Post
                </a>
            </div>
            <div class="border-2">
                <a 
                href="{{ route('admin.lamps.all') }}"
                    class="block w-full h-full px-8 py-6 text-white text-2xl font-extrabold hover:bg-slate-900 transition-all duration-300 cursor-pointer">
                    Show All Lamps
                </a>
            </div>
        </div>
    </div>
@endsection