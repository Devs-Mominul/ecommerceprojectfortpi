<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin-panel', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload/image',[ProfileController::class,'Upload_image'])->name('profile.image');
});
Route::get('/user/table',[HomeController::class,'User_Table'])->name('user.table');
Route::get('/user/table/remove/{id}',[HomeController::class,'User_remove'])->name('user.remove');


Route::get('/category',[CategoryController::class,'Category'])->name('category');
Route::post('/category',[CategoryController::class,'Category_store'])->name('category.story');
Route::get('/category/edid/{id}',[CategoryController::class,'Category_Controller'])->name('category.edit');
Route::post('/category/edid/post',[CategoryController::class,'Category_Update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'Category_Delete'])->name('category.delete');
Route::get('/subcategory/gets',[CategoryController::class,'subcategory'])->name('subcategory');
Route::post('/subcategory/post',[CategoryController::class,'Substore'])->name('subcategory.store');
Route::get('/subcategory/edit/{id}',[CategoryController::class,'Subcategory_Edit'])->name('subcategory.edit');
Route::get('/subcategory/delete/{id}',[CategoryController::class,'Subcategory_Delete'])->name('subcategory.delete');
Route::post('/subcategory/post/{id}',[CategoryController::class,'subcategory_update'])->name('subcategory.update');
Route::get('/brand',[BrandController::class,'brand'])->name('brand');
Route::post('/brand/store',[BrandController::class,'brand_store'])->name('brand.store');
Route::get('/brand/edit/{id}',[BrandController::class,'brand_edit'])->name('brand.edit');
Route::post('/brand/update/{id}',[BrandController::class,'brand_update'])->name('brand.update');
Route::get('/brand/delete/{id}',[BrandController::class,'brand_delete'])->name('brand.delete');
Route::get('/product',[ProductController::class,'product'])->name('product');
Route::post('/getsubcategory',[ProductController::class,'getsubcategory']);
Route::post('/product/store',[ProductController::class,'product_store'])->name('product.store');
Route::get('/product/list/products',[ProductController::class,'product_list'])->name('product.list');
Route::get('/product/delete/{id}',[ProductController::class,'product_delete'])->name('product.delete');
Route::get('/product/show/{id}',[ProductController::class,'product_show'])->name('product.show');
Route::get('/varition',[InventoryController::class,'varition'])->name('varition');
Route::post('/varition/posts',[InventoryController::class,'varition_post'])->name('varition.post');
Route::get('/size',[InventoryController::class,'varition_size'])->name('size');
Route::post('/size/posts',[InventoryController::class,'post_size'])->name('size.post');
Route::get('/',[FrontEndController::class,'index'])->name('index');
Route::get('/about',[FrontEndController::class,'about'])->name('about');
Route::get('/shop',[FrontEndController::class,'shop'])->name('shop');
Route::get('/contact',[FrontEndController::class,'contact'])->name('contact');
Route::get('/flogin',[FrontEndController::class,'logins'])->name('frontends.login');
Route::get('/fregister',[FrontEndController::class,'registers'])->name('frontends.register');



require __DIR__.'/auth.php';
