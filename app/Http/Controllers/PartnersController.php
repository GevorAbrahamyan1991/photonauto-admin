<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use App\Models\PartnerTexts;
use App\Models\Regions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partners::all();
        $partnerTexts = PartnerTexts::all();
        $regions = Regions::all();
        return view('Admin.Partners.index',[
           "partners"=>$partners,
            "partnerTexts"=>$partnerTexts,
            "regions"=>$regions
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
        'address_am' => 'required',
        'address_ru' => 'required',
        'address_en' => 'required',
        'partner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

        $input = $request->all();
        if ($partners_image = $request->file('partner_image')) {
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $partners_image->getClientOriginalExtension();
            $partners_image->move($destinationPath, $profileImage);
            $input['partner_image'] = "$profileImage";
        }


        Partners::create($input);

        return redirect()->route('admin.partners.index')
            ->with('success','Product created successfully.');
    }
    public function createText(Request $request)
    {
        $request->validate([
        'desc_am' => 'required',
        'desc_ru' => 'required',
        'desc_en' => 'required',

    ]);

        $input = $request->all();

        PartnerTexts::create($input);

        return redirect()->route('admin.partners.index')
            ->with('success','Product created successfully.');
    }
    public function createRegions(Request $request)
    {
        $request->validate([
        'region_am' => 'required',
        'region_ru' => 'required',
        'region_en' => 'required',

    ]);

        $input = $request->all();

        Regions::create($input);

        return redirect()->route('admin.partners.index')
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
        $partners = Partners::find($id);
        $regions = Regions::all();
        $selectedRegion = $partners->region_en;
        return view('Admin.Partners.edit',[
           "partners"=>$partners,
           "regions"=>$regions,
           "selectedRegion"=>$selectedRegion,
        ]);
    }
    public function editRegions($id)
    {
        $regions = Regions::find($id);
        return view('Admin.Partners.editRegions',[
           "regions"=>$regions,
        ]);
    }
    public function editText($id)
    {
        $partnerTexts = PartnerTexts::find($id);
        return view('Admin.Partners.editText',[
           "partnerTexts"=>$partnerTexts,
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
        $partners = Partners::find($id);
        $partners->location = $request -> location;
        $partners->title_am = $request -> title_am;
        $partners->title_ru = $request -> title_ru;
        $partners->title_en = $request -> title_en;
        $partners->address_am = $request -> address_am;
        $partners->address_ru = $request -> address_ru;
        $partners->address_en = $request -> address_en;
        $partner_image = $request->file('partner_image');
        if(!is_null($partner_image)) {
            if(File::exists(public_path('public/image/' . $partners->partner_image))) {
                File::delete(public_path('public/image/') . $partners->partner_image);
            }
            $name = uniqid() . '.' . $partner_image->getClientOriginalExtension();
            $partner_image->move(public_path('image'), $name);

            $partners->partner_image = $name;
        }


        $partners->save();
        return redirect()->route('admin.partners.index');
    }
    public function updateText(Request $request, $id)
    {
        $partnersTexts = PartnerTexts::find($id);
        $partnersTexts->desc_am = $request -> desc_am;
        $partnersTexts->desc_ru = $request -> desc_ru;
        $partnersTexts->desc_en = $request -> desc_en;


        $partnersTexts->save();
        return redirect()->route('admin.partners.index');
    }
    public function updateRegions(Request $request, $id)
    {
        $regions = Regions::find($id);
        $regions->region_am = $request -> region_am;
        $regions->region_ru = $request -> region_ru;
        $regions->region_en = $request -> region_en;


        $regions->save();
        return redirect()->route('admin.partners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partners = Partners::find($id);
        if(File::exists(public_path('public/image/' . $partners->partner_image))) {
            File::delete(public_path('public/image/') . $partners->partner_image);
        }
        $partners -> delete();
        return back();
    }
    public function destroyText($id)
    {
        $partnersTexts = PartnerTexts::find($id);

        $partnersTexts -> delete();
        return back();
    }
    public function destroyRegions($id)
    {
        $regions = Regions::find($id);

        $regions -> delete();
        return back();
    }
}