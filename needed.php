//Route::get('caron_admin',[AdminHomeController::class,'index'])->name('caron_admin_index');
//
//
//
//Route::resource('home_brand', HomeBrandImageController::class);
//Route::get('edit/home_brand/',[HomeBrandImageController::class,'edit'])->name('home_brand.edit');

// Brands
// Route::get('brands/caron_admin',[\App\Http\Controllers\BrandController::class,'index'])->name('admin.brands.index');
// brand clips
//
Route::get('brandsAmrak/caron_admin',[\App\Http\Controllers\BrandController::class,'indexAmrak'])->name('admin.brandsAmrak.index');
//
Route::post('clipsCreate/caron_admin',[\App\Http\Controllers\BrandController::class,'createClips'])->name('admin.brandClips.create');
//
Route::get('/brandsClips/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editClips'])->name('admin.brandClips.edit');
//
Route::put('/updateBrandClip/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateClips'])->name('admin.brandClip.update');
//
Route::delete('/destroyClips/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyClips'])->name('admin.clips.delete');

//ForHome
//
Route::get('brandsForHome/caron_admin',[\App\Http\Controllers\BrandController::class,'indexForHome'])->name('admin.brandsForHome.index');
//
Route::post('createForHome/caron_admin',[\App\Http\Controllers\BrandController::class,'createForHomes'])->name('admin.brandsForHome.create');
//
Route::get('/editForHomes/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editForHomes'])->name('admin.ForHome.edit');
//
Route::put('/updateForHomes/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateForHomes'])->name('admin.ForHomes.update');
//
Route::delete('/destroyForHomes/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyForHomes'])->name('admin.ForHomes.delete');

//Interier
//
Route::get('interier/caron_admin',[\App\Http\Controllers\BrandController::class,'indexInterier'])->name('admin.interier.index');
//
Route::post('createInterier/caron_admin',[\App\Http\Controllers\BrandController::class,'createInterier'])->name('admin.interier.create');
//
Route::get('/editInterier/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editInterier'])->name('admin.interier.edit');
//
Route::put('/updateinterier/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateInterier'])->name('admin.interier.update');
//
Route::delete('/destroyInterier/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyInterier'])->name('admin.interier.delete');
//Care
// Route::get('care/caron_admin',[\App\Http\Controllers\BrandController::class,'indexCare'])->name('admin.care.index');
//
Route::post('createCareBrand/caron_admin',[\App\Http\Controllers\BrandController::class,'createCareBrand'])->name('admin.care.create');
//
Route::get('/editCare/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editCareBrand'])->name('admin.care.edit');
//
Route::put('/updateCareBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateCareBrand'])->name('admin.care.update');
//
Route::delete('/destroyCareBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyCareBrand'])->name('admin.care.delete');

// Careproduct
//
Route::get('careProduct/caron_admin',[\App\Http\Controllers\BrandController::class,'indexCareProduct'])->name('admin.careproduct.index');
//
Route::post('createCareProduct/caron_admin',[\App\Http\Controllers\BrandController::class,'createCareProduct'])->name('admin.careProduct.create');
//
Route::get('/editCareProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editCareProduct'])->name('admin.careProduct.edit');
//
Route::put('/updateCareProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateCareProduct'])->name('admin.careproduct.update');
//
Route::delete('/destroyCareProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyCareProduct'])->name('admin.careProduct.delete');

// Snow
// Route::get('snow/caron_admin',[\App\Http\Controllers\BrandController::class,'indexSnow'])->name('admin.snow.index');
//
Route::post('createSnowBrand/caron_admin',[\App\Http\Controllers\BrandController::class,'createSnowBrand'])->name('admin.SnowBrands.create');
//
Route::get('/editSnow/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editSnowBrand'])->name('admin.snowBrand.edit');
//
Route::get('/editSnowProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editSnowProduct'])->name('admin.snowProduct.edit');
//
Route::put('/updateSnow/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateSnowBrand'])->name('admin.snow.update');
//
Route::delete('/destroySnowBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroySnowBrand'])->name('admin.snowBrand.delete');
//
Route::delete('/destroySnowProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroySnowProduct'])->name('admin.snowProduct.delete');

// Snow Product
//
Route::post('createSnowProduct/caron_admin',[\App\Http\Controllers\BrandController::class,'createSnowProduct'])->name('admin.snowProduct.create');
//
Route::get('/editSnowProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editSnowProduct'])->name('admin.snowProduct.edit');
//
Route::put('/updateSnowProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateSnowProduct'])->name('admin.snowProduct.update');

