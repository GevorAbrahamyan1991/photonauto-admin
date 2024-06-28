<?php

namespace App\Http\Controllers;

use App\Models\FreshBrand;
use App\Models\FreshProduct;
use App\Models\FreshSmell;
use App\Models\FreshType;
use Illuminate\Http\Request;

class FreshenerFilterController extends Controller
{
    public function getBrands()
    {
        return response()->json([
            'data' => FreshBrand::all()
        ]);
    }

    public function getTypes()
    {
        return response()->json([
            'data' => FreshType::all()
        ]);
    }

    public function getSmells()
    {
        return response()->json([
            'data' => FreshSmell::all()
        ]);
    }

    public function getProducts()
    {
        $lmps = FreshProduct::all()->map(function ($item) {
            $item->lamp_product_image = asset('image/'.$item->fresh_product_image);
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
        $smells = $this->returnUniqueNotDuplicate($request->get('smell') ?? []);

        if (
            (empty($brands) || !isset($brands))
            && (empty($types) || !isset($types))
            && (empty($smells) || !isset($smells))
        ){
            return response()->json([
                'data' => FreshProduct::all()->map(function ($item) {
                    $item->fresh_product_image = asset('image/'.$item->fresh_product_image);
                    return $item;
                })
            ]);
        }


        $qb = FreshProduct::query();

        if (!empty($brands) && isset($brands)){
            $qb->whereIn('fresh_product_brand', $brands);
        }

        if (!empty($types) && isset($types)){
            $qb->whereIn('fresh_product_type', $types);
        }

        if (!empty($smells) && isset($smells)){
            $qb->whereIn('fresh_product_smell', $smells);
        }

        $result = $qb->get();

        $lmps = $result->map(function ($item) {
            $item->fresh_product_image = asset('image/'.$item->fresh_product_image);
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
