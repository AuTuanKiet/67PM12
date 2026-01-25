<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index() {
        $title = "Danh sách sản phẩm";
        return view('product.index', ['title' => $title,
            'products' => [
                ['id'=>'SP001', 'name'=>'Laptop Dell XPS 13', 'price'=>'25.000.000 VNĐ', 'description'=>'Laptop cao cấp, hiệu năng mạnh mẽ'],
                ['id'=>'SP002', 'name'=>'iPhone 15 Pro Max', 'price'=>'35.000.000 VNĐ', 'description'=>'Điện thoại flagship của Apple'],
                ['id'=>'SP003', 'name'=>'Samsung Galaxy S24 Ultra', 'price'=>'30.000.000 VNĐ', 'description'=>'Smartphone cao cấp của Samsung'],
                ['id'=>'SP004', 'name'=>'MacBook Pro M3', 'price'=>'45.000.000 VNĐ', 'description'=>'Laptop chuyên nghiệp cho designer'],
                ['id'=>'SP005', 'name'=>'AirPods Pro 2', 'price'=>'6.000.000 VNĐ', 'description'=>'Tai nghe không dây chống ồn'],
            ]
        ]);
    }

    public function get(string $id='123') {
        return view('product.detail', ['id' => $id]);
    }

    public function create() {
        return view('product.add');
    }

    public function store(Request $request) {
        return $request->all();
    }

    public function checkLogin(Request $request) {
        if($request->input('username') === 'hieulx' && $request->input('password') === '123456') {
            return "Đăng nhập thành công!";
        } else {
            return "Đăng nhập thất bại!";
        }
    }
}
