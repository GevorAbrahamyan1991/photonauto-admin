<?php

namespace App\Http\Controllers;

use App\Models\BrushesBrand;
use App\Models\BrushesType;
use App\Models\GlassBrush;
use Illuminate\Http\Request;

class BrushFilterController extends Controller
{
    public function getBrands()
    {
        return response()->json([
            'data' => BrushesBrand::all()
        ]);
    }

    public function getTypes()
    {
        return response()->json([
            'data' => BrushesType::all()
        ]);
    }

    public function getProducts()
    {
        $lmps = GlassBrush::all()->map(function ($item) {
            $item->brushes_product_image = asset('image/'.$item->brushes_product_image);
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

        if (
            (empty($brands) || !isset($brands))
            && (empty($types) || !isset($types))
        ){
            return response()->json([
                'data' => GlassBrush::all()->map(function ($item) {
                    $item->brushes_product_image = asset('image/'.$item->brushes_product_image);
                    return $item;
                })
            ]);
        }

        $qb = GlassBrush::query();

        if (!empty($brands) && isset($brands)){
            $qb->whereIn('brushes_product_brand', $brands);
        }

        if (!empty($types) && isset($types)){
            $qb->whereIn('brushes_product_type', $types);
        }

        $result = $qb->get();

        $lmps = $result->map(function ($item) {
            $item->brushes_product_image = asset('image/'.$item->brushes_product_image);
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
