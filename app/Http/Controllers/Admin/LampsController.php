<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lamps;
use App\Models\LampsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class LampsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Lamps.index');
    }
    public function all()
    {
        $lamps = Lamps::all();
        return view('Admin.Lamps.all', [
            "lamps" => $lamps
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Lamps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title_en' => 'required|string',
            'title_ru' => 'required|string',
            'title_am' => 'required|string',
            'text_en' => 'required|string', // corrected to 'string' from 'text'
            'text_ru' => 'required|string', // corrected to 'string' from 'text'
            'text_am' => 'required|string', // corrected to 'string' from 'text'
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048', // ensure cover image is required
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($request->hasFile('cover_image')) {
            $rules['cover_image'] = 'cover_image';
        }

        $lamps = new Lamps();
$lamps->title_en = $request->title_en;
$lamps->title_ru = $request->title_ru;
$lamps->title_am = $request->title_am;
$lamps->text_en = $request->text_en;
$lamps->text_ru = $request->text_ru;
$lamps->text_am = $request->text_am;

if ($request->hasFile('cover_image')) {
    $image = $request->cover_image;
    $ext = $image->getClientOriginalExtension();
    $image_name = time() . '.' . $ext;
    $image->move(public_path('uploads'), $image_name);
    $lamps->cover_image = $image_name;
}

$lamps->slug = strtolower(str_replace(' ', '-', $request->title_en));
$lamps->save();

if ($request->hasFile('gallery_images')) {
    $files = $request->file('gallery_images');
    foreach ($files as $file) {
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/'), $imageName);

        $lampsImage = new LampsImages();
        $lampsImage->lamps_id = $lamps->id;
        $lampsImage->gallery_images = $imageName;
        $lampsImage->save();
    }
}

return redirect()->route('admin.lamps.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $lamps = Lamps::find($id);
        return view('Admin.Lamps.show', [
            "lamps" => $lamps
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lamps = Lamps::find($id);
        return view('Admin.Lamps.edit', [
            'lamps' => $lamps
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lamps = Lamps::find($id);

        $rules = [
            'title_en' => 'string',
            'title_ru' => 'string',
            'title_am' => 'string',
            'text_en' => 'string',
            'text_ru' => 'string',
            'text_am' => 'string',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ];
        

        $lamps->title_en = $request->title_en;
        $lamps->title_ru = $request->title_ru;
        $lamps->title_am = $request->title_am;
        $lamps->text_en = $request->text_en;
        $lamps->text_ru = $request->text_ru;
        $lamps->text_am = $request->text_am;
        $lamps->slug = strtolower(str_replace(' ', '-', $request->title_en));
        $lamps->save();

        if ($request->cover_image != '') {
            File::delete(public_path('uploads/' . $lamps->cover_image));

            $image = $request->cover_image;
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $ext;

            $image->move(public_path('uploads/'), $image_name);
            $lamps->cover_image = $image_name;
            $lamps->save();
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($lamps->images as $image) {
                File::delete(public_path('uploads/' . $image->gallery_images));
                $image->delete();
            }

            $files = $request->file('gallery_images');
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/'), $imageName);
                $lamps->images()->create(['gallery_images' => $imageName]);
            }
        }

        return redirect()->route('admin.lamps.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lamps = Lamps::find($id);
        File::delete(public_path('uploads/'.$lamps->cover_image));
        $lamps->delete();
        return redirect()->route('admin.lamps.all');
    }

    public function deleteImages($id)
    {
        $images = LampsImages::findOrFail($id);
        if (File::exists(public_path('uploads/'.$images->gallery_images))) {
            File::delete(public_path('uploads/'.$images->gallery_images));
        }
        LampsImages::find($id)->delete();
        return back();
    }
}