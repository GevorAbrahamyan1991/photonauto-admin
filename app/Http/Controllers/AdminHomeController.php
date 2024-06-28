<?php

namespace App\Http\Controllers;

use App\Models\HomeBrandImage;
//use Faker\Core\File;
use App\Models\HomeCarousel;
use App\Models\HomeCarouselImages;
use App\Models\HomeDatas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_brand_images = HomeBrandImage::all();
        $carousel_images = HomeCarouselImages::all();
        $homeDatas = HomeDatas::all();
        return view('Admin.Home.index',[
            'home_brand_images' => $home_brand_images,
            'carousel_images'=>$carousel_images,
            'homeDatas'=>$homeDatas
        ]);
    }
    public function indexBrandImages(){
        $home_brand_images = $this -> HomeBrandImage::all();
        return response()->json([
            'home_brand_images' => $home_brand_images,
            // 'state' => 'CA',
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
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        HomeBrandImage::create($input);

        return redirect()->route('admin.home.index')
            ->with('success','Product created successfully.');
    }
    public function createCarouselImages(Request $request)
    {
        $request->validate([
            'carousel_images_title' => 'required',
            'carousel_images' => 'required|image|mimes:jpeg,png,jpg,gif,,webp|max:2048',
        ]);
        $inputCarousel = $request->all();

        if ($imageCarousel = $request->file('carousel_images')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $imageCarousel->getClientOriginalExtension();
            $imageCarousel->move($destinationPath, $profileImage);
            $inputCarousel['carousel_images'] = "$profileImage";
        }
        HomeCarouselImages::create($inputCarousel);

        return redirect()->route('admin.home.index')
            ->with('success','Product created successfully.');
    }
    public function createHomeDatas(Request $request)
    {
        $request->validate([
            'tel' => 'required',
            'email' => 'required',
            'address_am' => 'required',
            'address_ru' => 'required',
            'address_en' => 'required',
            'insta_link' => 'required',
            'face_link' => 'required',
            'youtube_link' => '',
            'telegram_link' => '',
            'vk_link' => '',
        ]);
        $inputHomeDatas = $request->all();


        HomeDatas::create($inputHomeDatas);

        return redirect()->route('admin.home.index')
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
        $home_brand_images = HomeBrandImage::find($id);
        return view('Admin.Home.edit',[
            'home_brand_images' => $home_brand_images
        ]);
    }
    public function editCarousel($id)
    {
        $carousel_images = HomeCarouselImages::find($id);;

        return view('Admin.Home.editCarousel',[
            'carousel_images'=>$carousel_images
        ]);
    }
    public function editHomeData($id)
    {
        $homeDatas = HomeDatas::find($id);;

        return view('Admin.Home.editHomeData',[
            'homeDatas'=>$homeDatas
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
        $home_brand_images = HomeBrandImage::find($id);
        $home_brand_images->title = $request -> title;
        $image = $request->file('image');
        if(!is_null($image)) {
            if(File::exists(public_path('public/image/' . $home_brand_images->image))) {
                File::delete(public_path('public/image/') . $home_brand_images->image);
            }
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $name);

            $home_brand_images->image = $name;
        }

        $home_brand_images->save();
        return redirect()->route('admin.home.index');
    }
    public function updateCarousel(Request $request, $id)
    {
        $carousel_images = HomeCarouselImages::find($id);
        $carousel_images->carousel_images_title = $request -> carousel_images_title;
        $carousel_image = $request->file('carousel_images');
        if(!is_null($carousel_image)) {
            if(File::exists(public_path('public/image/' . $carousel_images->carousel_images))) {
                File::delete(public_path('public/image/') . $carousel_images->carousel_images);
            }
            $name = uniqid() . '.' . $carousel_image->getClientOriginalExtension();
            $carousel_image->move(public_path('image'), $name);

            $carousel_images->carousel_images = $name;
        }

        $carousel_images->save();
        return redirect()->route('admin.home.index');
    }
    public function updateHomeData(Request $request, $id)
    {
        $homeDatas = HomeDatas::find($id);
        $homeDatas->tel = $request -> tel;
        $homeDatas->email = $request -> email;
        $homeDatas->address_am = $request -> address_am;
        $homeDatas->address_ru = $request -> address_ru;
        $homeDatas->address_en = $request -> address_en;
        $homeDatas->insta_link = $request -> insta_link;
        $homeDatas->face_link = $request -> face_link;
        $homeDatas->youtube_link = $request -> youtube_link;
        $homeDatas->telegram_link = $request -> telegram_link;
        $homeDatas->vk_link = $request -> vk_link;


        $homeDatas->save();
        return redirect()->route('admin.home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $home_brand_images =HomeBrandImage::find($id);
        if(File::exists(public_path('public/image/' . $home_brand_images->image))) {
            File::delete(public_path('public/image/') . $home_brand_images->image);
        }
        $home_brand_images -> delete();
        return back();
    }
    public function destroyCarousel($id)
    {
        $carousel_images = HomeCarouselImages::find($id);
        if(File::exists(public_path('public/image/' . $carousel_images->carousel_images))) {
            File::delete(public_path('public/image/') . $carousel_images->carousel_images);
        }
        $carousel_images -> delete();
        return back();
    }
    public function destroyHomeData($id)
    {
        $homeDatas = HomeDatas::find($id);
        $homeDatas -> delete();
        return back();
    }
}