// Brushes
//
Route::get('brushes/caron_admin',[\App\Http\Controllers\BrandController::class,'indexBrushes'])->name('admin.brushes.index');
//
Route::post('createBrushesBrand/caron_admin',[\App\Http\Controllers\BrandController::class,'createBrushesBrand'])->name('admin.BrushesBrands.create');
//
Route::post('createBrushesType/caron_admin',[\App\Http\Controllers\BrandController::class,'createBrushesType'])->name('admin.BrushesType.create');
//
Route::post('createBrushesProduct/caron_admin',[\App\Http\Controllers\BrandController::class,'createBrushesProduct'])->name('admin.BrushesProduct.create');
//
Route::get('editbrushes/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editBrushes'])->name('admin.brushesEdit.index');
//
Route::get('editbrushesType/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editBrushesType'])->name('admin.brushesType.edit');
//
Route::put('/updateBrushesBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateGlassBrushesBrand'])->name('admin.BrushesBrand.update');
//
Route::put('/updateBrushesType/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateGlassBrushesType'])->name('admin.BrushesType.update');
//
Route::put('/updateBrushesProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateBrushesProduct'])->name('admin.BrushesProduct.update');
//
Route::delete('/destroyBrushProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyBrushesBrand'])->name('admin.BrushesBrand.delete');
//
Route::delete('/destroyBrushType/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyBrushesType'])->name('admin.BrushesType.delete');
//
Route::delete('/destroyBrushProducts/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyBrushesProduct'])->name('admin.BrushesProduct.delete');
//
Route::get('editBrushesProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editBrushesProduct'])->name('admin.brushesProduct.edit');
//
Route::get('fresh/caron_admin',[\App\Http\Controllers\BrandController::class,'indexFresh'])->name('admin.fresh.index');

//
Route::post('createFreshBrand/caron_admin',[\App\Http\Controllers\BrandController::class,'createFreshBrand'])->name('admin.FreshBrand.create');
//
Route::post('createFreshType/caron_admin',[\App\Http\Controllers\BrandController::class,'createFreshType'])->name('admin.FreshType.create');
//
Route::post('createFreshSmell/caron_admin',[\App\Http\Controllers\BrandController::class,'createFreshSmell'])->name('admin.FreshSmell.create');
//
Route::post('createFreshProduct/caron_admin',[\App\Http\Controllers\BrandController::class,'createFreshProduct'])->name('admin.FreshProduct.create');
//
Route::get('freshBrandEdit/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editFreshBrand'])->name('admin.FreshBrandEdit.edit');
//
Route::get('freshTypeEdit/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editFreshType'])->name('admin.FreshTypeEdit.edit');
//
Route::get('freshSmellEdit/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editFreshSmell'])->name('admin.FreshSmellEdit.edit');
//
Route::get('freshProductEdit/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editFreshProduct'])->name('admin.FreshProductEdit.edit');
//
Route::put('update/FreshBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateFreshBrand'])->name('admin.FreshBrand.update');
//
Route::put('update/FreshType/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateFreshType'])->name('admin.FreshType.update');
//
Route::put('update/FreshSmell/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateFreshSmell'])->name('admin.FreshSmell.update');
//
Route::put('update/FreshProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateFreshProduct'])->name('admin.FreshProduct.update');

//
Route::delete('/destroyFreshBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyFreshBrand'])->name('admin.FreshBrand.delete');
//
Route::delete('/destroyFreshType/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyFreshType'])->name('admin.FreshType.delete');
//
Route::delete('/destroyFreshSmell/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyFreshSmell'])->name('admin.FreshSmell.delete');
//
Route::delete('/destroyFreshProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyFreshProduct'])->name('admin.FreshProduct.delete');

