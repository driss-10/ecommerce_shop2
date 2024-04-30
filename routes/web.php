<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\EcommerceAuthController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;







Route::get('admin', function () {
    return view('admin.auth.login');
});

Route::get('admin', [AuthController::class, 'login_admin']);
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin']);


Route::group(['midlleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::POST('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edite/{id}', [AdminController::class, 'edite']);
    Route::post('admin/admin/edite/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);




    Route::get('admin/category/list', [CategoryController::class, 'list']);
    Route::get('admin/category/add', [CategoryController::class, 'add']);
    Route::POST('admin/category/add', [CategoryController::class, 'insert']);
    Route::get('admin/category/edite/{id}', [CategoryController::class, 'edite']);
    Route::post('admin/category/edite/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);



    Route::get('admin/sub_category/list', [SubCategoryController::class, 'list']);
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'add']);
    Route::POST('admin/sub_category/add', [SubCategoryController::class, 'insert']);
    Route::get('admin/sub_category/edite/{id}', [SubCategoryController::class, 'edite']);
    Route::post('admin/sub_category/edite/{id}', [SubCategoryController::class, 'update']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete']);
    Route::post('admin/get_sub_category', [SubCategoryController::class, 'get_sub_category']);





    Route::get('admin/product/list', [ProductController::class, 'list']);
    Route::get('admin/product/add', [ProductController::class, 'add']);
    Route::POST('admin/product/add', [ProductController::class, 'insert']);
    Route::get('admin/product/edite/{id}', [ProductController::class, 'edite']);
    Route::post('admin/product/edite/{id}', [ProductController::class, 'update']);
    Route::get('admin/product/image_delete/{id}', [ProductController::class, 'image_delete']);
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);



    Route::get('admin/brand/list', [BrandController::class, 'list']);
    Route::get('admin/brand/add', [BrandController::class, 'add']);
    Route::POST('admin/brand/add', [BrandController::class, 'insert']);
    Route::get('admin/brand/edite/{id}', [BrandController::class, 'edite']);
    Route::post('admin/brand/edite/{id}', [BrandController::class, 'update']);
    Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);



    Route::get('admin/color/list', [ColorController::class, 'list']);
    Route::get('admin/color/add', [ColorController::class, 'add']);
    Route::POST('admin/color/add', [ColorController::class, 'insert']);
    Route::get('admin/color/edite/{id}', [ColorController::class, 'edite']);
    Route::post('admin/color/edite/{id}', [ColorController::class, 'update']);
    Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);
});



Route::get('/', [EcommerceController::class, 'Home'])->name('Home');
/* Route::get('/Shop/{slug?}', [EcommerceController::class, 'Shop'])->name('Shop'); */
Route::get('/Shop', [EcommerceController::class, 'Shop'])->name('Shop');
Route::get('/List/{slug?}/{subslug?}', [EcommerceController::class, 'List'])->name('List');
Route::get('/Contact', [ContactController::class, 'Contact'])->name('Contact.show');
Route::get('/ShoppingCart', [EcommerceController::class, 'ShoppingCart'])->name('ShoppingCart');
Route::get('/About', [EcommerceController::class, 'About'])->name('About');
Route::get('/CheckOut', [EcommerceController::class, 'CheckOut'])->name('CheckOut');

Route::get('/ShopDetails', [EcommerceController::class, 'ShopDetails'])->name('ShopDetails');
Route::get('/Login', [EcommerceAuthController::class, 'Login'])->name('Login');
Route::post('/Login', [EcommerceAuthController::class, 'handllogin'])->name('auth.login');
Route::post('/logout', [EcommerceAuthController::class, 'logout'])->name('logout');
// Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/Register', [EcommerceAuthController::class, 'Register'])->name('add');
Route::post('/Register', [EcommerceAuthController::class, 'store'])->name('auth.store');

Route::get('/forgot', [EcommerceAuthController::class, 'forgot']);
Route::post('/forgot', [EcommerceAuthController::class, 'forgot_password'])->name('auth.password');

Route::post('/Contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('admin/message/list', [MessageController::class, 'ShowMessage']);
