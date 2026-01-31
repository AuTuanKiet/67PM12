<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Hiển thị form đăng ký
    public function signIn()
    {
        return view('signin');
    }

    // Kiểm tra dữ liệu từ form đăng ký
    public function checkSignIn(Request $request)
    {
        // Lấy dữ liệu từ form
        $username = $request->input('username');
        $password = $request->input('password');
        $repass = $request->input('repass');
        $mssv = $request->input('mssv');
        $lopquanly = $request->input('lopquanly');
        $lopmonhoc = $request->input('lopmonhoc');
        $gioitinh = $request->input('gioitinh');

        // Thông tin sinh viên làm bài (dữ liệu mẫu)
        // Bạn có thể thay đổi thông tin này hoặc lấy từ database
        $studentInfo = [
            'username' => 'kietat',
            'password' => '12022004',
            'mssv' => '3000467',
            'lopquanly' => '67PM2',
            'lopmonhoc' => '67PM2',
            'gioitinh' => 'nam'
        ];

        // Kiểm tra password và repass có giống nhau hay không
        if ($password !== $repass) {
            return redirect()->back()
                ->with('message', 'Đăng ký thất bại! Mật khẩu xác nhận không khớp.')
                ->with('type', 'error');
        }

        // Kiểm tra thông tin có trùng với sinh viên không
        if ($username === $studentInfo['username'] && 
            $password === $studentInfo['password'] && 
            $mssv === $studentInfo['mssv'] && 
            $lopquanly === $studentInfo['lopquanly'] &&
            $lopmonhoc === $studentInfo['lopmonhoc'] && 
            $gioitinh === $studentInfo['gioitinh']) {
            return redirect()->back()
                ->with('message', 'Đăng ký thành công!')
                ->with('type', 'success');
        } else {
            return redirect()->back()
                ->with('message', 'Đăng ký thất bại! Thông tin sinh viên không chính xác.')
                ->with('type', 'error');
        }
    }

    // Hiển thị form nhập tuổi
    public function showAgeForm()
    {
        return view('age');
    }

    // Xử lý lưu tuổi vào session
    public function verifyAge(Request $request)
    {
        $age = $request->input('age', 0);

        // Kiểm tra dữ liệu có phải là số hay không
        if (!is_numeric($age)) {
            return redirect()->back()
                ->with('message', 'Tuổi phải là một con số!')
                ->with('type', 'error');
        }

        // Chuyển đổi thành số nguyên
        $age = (int)$age;

        // Kiểm tra tuổi >= 18
        if ($age < 18) {
            return redirect()->back()
                ->with('message', 'Bạn phải từ 18 tuổi trở lên để tiếp tục.')
                ->with('type', 'error');
        }

        // Lưu tuổi vào session
        session(['age' => $age]);

        return redirect()->back()
            ->with('message', 'Xác nhận tuổi thành công! Tuổi của bạn là: ' . $age)
            ->with('type', 'success');  
    }
}
