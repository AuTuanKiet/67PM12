<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckTimeAccess;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProductController extends Controller implements HasMiddleware
{
    //
    public static function middleware(): array {
        return [
            CheckTimeAccess::class,
        ];
    }

    public function index() {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function get(string $id) {
        $product = Product::findOrFail($id);
        return view('admin.product.detail', compact('product'));
    }

    public function create() {
        return view('admin.product.add');
    }

    public function store(Request $request) { 
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm mới thành công');
    }

    public function edit(string $id) {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, string $id) {
        $product = Product::findOrFail($id);
        
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
    ]);

        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy(string $id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công');
    }

    public function login() {
        return view('login');
    }

    public function checkLogin(Request $request) {
        $isValid = $request->input('username') === 'hieulx' && $request->input('password') === '123456';

        if ($isValid) {
            return back()->with('success', 'Đăng nhập thành công!');
        }

        return back()
            ->withInput()
            ->with('error', 'Tên tài khoản hoặc mật khẩu không đúng!');
    }
}
