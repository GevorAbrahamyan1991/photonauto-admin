<?php

use App\Http\Controllers\BrushFilterController;
use App\Http\Controllers\CareFilterController;
use App\Http\Controllers\FreshenerFilterController;
use App\Http\Controllers\LampFilterController;
use App\Http\Controllers\SnowFilterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminHomeController;
use \App\Models\HomeBrandImage;
use \App\Models\HomeCarouselImages;
use \App\Models\About;
use \App\Models\Product;
use \App\Models\NewBrand;
use \App\Models\BrandSingle;
use \App\Models\BrandsCategoryLists;
use \App\Models\News;
use \App\Models\PreNews;
use \App\Models\HomeDatas;
use \App\Models\Partners;
use \App\Models\CareBrand;
use \App\Models\CareProducts;
use App\Models\Lamps;
use App\Models\LampsImages;
use App\Models\Regions;

Route::get('home_brand_images', function () {
    $home_brand_images = HomeBrandImage::all();
    return $home_brand_images;
});
Route::get('lamps', function () {
    $lamps = Lamps::all();
    return $lamps;
});
Route::get('lamps_images', function () {
    $lampsImages = LampsImages::all();
    return $lampsImages;
});
Route::get('home_carousel_images', function () {
    $carousel_images = HomeCarouselImages::all();
    return $carousel_images;
});
Route::get('caron_about', function () {
    $abouts = About::all();
    return $abouts;
});
Route::get('caron_product', function () {
    $products = Product::all();
    return $products;
});
Route::get('new_brands', function () {
    $newBrands = NewBrand::all();
    return $newBrands;
});
Route::get('new_brands_single', function () {
    $brandSingles = BrandSingle::all();
    return $brandSingles;
});
Route::get('new_brands_category', function () {
    $brandCategoryLists = BrandsCategoryLists::all();
    return $brandCategoryLists;
});
Route::get('caron_news', function () {
    $news = News::all();
    return $news;
});
Route::get('pre_news', function () {
    $preNews = PreNews::all();
    return $preNews;
});
Route::get('caron_data', function () {
    $homeDatas = HomeDatas::all();
    return $homeDatas;
});
Route::get('caron_partner', function () {
    $partners = Partners::all();
    return $partners;
});
Route::get('regions', function () {
    $regions = Regions::all();
    return $regions;
});
Route::get('caron_partnerText', function () {
    $partnersTexts = \App\Models\PartnerTexts::all();
    return $partnersTexts;
});

Route::get('caron_brand_care_brand', function () {
        $CareBrands = CareBrand::all();
        return $CareBrands;
});
Route::get('caron_brand_care_product', function () {
        $CareProducts = CareProducts::all();
        return $CareProducts;
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// FILTER
Route::controller(LampFilterController::class)->prefix('lamp')->group(function () {
    Route::get('brands','getBrands');
    Route::get('types','getTypes');
    Route::get('slots','getSlots');
    Route::get('products','getProducts');
    Route::get('products_filter','filterProducts');
});

Route::controller(FreshenerFilterController::class)->prefix('freshener')->group(function () {
    Route::get('brands','getBrands');
    Route::get('types','getTypes');
    Route::get('smells','getSmells');
    Route::get('products_filter','filterProducts');
});

Route::controller(BrushFilterController::class)->prefix('brush')->group(function () {
    Route::get('brands','getBrands');
    Route::get('types','getTypes');
    Route::get('products_filter','filterProducts');
});

Route::controller(SnowFilterController::class)->prefix('snow')->group(function () {
    Route::get('brands','getBrands');
    Route::get('products_filter','filterProducts');
});

Route::controller(CareFilterController::class)->prefix('care')->group(function () {
    Route::get('brands','getBrands');
    Route::get('products_filter','filterProducts');
});