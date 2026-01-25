<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

// Route trang chủ
Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/product/checklogin', [ProductController::class, 'checkLogin']);

// Gom nhóm các route product
Route::prefix('product')->group(function() {
    Route::controller(ProductController::class)->group(function() {
        Route::get('/', 'index');
        Route::get('/add', 'create')->name('add');
        Route::get('/detail/{id?}', 'get');
        Route::post('/store', 'store');
    });
    /* // Route danh sách sản phẩm
    Route::get('/', [ProductController::class, 'index']);

    // Route thêm mới sản phẩm
    Route::get('/add', [ProductController::class, 'create'])->name('add');

    // Route chi tiết sản phẩm với id kiểu chuỗi, mặc định 123
    Route::get('/detail/{id?}', [ProductController::class, 'get']); */
});

// Route thông tin sinh viên (mặc định name, mssv)
Route::get('/sinhvien/{name?}/{mssv?}', function($name = 'Luong Xuan Hieu', $mssv = '123456') {
    return "Sinh viên: {$name} - MSSV: {$mssv}";
})->name('sinhvien.info');

// Route bàn cờ n*n, truy cập qua tên 'banco.show'
Route::get('/banco/{n}', function(int $n) {
    $size = max(1, $n);
    return view('banco', ['n' => $size]);
})->whereNumber('n')->name('banco.show');

// Route fallback khi không tìm thấy
Route::fallback(function() {
    return view('error.404');
});