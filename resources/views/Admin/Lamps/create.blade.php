@extends('layouts.admin')
@section('title', 'Create Lamp Post')
@section('content')
    <div class="max-w-screen-lg mx-auto">
        <form 
        action="{{ route('admin.lamps.store') }}"  
        enctype="multipart/form-data" method="POST" class="my-6">
            @csrf
            <div class="grid gap-y-4">

                <div class="">
                    <label class="block mb-2 text-2xl font-bold font-serif text-white" for="title_en">Title EN</label>
                    <input type="text" name="title_en" id="title_en"
                        class="block w-full text-sm text-gray-900 border border-gray-300  cursor-pointer bg-gray-50  focus:outline-none rounded-lg">
                </div>
                <div class="">
                    <label class="block mb-2 text-2xl font-bold font-serif text-white" for="title_ru">Title RU</label>
                    <input type="text" name="title_ru" id="title_ru"
                        class="block w-full text-sm text-gray-900 border border-gray-300  cursor-pointer bg-gray-50  focus:outline-none rounded-lg">
                </div>
                <div class="">
                    <label class="block mb-2 text-2xl font-bold font-serif text-white" for="title_am">Title Am</label>
                    <input type="text" name="title_am" id="title_am"
                        class="block w-full text-sm text-gray-900 border border-gray-300  cursor-pointer bg-gray-50  focus:outline-none rounded-lg">
                </div>
                <div class="mb-6">
                    <div class="block mb-2 text-2xl font-bold font-serif text-white">Text En</div>
                    <textarea name="text_en" id="editor"></textarea>
                </div>
                <div class="mb-6">
                    <div class="block mb-2 text-2xl font-bold font-serif text-white">Text Ru</div>
                    <textarea name="text_ru" id="editor1"></textarea>
                </div>
                <div class="mb-6">
                    <div class="block mb-2 text-2xl font-bold font-serif text-white">Text Am</div>
                    <textarea name="text_am"  id="editor2"></textarea>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-2xl font-bold font-serif text-white" for="cover_image">Upload
                        Cover Image</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none"
                        id="cover_image" name="cover_image" type="file">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-2xl font-bold font-serif text-white" for="file_input1">Upload Gallery
                        Images
                    </label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none"
                        id="file_input1" name="gallery_images[]" multiple type="file">
                </div>
            </div>
         
            <button type="submit"
                class="block w-full !bg-black rounded-lg border-2 text-2xl font-bold font-serif text-white py-2">Create</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
