@extends('layouts.admin')
@section('title', 'Rent Appartment')
@section('content')
    <div class="bg-slate-500 py-8">
        <div class="max-w-screen-xl mx-auto">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="">
                            <th scope="col" class="px-6 py-3">
                                Key
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Value
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex justify-center items-center gap-8  h-full">
                                    <a href="{{ route('admin.lamps.edit', ['id' => $lamps->id]) }}"
                                        class=" text-2xl">
                                        <i class="fa-solid fa-pen-to-square text-blue-700"></i></a>
                                    <form action="{{ route('admin.lamps.destroy', ['id' => $lamps->id]) }}" method="POST">
                                        @method('delete') 
                                        @csrf
                                        <button class="text-red-700 text-2xl"><i class="fa-solid fa-trash text-red-700"></i></button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-gray-400 border-b  hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Title AM
                            </th>
                            <td class="px-6 py-4 text text-gray-900">
                                {{ $lamps->title_am }}
                            </td>
                            <td></td>
                        </tr>
                        
                        <tr
                            class="bg-gray-400 border-b  hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Title RU
                            </th>
                            <td class="px-6 py-4 text text-gray-900">
                                {{ $lamps->title_ru }}
                            </td>
                            <td></td>
                        </tr>
                        <tr
                            class="bg-gray-400 border-b  hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Title EN
                            </th>
                            <td class="px-6 py-4 text text-gray-900">
                                {{ $lamps->title_en }}
                            </td>
                            <td></td>
                        </tr>
                        <tr
                            class="bg-gray-400 border-b  hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Text AM
                            </th>
                            <td class="px-6 py-4 text text-gray-900">
                                {!! $lamps->text_am !!}
                            </td>
                            <td></td>
                        </tr>
                        <tr
                            class="bg-gray-400 border-b  hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Text RU
                            </th>
                            <td class="px-6 py-4 text text-gray-900">
                                {!! $lamps->text_ru !!}
                            </td>
                            <td></td>
                        </tr>
                        <tr
                            class="bg-gray-400 border-b  hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Text EN
                            </th>
                            <td class="px-6 py-4 text text-gray-900">
                                {!! $lamps->text_en !!}
                            </td>
                            <td></td>
                        </tr>
                        <tr
                            class="bg-gray-400 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Cover Image
                            </th>
                            <td class="px-6 py-4 capitalize flex justify-center items-center">
                                <img src="{{ asset('public/uploads/' . $lamps->cover_image) }}" class="h-96 w-96" alt="">
                            </td>
                            <td></td>
                        </tr>
                        <tr
                            class="bg-gray-400 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Created AT
                            </th>
                            <td class="px-6 py-4 capitalize text-gray-900">
                                {{ $lamps->created_at }}
                            </td>
                            <td></td>
                        </tr>
                        <tr
                            class="bg-gray-400 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-600 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Gallery Images
                            </th>
                            <td class="px-6 py-4">
                                <div class="grid grid-cols-4 gap-4">
                                    @foreach ($lamps->images as $image)
                                        <div class="relative h-48">
                                            <form action="{{ route('admin.lampsImages.delete', ['id' => $image->id]) }}"
                                                method="post">
                                                <button
                                                    class="absolute bg-red-600 w-8 h-8 text-white btn text-danger">X</button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <img src="{{ asset('public/uploads/' . $image->gallery_images) }}"
                                                class="w-full h-full object-cover" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
