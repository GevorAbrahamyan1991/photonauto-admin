<?php

namespace App\Http\Controllers;

use App\Models\SnowBrand;
use App\Models\SnowProduct;
use Illuminate\Http\Request;

class SnowFilterController extends Controller
{
    public function getBrands()
    {
        return response()->json([
            'data' => SnowBrand::all()
        ]);
    }

    public function getProducts()
    {
        $lmps = SnowProduct::all()->map(function ($item) {
            $item->snow_product_image = asset('image/'.$item->snow_product_image);
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
                'data' => SnowProduct::all()->map(function ($item) {
                    $item->snow_product_image = asset('image/'.$item->snow_product_image);
                    return $item;
                })
            ]);
        }

        $dt = SnowProduct::whereIn('snow_product_brand',$brands)
            ->get();

        $lmps = $dt->map(function ($item) {
            $item->snow_product_image = asset('image/'.$item->snow_product_image);
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
