<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckTimeAccess;
use App\Http\Middleware\CheckAge;

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

// Route đăng ký tài khoản
Route::get('/signin', [AuthController::class, 'signIn'])->name('auth.signin');
Route::post('/auth/checksignin', [AuthController::class, 'checkSignIn'])->name('auth.checksignin');

Route::post('/product/checklogin', [ProductController::class, 'checklogin'])->middleware([CheckAge::class]);

// Gom nhóm các route product
Route::prefix('product')->group(function() {
    Route::controller(ProductController::class)->group(function() {
        Route::get('/', 'index')->middleware([CheckTimeAccess::class]);
        Route::get('/add', 'create')->name('add');
        Route::get('/detail/{id?}', 'get')->name('product.detail');
        Route::post('/store', 'store');
    });
});

// Route thông tin sinh viên (mặc định name, mssv)
Route::get('/sinhvien/{name?}/{mssv?}', function($name = 'Lương Xuân Hiếu', $mssv = '123456') {
    return "Sinh viên: {$name} - MSSV: {$mssv}";
})->name('sinhvien.info');

// Route bàn cờ n*n, truy cập qua tên 'banco.show'
Route::get('/banco/{n}', function(int $n) {
    $size = max(1, $n);
    return view('banco', ['n' => $size]);
})->whereNumber('n')->name('banco.show');

Route::resource('test', TestController::class);

// Route fallback khi không tìm thấy
Route::fallback(function() {
    return view('error.404');
});