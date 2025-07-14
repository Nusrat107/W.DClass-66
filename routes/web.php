<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\FrontendController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontendController::class, 'index']);
Route::get('/shop', [FrontendController::class, 'ShopProduct']);
Route::get('/return', [FrontendController::class, 'ReturnProduct']);
Route::get('/catagory', [FrontendController::class, 'CatagoryProduct']);
Route::get('/type/{type}', [FrontendController::class, 'TypeProduct']);
Route::get('/view', [FrontendController::class, 'ViewProduct']);
Route::get('/cheackout', [FrontendController::class, 'cheackoutProduct']);
Route::get('/details/{slug}', [FrontendController::class, 'detailsProduct']);
Route::get('/sub-catagory', [FrontendController::class, 'subcatagoryProduct']);
Route::get('/thank-you', [FrontendController::class, 'thankyou']);

///policy///

Route::get('/privacy-policy', [FrontendController::class, 'privacypolicy']);
Route::get('/tearms-conditions', [FrontendController::class, 'tearmscondition']);
Route::get('/refund-policy', [FrontendController::class, 'refundpolicy']);
Route::get('/payment-policy', [FrontendController::class, 'paymentpolicy']);
Route::get('/about-us', [FrontendController::class, 'aboutUs']);
Route::get('/contact-us', [FrontendController::class, 'contactUs']);

///AdminAuthRoutes//////
Route::get('/admin/login', [AdminController::class, 'loginForm']);
Route::get('/admin/logout', [AdminController::class, 'logOut']);

Auth::routes();
Route::get('/admin/dashboard', [AdminDashboardController::class, 'adminDashboard']);


///category routes/////
Route::get('/admin/category/create', [CategoryController::class, 'categoryCreate']);
Route::post('/admin/category/store', [CategoryController::class, 'createStore']);
Route::get('/admin/category/list', [CategoryController::class, 'categoryList']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'categoryDelete']);
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'categoryEdit']);
Route::post('/admin/category/update/{id}', [CategoryController::class, 'categoryUpdate']);

// SubCategory routes//

Route::get('/admin/sub-category/create',[SubCategoryController::class,'subCategoryCreate']);
Route::post('/admin/sub-category/store', [SubCategoryController::class, 'subCategoryStore']);
Route::get('/admin/sub-category/list', [SubCategoryController::class, 'subCategorylist']);
Route::get('/admin/sub-category/delete/{id}', [SubCategoryController::class, 'subCategoryDelete']);
Route::get('/admin/sub-category/edit/{id}', [SubCategoryController::class, 'subCategoryEdit']);
Route::post('/admin/sub-category/update/{id}', [SubCategoryController::class, 'subCategoryUpdate']);

// Product routes///

Route::get('/admin/product/create',[ProductController::class,'productCreate']);
Route::post('/admin/product/store', [ProductController::class, 'productStore']);
Route::get('/admin/product/list', [ProductController::class, 'productlist']);
Route::get('/admin/product/delete/{id}', [ProductController::class, 'productDelete']);
Route::get('/admin/product/edit/{id}', [ProductController::class, 'productEdit']);
Route::post('/admin/product/update/{id}', [ProductController::class, 'productUpdate']);

Route::get('/admin/product/color/delete/{id}', [ProductController::class, 'colorDelete']);
Route::get('/admin/product/size/delete/{id}', [ProductController::class, 'sizeDelete']);
Route::get('/admin/product/gallery-image/delete/{id}', [ProductController::class, 'galleryImageDelete']);
Route::get('/admin/product/gallery-image/edit/{id}', [ProductController::class, 'galleryImageEdit']);
Route::post('/admin/product/gallery-image/update/{id}', [ProductController::class, 'galleryImageUpdate']);


