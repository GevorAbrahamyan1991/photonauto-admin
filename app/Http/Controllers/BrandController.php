<?php

namespace App\Http\Controllers;
use App\Models\BrandsCategoryLists;
use App\Models\BrandSingle;
use App\Models\FreshBrand;
use App\Models\FreshProduct;
use App\Models\FreshSmell;
use App\Models\FreshType;
use App\Models\GlassBrush;
use App\Models\LampBrand;
use App\Models\LampProducts;
use App\Models\LampSlot;
use App\Models\LampType;
use App\Models\NewBrand;
use Illuminate\Support\Facades\Auth;
use App\Models\CareBrand;
use App\Models\CareProducts;
use App\Models\SnowBrand;
use App\Models\SnowProduct;
use App\Models\BrushesBrand;
use App\Models\BrushesType;
use App\Models\BrushesProduct;
use App\Models\Clips;
use App\Models\ForHomes;
use App\Models\Interier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newBrands = NewBrand::all();
        $brandSingles = BrandSingle::all();
        $brandCategoryLists = BrandsCategoryLists::all();
        return view('Admin.Brand.index',[
            "newBrands"=>$newBrands,
            "brandSingles"=>$brandSingles,
            'brandCategoryLists'=>$brandCategoryLists
        ]);
    }

    public function indexAmrak()
    {
        $clips = Clips::all();
        return view('Admin.Brand.Amrakner.index',[
            "clips"=>$clips
        ]);
    }
    public function indexForHome()
    {
        $ForHomes = ForHomes::all();
        return view('Admin.Brand.ForHomes.index',[
            "ForHomes"=>$ForHomes
        ]);
    }
    public function indexInterier()
    {
        $Interiers = Interier::all();
        return view('Admin.Brand.Interier.index',[
            "Interiers"=>$Interiers
        ]);
    }
    public function indexCare()
    {
        $CareBrands = CareBrand::all();
        $CareProducts = \App\Models\CareProducts::all();
        return view('Admin.Brand.Care.index',[
            "CareBrands"=>$CareBrands,
            "CareProducts"=>$CareProducts
        ]);
    }
    public function indexCareProduct()
    {
        $CareProducts = \App\Models\CareProducts::all();
        return view('Admin.Brand.Care.index',[
            "CareProducts"=>$CareProducts
        ]);
    }
    public function indexSnow()
    {

        $SnowBrands = \App\Models\SnowBrand::all();
        $SnowProducts = \App\Models\SnowProduct::all();
        return view('Admin.Brand.Snow.index',[
            "SnowBrands"=>$SnowBrands,
            "SnowProducts"=>$SnowProducts,
        ]);
    }
    public function indexBrushes()
    {

        $BrushesBrands = \App\Models\BrushesBrand::all();
        $BrushesTypes = \App\Models\BrushesType::all();
        $BrushesProducts = GlassBrush::all();
//         dd($BrushesProducts);
        return view('Admin.Brand.Brushes.index',[
            "BrushesBrands"=>$BrushesBrands,
            "BrushesTypes"=>$BrushesTypes,
            "BrushesProducts"=>$BrushesProducts,
        ]);

    }
    public function indexFresh()
    {
        $FreshBrands = FreshBrand::all();
        $FreshTypes = FreshType::all();
        $FreshSmells = FreshSmell::all();
        $FreshProducts = FreshProduct::all();
        return view('Admin.Brand.Fresh.index',[
            "FreshBrands"=>$FreshBrands,
            "FreshTypes"=>$FreshTypes,
            "FreshSmells"=>$FreshSmells,
            "FreshProducts"=>$FreshProducts
        ]);
    }
    public function indexLamp()
    {
        $LampBrands = LampBrand::all();
        $LampTypes = LampType::all();
        $LampSlots = LampSlot::all();
        $LampProducts = LampProducts::all();
        return view('Admin.Brand.Lamp.index',[
            "LampBrands"=>$LampBrands,
            "LampTypes"=>$LampTypes,
            "LampSlots"=>$LampSlots,
            "LampProducts"=>$LampProducts,
        ]);
    }
    public function indexSnowProduct()
    {
        $SnowBrands = \App\Models\SnowBrand::all();
        $SnowProducts = \App\Models\SnowProduct::all();
        return view('Admin.Brand.Snow.index',[
            "SnowProducts"=>$SnowProducts,
            "SnowBrands"=>$SnowBrands
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
            'desc_am' => 'required',
            'desc_ru' => 'required',
            'desc_en' => 'required'
        ]);
        $input = $request->all();
        NewBrand::create($input);
        return redirect()->route('admin.brand.index')->with('success','Product created successfully.');
    }
    public function createSingle(Request $request)
    {
        $request->validate([
            'brand_name'=>'required',
            'desc_am' => 'required',
            'desc_ru' => 'required',
            'desc_en' => 'required',
            'brand_unique'=>'required'
        ]);
        $input = $request->all();
        BrandSingle::create($input);
        return redirect()->route('admin.brand.index')->with('success','Product created successfully.');
    }
    public function createCategoryList(Request $request)
    {
        $request->validate([
            'brand_unique'=>'required',
            'category_list'=>'required',
            'category_images'=>'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $input = $request->all();

        if ($category_images = $request->file('category_images')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $category_images->getClientOriginalExtension();
            $category_images->move($destinationPath, $profileImage);
            $input['category_images'] = "$profileImage";
        }
        BrandsCategoryLists::create($input);
        return redirect()->route('admin.brand.index')->with('success','Product created successfully.');
    }

    public function createCareBrand(Request $request)
    {
        $request->validate([
            'care_brands' => 'required'
        ]);
        $input = $request->all();
        CareBrand::create($input);
        return redirect()->route('admin.care.index')
            ->with('success','Product created successfully.');
    }
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $CareProducts = CareProducts::query()
            ->where('care_product_title_am', 'LIKE', "%{$search}%")
            ->orWhere('care_product_title_ru', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('Admin.Brand.Care.search', [
            "CareProducts"=>$CareProducts,
//            "CareBrands"=>$CareBrands
        ]);
    }
    public function createSnowBrand(Request $request)
    {
        $request->validate([
            'snow_brands' => 'required'
        ]);
        $input = $request->all();
        SnowBrand::create($input);
        return redirect()->route('admin.snow.index')
            ->with('success','Product created successfully.');
    }
    public function createBrushesBrand(Request $request)
    {
        $request->validate([
            'brushes_brands' => 'required'
        ]);
        $input = $request->all();
        BrushesBrand::create($input);
        return redirect()->route('admin.brushes.index')
            ->with('success','Product created successfully.');
    }
    public function createFreshBrand(Request $request)
    {
        $request->validate([
            'fresh_brand' => 'required'
        ]);
        $input = $request->all();
        FreshBrand::create($input);
        return redirect()->route('admin.fresh.index')
            ->with('success','Product created successfully.');
    }
    public function createLampBrand(Request $request)
    {
        $request->validate([
            'lamp_brand' => 'required'
        ]);
        $input = $request->all();
        LampBrand::create($input);
        return redirect()->route('admin.lamp.index')
            ->with('success','Product created successfully.');
    }
    public function createFreshType(Request $request)
    {
        $request->validate([
            'fresh_type' => 'required'
        ]);
        $input = $request->all();
        FreshType::create($input);
        return redirect()->route('admin.fresh.index')
            ->with('success','Product created successfully.');
    }
    public function createLampType(Request $request)
    {
        $request->validate([
            'lamp_type' => 'required'
        ]);
        $input = $request->all();
        LampType::create($input);
        return redirect()->route('admin.lamp.index')
            ->with('success','Product created successfully.');
    }
    public function createFreshSmell(Request $request)
    {
        $request->validate([
            'fresh_smell' => 'required'
        ]);
        $input = $request->all();
        FreshSmell::create($input);
        return redirect()->route('admin.fresh.index')
            ->with('success','Product created successfully.');
    }
    public function createLampSlot(Request $request)
    {
        $request->validate([
            'lamp_slot' => 'required'
        ]);
        $input = $request->all();
        LampSlot::create($input);
        return redirect()->route('admin.lamp.index')
            ->with('success','Product created successfully.');
    }
    public function createFreshProduct(Request $request)
    {
        $request->validate([
            'fresh_product_brand' =>'required',
            'fresh_product_type' =>'required',
            'fresh_product_title_am' => 'required',
            'fresh_product_title_ru' => 'required',
            'fresh_product_title_en' => 'required',
            'fresh_product_desc_am' => 'required',
            'fresh_product_desc_ru' => 'required',
            'fresh_product_desc_en' => 'required',
            'fresh_product_code' => 'required',
            'fresh_product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($fresh_product = $request->file('fresh_product_image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $fresh_product->getClientOriginalExtension();
            $fresh_product->move($destinationPath, $profileImage);
            $input['fresh_product_image'] = "$profileImage";
        }
        FreshProduct::create($input);

        return redirect()->route('admin.fresh.index')
            ->with('success','Product created successfully.');
    }
    public function createLampProduct(Request $request)
    {
        $request->validate([
            'lamp_product_brand' =>'required',
            'lamp_product_type' =>'required',
            'lamp_product_title_am' => 'required',
            'lamp_product_title_ru' => 'required',
            'lamp_product_title_en' => 'required',
            'lamp_product_desc_am' => 'required',
            'lamp_product_desc_ru' => 'required',
            'lamp_product_desc_en' => 'required',
            'lamp_product_code' => 'required',
            'lamp_product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($lamp_product = $request->file('lamp_product_image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $lamp_product->getClientOriginalExtension();
            $lamp_product->move($destinationPath, $profileImage);
            $input['lamp_product_image'] = "$profileImage";
        }
        LampProducts::create($input);

        return redirect()->route('admin.lamp.index')
            ->with('success','Product created successfully.');
    }
    public function createBrushesType(Request $request)
    {
        $request->validate([
            'brushes_type' => 'required'
        ]);
        $input = $request->all();
        BrushesType::create($input);
        return redirect()->route('admin.brushes.index')
            ->with('success','Product created successfully.');
    }
    public function createClips(Request $request)
    {
        $request->validate([
            'clips_title' => 'required',
            'clips_code' => 'required',
            'clips_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($clips_image = $request->file('clips_image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $clips_image->getClientOriginalExtension();
            $clips_image->move($destinationPath, $profileImage);
            $input['clips_image'] = "$profileImage";
        }
        Clips::create($input);

        return redirect()->route('admin.brandsAmrak.index')
            ->with('success','Product created successfully.');
    }
    public function createForHomes(Request $request)
    {
        $request->validate([
            'for_home_title_am' => 'required',
            'for_home_title_ru' => 'required',
            'for_home_title_en' => 'required',
            'for_home_description_am' => 'required',
            'for_home_description_ru' => 'required',
            'for_home_description_en' => 'required',
            'for_home_code' => 'required',
            'for_home_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($for_home_image = $request->file('for_home_image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $for_home_image->getClientOriginalExtension();
            $for_home_image->move($destinationPath, $profileImage);
            $input['for_home_image'] = "$profileImage";
        }
        ForHomes::create($input);

        return redirect()->route('admin.brandsForHome.index')
            ->with('success','Product created successfully.');
    }
    public function createInterier(Request $request)
    {
        $request->validate([
            'interier_title_am' => 'required',
            'interier_title_ru' => 'required',
            'interier_title_en' => 'required',
            'interier_description_am' => 'required',
            'interier_description_ru' => 'required',
            'interier_description_en' => 'required',
            'interier_code' => 'required',
            'interier_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($interier = $request->file('interier_image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $interier->getClientOriginalExtension();
            $interier->move($destinationPath, $profileImage);
            $input['interier_image'] = "$profileImage";
        }
        Interier::create($input);

        return redirect()->route('admin.interier.index')
            ->with('success','Product created successfully.');
    }
    public function createCareproduct(Request $request)
    {
        $request->validate([
            'care_product_title_am' => 'required',
            'care_product_title_ru' => 'required',
            'care_product_title_en' => 'required',
            'care_product_description_am' => 'required',
            'care_product_description_ru' => 'required',
            'care_product_description_en' => 'required',
            'care_product_code' => 'required',
            'care_product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($care_product = $request->file('care_product_image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $care_product->getClientOriginalExtension();
            $care_product->move($destinationPath, $profileImage);
            $input['care_product_image'] = "$profileImage";
        }
        \App\Models\CareProducts::create($input);

        return redirect()->route('admin.care.index')
            ->with('success','Product created successfully.');
    }

    public function createSnowProduct(Request $request)
    {
        $request->validate([
            'snow_product_title_am' => 'required',
            'snow_product_title_ru' => 'required',
            'snow_product_title_en' => 'required',
            'snow_product_description_am' => 'required',
            'snow_product_description_ru' => 'required',
            'snow_product_description_en' => 'required',
            'snow_product_code' => 'required',
            'snow_product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($snow_product = $request->file('snow_product_image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $snow_product->getClientOriginalExtension();
            $snow_product->move($destinationPath, $profileImage);
            $input['snow_product_image'] = "$profileImage";
        }
        \App\Models\SnowProduct::create($input);

        return redirect()->route('admin.snow.index')
            ->with('success','Product created successfully.');
    }
    public function createBrushesProduct(Request $request)
    {
        $request->validate([
            'brushes_product_brand' =>'required',
            'brushes_product_type' =>'required',
            'brushes_product_title_am' => 'required',
            'brushes_product_title_ru' => 'required',
            'brushes_product_title_en' => 'required',
            'brushes_product_desc_am' => 'required',
            'brushes_product_desc_ru' => 'required',
            'brushes_product_desc_en' => 'required',
            'brushes_product_size' => 'required',
            'brushes_product_code' => 'required',
            'brushes_product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();

        if ($brushes_product = $request->file('brushes_product_image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $brushes_product->getClientOriginalExtension();
            $brushes_product->move($destinationPath, $profileImage);
            $input['brushes_product_image'] = "$profileImage";
        }
        GlassBrush::create($input);

        return redirect()->route('admin.brushes.index')
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

    public function edit($id)
    {
        $newBrands = NewBrand::find($id);
        return view('Admin.Brand.edit',[
            "newBrands"=>$newBrands
        ]);
    }
    public function editSingle($id)
    {
        $brandSingles = BrandSingle::find($id);
        return view('Admin.Brand.editSingle',[
            "brandSingles"=>$brandSingles
        ]);
    }
    public function editCategory($id)
    {
        $brandCategoryLists = BrandsCategoryLists::find($id);
        return view('Admin.Brand.editCategory',[
            "brandCategoryLists"=>$brandCategoryLists
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editClips($id)
    {
        $clips = Clips::find($id);
        return view('Admin.Brand.Amrakner.edit',[
            "clips"=>$clips
        ]);
    }
    public function editForHomes($id)
    {
        $ForHomes = ForHomes::find($id);
        return view('Admin.Brand.ForHomes.edit',[
            "ForHomes"=>$ForHomes
        ]);
    }
    public function editInterier($id)
    {
        $Interiers = Interier::find($id);
        return view('Admin.Brand.Interier.edit',[
            "Interiers"=>$Interiers
        ]);
    }
    public function editCareBrand($id)
    {
        $CareBrands = CareBrand::find($id);
        return view('Admin.Brand.Care.edit',[
            "CareBrands"=>$CareBrands
        ]);
    }
    public function editSnowBrand($id)
    {
        $SnowBrands = \App\Models\SnowBrand::find($id);
        return view('Admin.Brand.Snow.edit',[
            "SnowBrands"=>$SnowBrands
        ]);
    }
    public function editCareProduct($id)
    {
        $CareProducts = CareProducts::find($id);
        $CareBrands = CareBrand::all();
        return view('Admin.Brand.Care.editCareproduct',[
            "CareProducts"=>$CareProducts,
            "CareBrands"=>$CareBrands
        ]);
    }
    public function editBrushesProduct($id)
    {
        $BrushesProducts = GlassBrush::find($id);
        $BrushesTypes = BrushesType::all();
        $BrushesBrands = BrushesBrand::all();
        return view('Admin.Brand.Brushes.editProduct',[
            "BrushesProducts"=>$BrushesProducts,
            "BrushesTypes"=>$BrushesTypes,
            "BrushesBrands"=>$BrushesBrands
        ]);
    }
    public function editSnowProduct($id)
    {
        $SnowProducts = SnowProduct::find($id);
        $SnowBrands = SnowBrand::all();
        return view('Admin.Brand.Snow.editProduct',[
            "SnowProducts"=>$SnowProducts,
            "SnowBrands"=>$SnowBrands
        ]);
    }
    public function editFreshProduct($id)
    {
        $FreshProducts = FreshProduct::find($id);
        $FreshBrands = FreshBrand::all();
        $FreshTypes = FreshType::all();
        $FreshSmells = FreshSmell::all();
        return view('Admin.Brand.Fresh.editProduct',[
            "FreshProducts"=>$FreshProducts,
            "FreshBrands"=>$FreshBrands,
            "FreshTypes"=>$FreshTypes,
            "FreshSmells"=>$FreshSmells,
            ]);
    }
    public function editBrushes($id)
    {
        $BrushesBrands = \App\Models\BrushesBrand::find($id);
        return view('Admin.Brand.Brushes.editBrand',[
            'BrushesBrands'=>$BrushesBrands
        ]);
    }
    public function editFreshBrand($id)
    {
        $FreshBrands = \App\Models\FreshBrand::find($id);
        return view('Admin.Brand.Fresh.editBrand',[
            'FreshBrands'=>$FreshBrands
        ]);
    }
    public function editLampBrand($id)
    {
        $LampBrands = \App\Models\LampBrand::find($id);
        return view('Admin.Brand.Lamp.editBrand',[
            'LampBrands'=>$LampBrands
        ]);
    }
    public function editLampType($id)
    {
        $LampTypes = \App\Models\LampType::find($id);
        return view('Admin.Brand.Lamp.editType',[
            'LampTypes'=>$LampTypes
        ]);
    }
    public function editLampSlot($id)
    {
        $LampSlots = \App\Models\LampSlot::find($id);
        return view('Admin.Brand.Lamp.editSlot',[
            'LampSlots'=>$LampSlots
        ]);
    }
    public function editLampProduct($id)
    {
        $LampProducts = \App\Models\LampProducts::find($id);
        $LampBrands = LampBrand::all();
        $LampTypes = LampType::all();
        $LampSlots = LampSlot::all();
        return view('Admin.Brand.Lamp.editProduct',[
            'LampProducts'=>$LampProducts,
            'LampBrands'=>$LampBrands,
            'LampTypes'=>$LampTypes,
            'LampSlots'=>$LampSlots,
        ]);
    }
    public function editFreshType($id)
    {
        $FreshTypes = \App\Models\FreshType::find($id);
        return view('Admin.Brand.Fresh.editType',[
            'FreshTypes'=>$FreshTypes
        ]);
    }
    public function editFreshSmell($id)
    {
        $FreshSmells = \App\Models\FreshSmell::find($id);
        return view('Admin.Brand.Fresh.editSmell',[
            'FreshSmells'=>$FreshSmells
        ]);
    }
    public function editBrushesType($id)
    {
        $BrushesTypes  = \App\Models\BrushesType::find($id);
        return view('Admin.Brand.Brushes.editType',[
            'BrushesTypes'=> $BrushesTypes
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
        $newBrands = NewBrand::find($id);
        $newBrands->desc_am = $request->desc_am;
        $newBrands->desc_ru = $request->desc_ru;
        $newBrands->desc_en = $request->desc_en;
        $newBrands->save();
        return redirect()->route('admin.brand.index');
    }
 public function updateSingle(Request $request, $id)
    {
        $brandSingles = BrandSingle::find($id);
        $brandSingles->brand_name = $request->brand_name;
        $brandSingles->desc_am = $request->desc_am;
        $brandSingles->desc_ru = $request->desc_ru;
        $brandSingles->desc_en = $request->desc_en;
        $brandSingles->brand_unique = $request->brand_unique;
        $brandSingles->save();
        return redirect()->route('admin.brand.index');
    }
    public function updateCategory(Request $request, $id)
    {
        $brandCategoryLists = BrandsCategoryLists::find($id);
        $brandCategoryLists->brand_unique = $request->brand_unique;
        $brandCategoryLists->category_list = $request->category_list;
        $category_list_image = $request->file('category_images');
        if(!is_null($category_list_image)) {
            if(File::exists(public_path('public/image/'.$brandCategoryLists->category_images))) {
                File::delete(public_path('public/image/').$brandCategoryLists->category_images);
            }
            $name = uniqid() . '.' . $category_list_image->getClientOriginalExtension();
            $category_list_image->move(public_path('image'), $name);

            $brandCategoryLists->category_images = $name;
        }
        $brandCategoryLists->save();
        return redirect()->route('admin.brand.index');
    }

    public function updateClips(Request $request, $id)
    {
        $clips = Clips::find($id);
        $clips->clips_title = $request->clips_title;
        $clips->clips_code = $request->clips_code;
        $clips_image = $request-> file('clips_image');
        if(!is_null($clips_image)) {
            if(File::exists(public_path('public/image/' . $clips-> clips_image))) {
                File::delete(public_path('public/image/') . $clips-> clips_image);
            }
            $name = uniqid() . '.' . $clips_image->getClientOriginalExtension();
            $clips_image->move(public_path('public/image'), $name);

            $clips->clips_image = $name;
        }

        $clips->save();
        return redirect()->route('admin.brandsAmrak.index');

    }
    public function updateForHomes(Request $request, $id)
    {
        $ForHomes = ForHomes::find($id);
        $ForHomes->for_home_title_am = $request->for_home_title_am;
        $ForHomes->for_home_title_ru = $request->for_home_title_ru;
        $ForHomes->for_home_title_en = $request->for_home_title_en;
        $ForHomes->for_home_description_am = $request->for_home_description_am;
        $ForHomes->for_home_description_ru = $request->for_home_description_ru;
        $ForHomes->for_home_description_en = $request->for_home_description_en;
        $ForHomes->for_home_code = $request->for_home_code;
        $for_home_image = $request-> file('for_home_image');
        if(!is_null($for_home_image)) {
            if(File::exists(public_path('public/image/' . $ForHomes->for_home_image ))) {
                File::delete(public_path('public/image/') . $ForHomes->for_home_image);
            }
            $name = uniqid() . '.' . $for_home_image->getClientOriginalExtension();
            $for_home_image->move(public_path('public/image'), $name);

            $ForHomes->for_home_image = $name;
        }

        $ForHomes->save();
        return redirect()->route('admin.brandsForHome.index');
    }
    public function updateInterier(Request $request, $id)
    {
        $Interiers = Interier::find($id);
        $Interiers->interier_title_am = $request->interier_title_am;
        $Interiers->interier_title_ru = $request->interier_title_ru;
        $Interiers->interier_title_en = $request->interier_title_en;
        $Interiers->interier_description_am = $request->interier_description_am;
        $Interiers->interier_description_ru = $request->interier_description_ru;
        $Interiers->interier_description_en = $request->interier_description_en;
        $Interiers->interier_code = $request->interier_code;
        $interier_image = $request-> file('interier_image');
        if(!is_null($interier_image)) {
            if(File::exists(public_path('image/' . $Interiers->interier_image ))) {
                File::delete(public_path('image/') . $Interiers->interier_image);
            }
            $name = uniqid() . '.' . $interier_image->getClientOriginalExtension();
            $interier_image->move(public_path('image'), $name);

            $Interiers->interier_image = $name;
        }

        $Interiers->save();
        return redirect()->route('admin.interier.index');
    }
    public function updateCareProduct(Request $request, $id)
    {
        $CareProducts = CareProducts::find($id);
        $CareBrands = CareBrand::all();
        $CareProducts->care_product_brand = $request->care_product_brand;
        $CareProducts->care_product_title_am = $request->care_product_title_am;
        $CareProducts->care_product_title_ru = $request->care_product_title_ru;
        $CareProducts->care_product_title_en = $request->care_product_title_en;
        $CareProducts->care_product_description_am = $request->care_product_description_am;
        $CareProducts->care_product_description_ru = $request->care_product_description_ru;
        $CareProducts->care_product_description_en = $request->care_product_description_en;
        $CareProducts->care_product_code = $request->care_product_code;
        $care_product_image = $request-> file('care_product_image');
        if(!is_null($care_product_image)) {
            if(File::exists(public_path('image/' . $CareProducts->care_product_image ))) {
                File::delete(public_path('image/') . $CareProducts->care_product_image);
            }
            $name = uniqid() . '.' . $care_product_image->getClientOriginalExtension();
            $care_product_image->move(public_path('image'), $name);

            $CareProducts->care_product_image = $name;
        }

        $CareProducts->save();
        return redirect()->route('admin.care.index');
    }
    public function updateBrushesProduct(Request $request, $id)
    {
        $BrushesProducts = GlassBrush::find($id);
        $CareBrands = CareBrand::all();
        $BrushesProducts->brushes_product_brand = $request->brushes_product_brand;
        $BrushesProducts->brushes_product_title_am = $request->brushes_product_title_am;
        $BrushesProducts->brushes_product_title_ru = $request->brushes_product_title_ru;
        $BrushesProducts->brushes_product_title_en = $request->brushes_product_title_en;
        $BrushesProducts->brushes_product_desc_am = $request->brushes_product_desc_am;
        $BrushesProducts->brushes_product_desc_ru = $request->brushes_product_desc_ru;
        $BrushesProducts->brushes_product_desc_en = $request->brushes_product_desc_en;
        $BrushesProducts->brushes_product_size = $request->brushes_product_size;
        $BrushesProducts->brushes_product_code = $request->brushes_product_code;
        $brushes_product_image = $request-> file('brushes_product_image');

        if(!is_null($brushes_product_image)) {
            if(File::exists(public_path('image/' . $BrushesProducts->brushes_product_image ))) {
                File::delete(public_path('image/') . $BrushesProducts->brushes_product_image);
            }
            $name = uniqid() . '.' . $brushes_product_image->getClientOriginalExtension();
            $brushes_product_image->move(public_path('image'), $name);

            $BrushesProducts->brushes_product_image = $name;
        }

        $BrushesProducts->save();
        return redirect()->route('admin.brushes.index');
    }
    public function updateFreshProduct(Request $request, $id)
    {
        $FreshProducts = FreshProduct::find($id);
        $FreshBrands = FreshBrand::all();
        $FreshTypes = FreshType::all();
        $FreshSmells = FreshSmell::all();
        $FreshProducts->fresh_product_brand = $request->fresh_product_brand;
        $FreshProducts->fresh_product_type = $request->fresh_product_type;
        $FreshProducts->fresh_product_smell = $request->fresh_product_smell;
        $FreshProducts->fresh_product_title_am = $request->fresh_product_title_am;
        $FreshProducts->fresh_product_title_ru = $request->fresh_product_title_ru;
        $FreshProducts->fresh_product_title_en = $request->fresh_product_title_en;
        $FreshProducts->fresh_product_desc_am = $request->fresh_product_desc_am;
        $FreshProducts->fresh_product_desc_ru = $request->fresh_product_desc_ru;
        $FreshProducts->fresh_product_desc_en = $request->fresh_product_desc_en;
        $FreshProducts->fresh_product_code = $request->fresh_product_code;
        $fresh_product_image = $request-> file('fresh_product_image');

        if(!is_null($fresh_product_image)) {
            if(File::exists(public_path('image/' . $FreshProducts->fresh_product_image ))) {
                File::delete(public_path('image/') . $FreshProducts->fresh_product_image);
            }
            $name = uniqid() . '.' . $fresh_product_image->getClientOriginalExtension();
            $fresh_product_image->move(public_path('image'), $name);

            $FreshProducts->fresh_product_image = $name;
        }

        $FreshProducts->save();
        return redirect()->route('admin.fresh.index');
    }
    public function updateLampProduct(Request $request, $id)
    {
        $LampProducts = LampProducts::find($id);
        $LampBrands = LampBrand::all();
        $LampTypes = LampType::all();
        $LampSolts = LampSlot::all();
        $LampProducts->lamp_product_brand = $request->lamp_product_brand;
        $LampProducts->lamp_product_type = $request->lamp_product_type;
        $LampProducts->lamp_product_slot = $request->lamp_product_slot;
        $LampProducts->lamp_product_title_am = $request->lamp_product_title_am;
        $LampProducts->lamp_product_title_ru = $request->lamp_product_title_ru;
        $LampProducts->lamp_product_title_en = $request->lamp_product_title_en;
        $LampProducts->lamp_product_desc_am = $request->lamp_product_desc_am;
        $LampProducts->lamp_product_desc_ru = $request->lamp_product_desc_ru;
        $LampProducts->lamp_product_desc_en = $request->lamp_product_desc_en;
        $LampProducts->lamp_product_code = $request->lamp_product_code;
        $lamp_product_image = $request-> file('lamp_product_image');

        if(!is_null($lamp_product_image)) {
            if(File::exists(public_path('image/' . $LampProducts->lamp_product_image ))) {
                File::delete(public_path('image/') .$LampProducts->lamp_product_image);
            }
            $name = uniqid() . '.' . $lamp_product_image->getClientOriginalExtension();
            $lamp_product_image->move(public_path('image'), $name);

            $LampProducts->lamp_product_image = $name;
        }

        $LampProducts->save();
        return redirect()->route('admin.lamp.index');
    }
    public function updateSnowProduct(Request $request, $id)
    {
        $SnowProducts = SnowProduct::find($id);
        $SnowBrands = SnowBrand::all();
        $SnowProducts->snow_product_brand = $request->snow_product_brand;
        $SnowProducts->snow_product_title_am = $request->snow_product_title_am;
        $SnowProducts->snow_product_title_ru = $request->snow_product_title_ru;
        $SnowProducts->snow_product_title_en = $request->snow_product_title_en;
        $SnowProducts->snow_product_description_am = $request->snow_product_description_am;
        $SnowProducts->snow_product_description_ru = $request->snow_product_description_ru;
        $SnowProducts->snow_product_description_en = $request->snow_product_description_en;
        $SnowProducts->snow_product_code = $request->snow_product_code;
        $snow_product_image = $request-> file('snow_product_image');
        if(!is_null($snow_product_image)) {
            if(File::exists(public_path('image/' . $SnowProducts->snow_product_image ))) {
                File::delete(public_path('image/') . $SnowProducts->snow_product_image);
            }
            $name = uniqid() . '.' . $snow_product_image->getClientOriginalExtension();
            $snow_product_image->move(public_path('image'), $name);

            $SnowProducts->snow_product_image = $name;
        }

        $SnowProducts->save();
        // $CareBrands->save();
        return redirect()->route('admin.snow.index');
    }
    public function updateCareBrand(Request $request, $id)
    {
        $CareBrands = CareBrand::find($id);
        $CareBrands->care_brands = $request->care_brands;

        $CareBrands->save();
        return redirect()->route('admin.care.index');
    }
    public function updateSnowBrand(Request $request, $id)
    {
        $SnowBrands = SnowBrand::find($id);
        $SnowBrands->snow_brands = $request->snow_brands;

        $SnowBrands->save();
        return redirect()->route('admin.snow.index');
    }
    public function updateGlassBrushesBrand(Request $request, $id)
    {
        $BrushesBrands = BrushesBrand::find($id);
        $BrushesBrands->brushes_brands = $request->brushes_brands;

        $BrushesBrands->save();
        return redirect()->route('admin.brushes.index');
    }
    public function updateGlassBrushesType(Request $request, $id)
    {
        $BrushesTypes = BrushesType::find($id);
        $BrushesTypes->brushes_type = $request->brushes_type;

        $BrushesTypes->save();
        return redirect()->route('admin.brushes.index');
    }
    public function updateFreshBrand(Request $request, $id)
    {
        $FreshBrands = FreshBrand::find($id);
        $FreshBrands->fresh_brand = $request->fresh_brand;

        $FreshBrands->save();
        return redirect()->route('admin.fresh.index');
    }
    public function updateLampBrand(Request $request, $id)
    {
        $LampBrands = LampBrand::find($id);
        $LampBrands->lamp_brand = $request->lamp_brand;

        $LampBrands->save();
        return redirect()->route('admin.lamp.index');
    }
    public function updateFreshType(Request $request, $id)
    {
        $FreshTypes = FreshType::find($id);
        $FreshTypes->fresh_type = $request->fresh_type;

        $FreshTypes->save();
        return redirect()->route('admin.fresh.index');
    }
    public function updateLampType(Request $request, $id)
    {
        $LampTypes = LampType::find($id);
        $LampTypes->lamp_type = $request->lamp_type;

        $LampTypes->save();
        return redirect()->route('admin.lamp.index');
    }
    public function updateLampSlot(Request $request, $id)
    {
        $LampSlots = LampSlot::find($id);
        $LampSlots->lamp_slot = $request->lamp_slot;

        $LampSlots->save();
        return redirect()->route('admin.lamp.index');
    }
    public function updateFreshSmell(Request $request, $id)
    {
        $FreshSmells = FreshSmell::find($id);
        $FreshSmells->fresh_smell = $request->fresh_smell;

        $FreshSmells->save();
        return redirect()->route('admin.fresh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newBrands = NewBrand::find($id);
        $newBrands->delete();
        return back();
    }
    public function destroySingle($id)
    {
        $brandSingles = BrandSingle::find($id);
        $brandSingles->delete();
        return back();
    }
    public function destroyCategory($id)
    {
        $brandCategoryLists = BrandsCategoryLists::find($id);
        if(File::exists(public_path('public/image/' . $brandCategoryLists->category_images))) {
            File::delete(public_path('public/image/') . $brandCategoryLists->category_images);
        }
        $brandCategoryLists->delete();
        return back();
    }
    public function destroyClips($id)
    {
        $clips = Clips::find($id);
        if(File::exists(public_path('image/' . $clips->clips_image))) {
            File::delete(public_path('image/') . $clips->clips_image);
        }
        $clips -> delete();
        return back();
    }
    public function destroyForHomes($id)
    {
        $ForHomes = ForHomes::find($id);
        if(File::exists(public_path('image/' . $ForHomes->for_home_image))) {
            File::delete(public_path('image/') . $ForHomes->for_home_image);
        }
        $ForHomes -> delete();
        return back();
    }
    public function destroyInterier($id)
    {
        $Interiers = Interier::find($id);
        if(File::exists(public_path('image/' . $Interiers->interier_image))) {
            File::delete(public_path('image/') . $Interiers->interier_image);
        }
        $Interiers -> delete();
        return back();
    }
    public function destroyCareProduct($id)
    {
        $CareProducts = CareProducts::find($id);
        if(File::exists(public_path('image/' . $CareProducts->care_product_image))) {
            File::delete(public_path('image/') . $CareProducts->care_product_image);
        }
        $CareProducts -> delete();
        return back();
    }
    public function destroySnowProduct($id)
    {
        $SnowProducts = SnowProduct::find($id);
        if(File::exists(public_path('image/' . $SnowProducts->snow_product_image))) {
            File::delete(public_path('image/') . $SnowProducts->snow_product_image);
        }
        $SnowProducts -> delete();
        return back();
    }
    public function destroyBrushesProduct($id)
    {
        $BrushesProducts = GlassBrush::find($id);
        if(File::exists(public_path('image/' . $BrushesProducts->brushes_product_image))) {
            File::delete(public_path('image/') . $BrushesProducts->brushes_product_image);
        }
        $BrushesProducts -> delete();
        return back();
    }
    public function destroyFreshProduct($id)
    {
        $FreshProducts = FreshProduct::find($id);
        if(File::exists(public_path('image/' . $FreshProducts->fresh_product_image))) {
            File::delete(public_path('image/') . $FreshProducts->fresh_product_image);
        }
        $FreshProducts -> delete();
        return back();
    }
    public function destroyLampProduct($id)
    {
        $LampProducts = LampProducts::find($id);
        if(File::exists(public_path('image/' . $LampProducts->lamp_product_image))) {
            File::delete(public_path('image/') . $LampProducts->lamp_product_image);
        }
        $LampProducts -> delete();
        return back();
    }
    public function destroyCareBrand($id)
    {
        $CareBrands = CareBrand::find($id);

        $CareBrands -> delete();
        return back();
    }
    public function destroySnowBrand($id)
    {
        $SnowBrands = SnowBrand::find($id);

        $SnowBrands -> delete();
        return back();
    }
    public function destroyBrushesBrand($id)
    {
        $BrushesBrands = BrushesBrand::find($id);

        $BrushesBrands -> delete();
        return back();
    }
    public function destroyBrushesType($id)
    {
        $BrushesType = BrushesType::find($id);

        $BrushesType -> delete();
        return back();
    }
    public function destroyFreshBrand($id)
    {
        $FreshBrands = FreshBrand::find($id);

        $FreshBrands -> delete();
        return back();
    }
    public function destroyLampType($id)
    {
        $LampTypes = LampType::find($id);

        $LampTypes -> delete();
        return back();
    }
    public function destroyLampSlot($id)
    {
        $LampSlots = LampSlot::find($id);

        $LampSlots -> delete();
        return back();
    }
    public function destroyFreshType($id)
    {
        $FreshTypes = FreshType::find($id);

        $FreshTypes -> delete();
        return back();
    }
    public function destroyFreshSmell($id)
    {
        $FreshSmells = FreshSmell::find($id);

        $FreshSmells -> delete();
        return back();
    }
}
