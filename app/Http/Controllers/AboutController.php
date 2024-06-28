<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('Admin.About.index',[
            'abouts'=>$abouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'title_am' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'description_am' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'about_images' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();

        if ($about_image = $request->file('about_images')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $about_image->getClientOriginalExtension();
            $about_image->move($destinationPath, $profileImage);
            $input['about_images'] = "$profileImage";
        }
        About::create($input);

        return redirect()->route('admin.about.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts = About::find($id);;

        return view('Admin.About.edit',[
            'abouts'=>$abouts
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
        $abouts = About::find($id);
        $abouts->location = $request->location;
        $abouts->title_am = $request->title_am;
        $abouts->title_ru = $request->title_ru;
        $abouts->title_en = $request->title_en;
        $abouts->description_am = $request->description_am;
        $abouts->description_ru = $request->description_ru;
        $abouts->description_en = $request->description_en;
        $about_image = $request->file('about_images');
        if(!is_null($about_image)) {
            if(File::exists(public_path('public/image/' . $abouts->about_images))) {
                File::delete(public_path('public/image/') . $abouts->about_images);
            }
            $name = uniqid() . '.' . $about_image->getClientOriginalExtension();
            $about_image->move(public_path('image'), $name);

            $abouts->about_images = $name;
        }

        $abouts->save();
        return redirect()->route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts = About::find($id);
        if(File::exists(public_path('public/image/' . $abouts->abouts_images))) {
            File::delete(public_path('public/image/') . $abouts->abouts_images);
        }
        $abouts -> delete();
        return back();
    }
}
