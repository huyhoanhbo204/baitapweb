<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BandProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Đây là nơi bạn có thể đăng ký các route cho ứng dụng của mình.
| Các route này sẽ được tải qua RouteServiceProvider và gán cho nhóm middleware "web".
*/

Route::get("/", [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get("/", [AdminController::class, 'index'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.action');
    Route::get("/logout", [AdminController::class, 'logout'])->name('logout');


    Route::get("/dashboard", [AdminController::class, 'dashboard'])->name('dashboard');
});


Route::prefix('admin/category-product')->name('category.product.')->group(function () {
    // Danh sách và thêm mới danh mục
    Route::get('/add', [CategoryController::class, 'add_category_product'])->name('add');
    Route::get('/all', [CategoryController::class, 'all_category_product'])->name('all');
    Route::post('/save', [CategoryController::class, 'save_category_product'])->name('save');

    // Kích hoạt và không kích hoạt danh mục
    Route::get('/admin/active-category-product/{category_product_id}', [CategoryController::class, 'active_category_product'])->name('active');
    Route::get('/admin/unactive-category-product/{category_product_id}', [CategoryController::class, 'unactive_category_product'])->name('unactive');

});
// brand.product.save
// Brand Product Routes
Route::prefix('admin/brand-product')->name('brand.product.')->group(function () {
    // Danh sách và thêm mới thương hiệu
    Route::get('/all', [BandProductController::class, 'all_brand_product'])->name('all');
    Route::get('/add', [BandProductController::class, 'add_brand_product'])->name('add');
    Route::post('/save', [BandProductController::class, 'save_brand_product'])->name('save');

    // Kích hoạt và không kích hoạt thương hiệu
    Route::get('/active/{brand_product_id}', [BandProductController::class, 'active_brand_product'])->name('active');
    Route::get('/unactive/{brand_product_id}', [BandProductController::class, 'unactive_brand_product'])->name('unactive');

    // Sửa, cập nhật và xóa thương hiệu
    Route::get('/edit/{brand_id}', [BandProductController::class, 'edit_brand_product'])->name('edit');
    Route::post('/update/{brand_id}', [BandProductController::class, 'update_brand_product'])->name('update');
    Route::get('/delete/{brand_product_id}', [BandProductController::class, 'delete_brand_product'])->name('delete');
});

// Product Routes
Route::prefix('admin/product')->name('product.')->group(function () {
    // Danh sách và thêm mới sản phẩm
    Route::get('/add', [ProductController::class, 'add_product'])->name('add');
    Route::get('/all', [ProductController::class, 'all_product'])->name('all');
    Route::post('/save', [ProductController::class, 'save_product'])->name('save');

    // Kích hoạt và không kích hoạt sản phẩm
    Route::get('/active/{product_id}', [ProductController::class, 'activeProduct'])->name('active');
    Route::get('/unactive/{product_id}', [ProductController::class, 'unactiveProduct'])->name('unactive');

    // Sửa, cập nhật và xóa sản phẩm
    Route::get('/edit/{product_id}', [ProductController::class, 'edit_product'])->name('edit');
    Route::post('/update/{product_id}', [ProductController::class, 'update_product'])->name('update');
    Route::get('/delete/{product_id}', [ProductController::class, 'delete_product'])->name('delete');
});