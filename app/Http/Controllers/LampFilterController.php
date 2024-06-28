<?php

namespace App\Http\Controllers;

use App\Models\LampBrand;
use App\Models\LampProducts;
use App\Models\LampSlot;
use App\Models\LampType;
use Illuminate\Http\Request;

class LampFilterController extends Controller
{
    public function getBrands()
    {
        return response()->json([
            'data' => LampBrand::all()
        ]);
    }

    public function getTypes()
    {
        return response()->json([
            'data' => LampType::all()
        ]);
    }

    public function getSlots()
    {
        return response()->json([
            'data' => LampSlot::all()
        ]);
    }

    public function getProducts()
    {
        $lmps = LampProducts::all()->map(function ($item) {
            $item->lamp_product_image = asset('image/'.$item->lamp_product_image);
            return $item;
        });
        return response()->json([
            'data' => $lmps
        ]);
    }

    public function filterProducts(Request $request)
    {
        $brands = $this->returnUniqueNotDuplicate($request->get('brand') ?? []);
        $types = $this->returnUniqueNotDuplicate($request->get('type') ?? []);
        $slots = $this->returnUniqueNotDuplicate($request->get('slot') ?? []);

        $qb = LampProducts::query();

        if (!empty($brands) && isset($brands)){
            $qb->whereIn('lamp_product_brand', $brands);
        }

        if (!empty($types) && isset($types)){
            $qb->whereIn('lamp_product_type', $types);
        }

        if (!empty($slots) && isset($slots)){
            $qb->whereIn('lamp_product_slot', $slots);
        }

        $result = $qb->get();

        $lmps = $result->map(function ($item) {
            $item->lamp_product_image = asset('image/'.$item->lamp_product_image);
            return $item;
        });
        return response()->json([
            'data' => $lmps,
        ]);
    }


    private function returnUniqueNotDuplicate($arr){
        $unique = array_unique($arr);
        $dupes = array_diff_key($arr, $unique);

        $newArr = [];
        foreach($unique as $it){
            if(!in_array($it,$dupes)){
                array_push($newArr,$it);
            }
        }
        return $newArr;
    }
}
