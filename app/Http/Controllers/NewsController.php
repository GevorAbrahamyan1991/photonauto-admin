<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Prenews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('Admin.News.index',[
           "news"=>$news,
        ]);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $news = News::query()
            ->where('title_am','LIKE' , "%{$search}%")
            ->orWhere('title_ru','LIKE', "%{$search}%")
            ->orWhere('title_en','LIKE', "%{$search}%")
            ->orWhere('description_am','LIKE', "%{$search}%")
            ->orWhere('description_ru','LIKE', "%{$search}%")
            ->orWhere('description_en','LIKE', "%{$search}%")
            ->get();
        return view('Admin.News.search',[
           'news'=>$news
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title_am' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'description_am' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'news_unqiue'=>'required',
            'news_images' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();
        if ($news_images = $request->file('news_images')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $news_images->getClientOriginalExtension();
            $news_images->move($destinationPath, $profileImage);
            $input['news_images'] = "$profileImage";
        }
        News::create($input);

        return redirect()->route('admin.news.index')
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
        $news = News::find($id);
        return view('Admin.News.edit',[
            'news'=>$news
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
        $news = News::find($id);
        $news->title_am = $request->title_am;
        $news->title_ru = $request->title_ru;
        $news->title_en = $request->title_en;
        $news->description_am = $request->description_am;
        $news->description_ru = $request->description_ru;
        $news->description_en = $request->description_en;
        $news->news_unqiue = $request->news_unqiue;
        $news_image = $request->file('news_images');
        if(!is_null($news_image)) {
            if(File::exists(public_path('public/image/' . $news->news_images))) {
                File::delete(public_path('public/image/') . $news->news_images);
            }
            $name = uniqid() . '.' . $news_image->getClientOriginalExtension();
            $news_image->move(public_path('image'), $name);

            $news->news_images = $name;
        }

        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if(File::exists(public_path('public/image/' . $news->news_images))) {
            File::delete(public_path('public/image/') . $news->news_images);
        }
        $news -> delete();
        return back();
    }
}
