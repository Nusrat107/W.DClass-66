<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\FrontedController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontedController::class, 'index']);
Route::get('/shop', [FrontedController::class, 'ShopProduct']);
Route::get('/return', [FrontedController::class, 'ReturnProduct']);
Route::get('/catagory', [FrontedController::class, 'CatagoryProduct']);
Route::get('/type/{type}', [FrontedController::class, 'TypeProduct']);
Route::get('/view', [FrontedController::class, 'ViewProduct']);
Route::get('/cheackout', [FrontedController::class, 'cheackOutProduct']);
Route::get('/details', [FrontedController::class, 'ditailsProduct']);
Route::get('/sub-catagory', [FrontedController::class, 'subcatagoryProduct']);
Route::get('/thank-you', [FrontedController::class, 'thankyou']);

///policy///

Route::get('/privacy-policy', [FrontedController::class, 'privacypolicy']);
Route::get('/tearms-conditions', [FrontedController::class, 'tearmscondition']);
Route::get('/refund-policy', [FrontedController::class, 'refundpolicy']);
Route::get('/payment-policy', [FrontedController::class, 'paymentpolicy']);
Route::get('/about-us', [FrontedController::class, 'aboutUs']);
Route::get('/contact-us', [FrontedController::class, 'contactUs']);

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

