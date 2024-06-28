<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('Admin.Product.index',[
            'products'=>$products
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
            'title_am' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'description_am' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'code' => 'required',
            'product_pictures' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($product_image = $request->file('product_pictures')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $product_image->getClientOriginalExtension();
            $product_image->move($destinationPath, $profileImage);
            $input['product_pictures'] = "$profileImage";
        }
        Product::create($input);

        return redirect()->route('admin.product.index')
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
        $products = Product::find($id);;

        return view('Admin.Product.edit',[
            'products'=>$products
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
        $products = Product::find($id);
        $products->code = $request->code;
        $products->title_am = $request->title_am;
        $products->title_ru = $request->title_ru;
        $products->title_en = $request->title_en;
        $products->description_am = $request->description_am;
        $products->description_ru = $request->description_ru;
        $products->description_en = $request->description_en;
        $products_image = $request->file('product_pictures');
        if(!is_null($products_image)) {
            if(File::exists(public_path('image/' . $products->product_pictures))) {
                File::delete(public_path('image/') . $products->product_pictures);
            }
            $name = uniqid() . '.' . $products_image->getClientOriginalExtension();
            $products_image->move(public_path('image'), $name);

            $products->product_pictures = $name;
        }

        $products->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        if(File::exists(public_path('image/' . $products->product_pictures))) {
            File::delete(public_path('image/') . $products->product_pictures);
        }
        $products -> delete();
        return back();
    }
}