// Route::get('lamp/caron_admin',[\App\Http\Controllers\BrandController::class,'indexLamp'])->name('admin.lamp.index');
//
Route::post('createLampBrand/caron_admin',[\App\Http\Controllers\BrandController::class,'createLampBrand'])->name('admin.LampBrand.create');
//
Route::post('createLampType/caron_admin',[\App\Http\Controllers\BrandController::class,'createLampType'])->name('admin.LampType.create');
//
Route::post('createLampSlot/caron_admin',[\App\Http\Controllers\BrandController::class,'createLampSlot'])->name('admin.LampSlot.create');
//
Route::post('createLampProduct/caron_admin',[\App\Http\Controllers\BrandController::class,'createLampProduct'])->name('admin.LampProduct.create');
//
Route::get('editLampBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editLampBrand'])->name('admin.brand.edit');
//
Route::get('editLampType/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editLampType'])->name('admin.type.edit');
//
Route::get('editLampSlot/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editLampSlot'])->name('admin.slot.edit');
//
Route::get('editLampProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editLampProduct'])->name('admin.product.edit');
//
Route::put('update/LampBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateLampBrand'])->name('admin.LampBrand.update');
//
Route::put('update/LampType/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateLampType'])->name('admin.LampType.update');
//
Route::put('update/LampSlot/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateLampSlot'])->name('admin.LampSlot.update');
//
Route::put('update/LampProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateLampProduct'])->name('admin.LampProduct.update');
//
Route::delete('/destroyLampBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyLampBrand'])->name('admin.LampBrand.delete');
//
Route::delete('/destroyLampType/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyLampType'])->name('admin.LampType.delete');
//
Route::delete('/destroyLampSlot/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyLampSlot'])->name('admin.LampSlot.delete');
//
Route::delete('/destroyLampProduct/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyLampProduct'])->name('admin.LampProduct.delete');

// Lamps





// Route::get('/PreNews',[\App\Http\Controllers\PreNewsController::class,'index'])->name('admin.PreNews.index');
//
Route::post('/PreNewsCreate',[\App\Http\Controllers\PreNewsController::class,'create'])->name('admin.PreNews.create');
// Route::get('/PreNewsEdit/{id}' ,
[\App\Http\Controllers\PreNewsController::class,'edit'])->name('admin.PreNews.edit');
// Route::put('/PreNewsUpdate/{id}' ,
[\App\Http\Controllers\PreNewsController::class,'update'])->name('admin.PreNews.update');
// Route::delete('PreNewsDelete/{id}' , [\App\Http\Controllers\PreNewsController::class ,
'destroy'])->name('admin.PreNews.delete');



// Product
//
Route::get('product/caron_admin',[\App\Http\Controllers\ProductController::class,'index'])->name('admin.product.index');
//
Route::post('productCreate/caron_admin',[\App\Http\Controllers\ProductController::class,'create'])->name('admin.product.create');
//
Route::get('/product/edit/caron_admin/{id}',[\App\Http\Controllers\ProductController::class,'edit'])->name('admin.product.edit');
//
Route::put('/updateProduct/caron_admin/{id}',[\App\Http\Controllers\ProductController::class,'update'])->name('admin.product.update');
//
Route::delete('/destroyProduct/caron_admin/{id}',[\App\Http\Controllers\ProductController::class,'destroy'])->name('admin.product.delete');

// Brand
// Route::get('brand/caron_admin',[\App\Http\Controllers\BrandController::class,'index'])->name('admin.brand.index');
//
Route::post('create/brand/caron_admin',[\App\Http\Controllers\BrandController::class,'create'])->name('admin.brand.create');
//
Route::get('edit/brand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'edit'])->name('admin.NewBrand.edit');
//
Route::put('update/brand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'update'])->name('admin.NewBrand.update');
//
Route::delete('delete/brand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroy'])->name('admin.NewBrand.delete');
//
Route::post('create/SingleBrand/caron_admin',[\App\Http\Controllers\BrandController::class,'createSingle'])->name('admin.SingleBrand.create');
//
Route::get('edit/SingleBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editSingle'])->name('admin.SingleBrand.edit');
//
Route::put('update/SingleBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateSingle'])->name('admin.SingleBrand.updateSingle');
//
Route::delete('destroy/SingleBrand/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroySingle'])->name('admin.SingleBrand.destroy');
//
Route::post('create/CategoryLists/caron_admin',[\App\Http\Controllers\BrandController::class,'createCategoryList'])->name('admin.CategoryLists.create');
//
Route::get('edit/CategoryLists/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'editCategory'])->name('admin.CategoryLists.edit');
//
Route::put('update/CategoryLists/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'updateCategory'])->name('admin.CategoryLists.update');
//
Route::delete('delete/CategoryLists/caron_admin/{id}',[\App\Http\Controllers\BrandController::class,'destroyCategory'])->name('admin.CategoryLists.destroy');




// Route::get('/', function () {
// return view('App.home');
// });