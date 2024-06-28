<?php

use App\Http\Controllers\Admin\LampsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\HomeBrandImageController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\HomeController;

Route::get('view', [LanguageController::class, 'view'])->name('view');
Route::get('language-change', [LanguageController::class, 'changeLanguage'])->name('changeLanguage');



Route::group(['namespace' => 'App'],function(){
   Route::get('/',[HomeController::class,'index'])->name('app.home');
});
Route::group(['prefix'=>'/photonauto_admin','namespace' => 'Admin', 'middleware' => 'auth'],function (){
    Route::get('/',[AdminHomeController::class,'index'])->name('admin.home.index');
    Route::post('/create/caron_admin',[AdminHomeController::class,'create'])->name('admin.home.create');
    Route::post('/createHomeDatas',[AdminHomeController::class,'createHomeDatas'])->name('admin.home.createHomeDatas');
    Route::post('/createCarousel',[AdminHomeController::class,'createCarouselImages'])->name('carousel.createCarousel');
    Route::get('/edit/{id}',[AdminHomeController::class,'edit'])->name('admin.home.edit');
    Route::get('/editCarousel/{id}',[AdminHomeController::class,'editCarousel'])->name('admin.homeCarousel.edit');
    Route::get('/editHomeData/{id}',[AdminHomeController::class,'editHomeData'])->name('admin.editHomeData.edit');
    Route::put('/update/{id}',[AdminHomeController::class,'update'])->name('admin.home.update');
    Route::put('/updateCarousel/{id}',[AdminHomeController::class,'updateCarousel'])->name('admin.homeCarousel.update');
    Route::put('/updateHomeData/{id}',[AdminHomeController::class,'updateHomeData'])->name('admin.updateHomeData.update');
    Route::delete('/destroy/{id}',[AdminHomeController::class,'destroy'])->name('admin.home.delete');
    Route::delete('/destroyCarousel/{id}',[AdminHomeController::class,'destroyCarousel'])->name('admin.home.deleteCarousel');
    Route::delete('/destroyHomeData/{id}',[AdminHomeController::class,'destroyHomeData'])->name('admin.home.deleteHomeData');
    Route::get('/search',[\App\Http\Controllers\BrandController::class,'search'])->name('search');

//    About
    Route::get('about/caron_admin',[\App\Http\Controllers\AboutController::class,'index'])->name('admin.about.index');
    Route::post('aboutCreate/caron_admin',[\App\Http\Controllers\AboutController::class,'create'])->name('admin.about.create');
    Route::get('/about/edit/caron_admin/{id}',[\App\Http\Controllers\AboutController::class,'edit'])->name('admin.about.edit');
    Route::put('/updateAbout/caron_admin/{id}',[\App\Http\Controllers\AboutController::class,'update'])->name('admin.about.update');
    Route::delete('/destroyAbout/caron_admin/{id}',[\App\Http\Controllers\AboutController::class,'destroy'])->name('admin.about.delete');


    // News
    Route::get('news/caron_admin',[\App\Http\Controllers\NewsController::class,'index'])->name('admin.news.index');
    Route::post('newsCreate/caron_admin',[\App\Http\Controllers\NewsController::class,'create'])->name('admin.news.create');
    Route::get('/news/edit/caron_admin/{id}',[\App\Http\Controllers\NewsController::class,'edit'])->name('admin.news.edit');
    Route::put('/updateNews/caron_admin/{id}',[\App\Http\Controllers\NewsController::class,'update'])->name('admin.news.update');
    Route::delete('/destroyNews/caron_admin/{id}',[\App\Http\Controllers\NewsController::class,'destroy'])->name('admin.news.delete');
    Route::get('/search',[\App\Http\Controllers\NewsController::class,'search'])->name('news.search');

 
    // Partners
    Route::get('partners/caron_admin',[\App\Http\Controllers\PartnersController::class,'index'])->name('admin.partners.index');
    Route::post('partnersCreate/caron_admin',[\App\Http\Controllers\PartnersController::class,'create'])->name('admin.partners.create');
    Route::post('partnersCreateText/caron_admin',[\App\Http\Controllers\PartnersController::class,'createText'])->name('admin.partnersText.create');
    Route::post('caron_admin/regions',[\App\Http\Controllers\PartnersController::class,'createRegions'])->name('admin.partnersRegions.create');

    Route::get('caron_admin/partners-region/{id}',[\App\Http\Controllers\PartnersController::class,'editRegions'])->name('admin.partnersRegions.edit');
    Route::get('/partners/edit/caron_admin/{id}',[\App\Http\Controllers\PartnersController::class,'edit'])->name('admin.partners.edit');
    Route::get('/partnersText/edit/caron_admin/{id}',[\App\Http\Controllers\PartnersController::class,'editText'])->name('admin.partnersText.edit');
    Route::put('/updatePartners/caron_admin/{id}',[\App\Http\Controllers\PartnersController::class,'update'])->name('admin.partners.update');
    Route::put('/updatePartnersText/caron_admin/{id}',[\App\Http\Controllers\PartnersController::class,'updateText'])->name('admin.partnersText.update');
    Route::put('/updatePartnersRegion/caron_admin/{id}',[\App\Http\Controllers\PartnersController::class,'updateRegions'])->name('admin.partnersRegions.update');
    Route::delete('/destroyPartners/caron_admin/{id}',[\App\Http\Controllers\PartnersController::class,'destroy'])->name('admin.partners.delete');
    Route::delete('/destroyPartnersText/caron_admin/{id}',[\App\Http\Controllers\PartnersController::class,'destroyText'])->name('admin.partnersText.delete');
    Route::delete('/destroyPartnersREgions/caron_admin/{id}',[\App\Http\Controllers\PartnersController::class,'destroyRegions'])->name('admin.partnersRegions.delete');

    Route::get('/caron_admin/lamps',[LampsController::class,'index'])->name('admin.lamps.index');
    Route::get('/caron_admin/lamps/create',[LampsController::class,'create'])->name('admin.lamps.create');
    Route::get('/caron_admin/lamps/all',[LampsController::class,'all'])->name('admin.lamps.all');
    Route::post('/caron_admin/lamps/store',[LampsController::class,'store'])->name('admin.lamps.store');
    Route::get('/caron_admin/lamps/show/{id}',[LampsController::class,'show'])->name('admin.lamps.show');
    Route::get('/caron_admin/lamps/edit/{id}',[LampsController::class,'edit'])->name('admin.lamps.edit');
    Route::put('/caron_admin/lamps/update/{id}',[LampsController::class,'update'])->name('admin.lamps.update');
    Route::delete('/caron_admin/lamps/delete/{id}',[LampsController::class,'destroy'])->name('admin.lamps.destroy');
    Route::delete('/caron_admin/lamps-images-destroy/{id}', [LampsController::class, 'deleteImages'])->name('admin.lampsImages.delete');
    

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';