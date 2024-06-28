<?php

namespace App\Http\Controllers;

use App\Models\CareBrand;
use App\Models\CareProducts;
use Illuminate\Http\Request;

class CareFilterController extends Controller
{
    public function getBrands()
    {
        return response()->json([
            'data' => CareBrand::all()
        ]);
    }

    public function getProducts()
    {
        $lmps = CareProducts::all()->map(function ($item) {
            $item->care_product_image = asset('image/'.$item->care_product_image);
            return $item;
        });
        return response()->json([
            'data' => $lmps
        ]);
    }

    public function filterProducts(Request $request)
    {
        $brands = $this->returnUniqueNotDuplicate($request->get('brand') ?? []);

        if (
            (empty($brands) || !isset($brands))
        ){
            return response()->json([
                'data' => CareProducts::all()->map(function ($item) {
                    $item->care_product_image = asset('image/'.$item->care_product_image);
                    return $item;
                })
            ]);
        }

        $dt = CareProducts::whereIn('care_product_brand',$brands)
            ->get();

        $lmps = $dt->map(function ($item) {
            $item->care_product_image = asset('image/'.$item->care_product_image);
            return $item;
        });
        return response()->json([
            'data' => $lmps
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
