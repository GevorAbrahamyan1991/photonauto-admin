@extends('layouts.admin')
@section('title', 'All Lamps')
@section('content')
<div class="">
    <div class="max-w-screen-lg mx-auto">
        <div class="my-12">
            <div class="flex gap-8">
                <div class="text-white text-2xl font-extrabold font-serif">
                    <a href="{{ route('admin.lamps.create') }}" class="text-blue-900">
                        Create New Lamp Post
                        <i class="fa-solid fa-plus text-blue-900"></i>
                    </a>
                </div>
            </div>
            
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-12">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title AM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cover Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lamps as $item)
                            <tr
                                class="bg-gray-400 border-b-2 border-gray-400  hover:bg-gray-400 cursor-pointer">
                                <th scope="row"
                                    class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->title_am}}
                                </th>
                                
                                <td class="px-6 py-4 flex justify-center">
                                    <img src="{{ asset('uploads/'.$item->cover_image) }}" class="w-64 h-64" alt="">
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-center items-center gap-8  h-full">
                                        <a 
                                        href="{{ route('admin.lamps.show', ['id' => $item->id]) }}"
                                            class="font-bold text-2xl "><i
                                                class="fa-regular fa-eye text-blue-600  hover:underline"></i></a>
                                        <a 
                                        href="{{ route('admin.lamps.edit', ['id' => $item->id]) }}" 
                                        class=" text-2xl">
                                            <i class="fa-solid text-blue-700 fa-pen-to-square"></i></a>
                                        <form 
                                        action="{{ route('admin.lamps.destroy', ['id' => $item->id]) }}" 
                                        method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class=" text-2xl"><i
                                                    class="fa-solid text-red-700 fa-trash"></i></button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection