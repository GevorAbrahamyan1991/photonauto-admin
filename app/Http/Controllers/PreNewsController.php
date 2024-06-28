<?php

namespace App\Http\Controllers;

use App\Models\HomeCarouselImages;
use App\Models\PreNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PreNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preNews = PreNews::all();
        return view('Admin.PreNews.index' , [
            'preNews' => $preNews
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
            'pre_unique'=>'required',
            'desc_am' => 'required',
            'desc_ru' => 'required',
            'desc_en' => 'required',
            'pre_images' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $input = $request->all();

        if ($pre_images = $request->file('pre_images')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $pre_images->getClientOriginalExtension();
            $pre_images->move($destinationPath, $profileImage);
            $input['pre_images'] = "$profileImage";
        }
        PreNews::create($input);

        return redirect()->route('admin.PreNews.index')
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
        $preNews = PreNews::find($id);
        return view('Admin.PreNews.edit' , [
            'preNews'=>$preNews
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
        $preNews = PreNews::find($id);
        $preNews->pre_unique = $request->pre_unique;
        $preNews->desc_am = $request->desc_am;
        $preNews->desc_ru = $request->desc_ru;
        $preNews->desc_en = $request->desc_en;
        $pre_imgs = $request->file('pre_images');

        if(!is_null($pre_imgs)) {
            if(File::exists(public_path('public/image/' . $preNews->pre_images))) {
                File::delete(public_path('public/image/') . $preNews->pre_images);
            }
            $name = uniqid() . '.' . $pre_imgs->getClientOriginalExtension();
            $pre_imgs -> move(public_path('image'), $name);

            $preNews->pre_images = $name;
        }
        $preNews->save();

        return redirect()->route('admin.PreNews.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preNews = PreNews::find($id);
        if(File::exists(public_path('public/image/' . $preNews->pre_images))) {
            File::delete(public_path('public/image/') . $preNews->pre_images);
        }
        $preNews -> delete();
        return back();
    }
}
