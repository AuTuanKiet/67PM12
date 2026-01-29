<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Hiển thị form đăng ký
    public function signIn()
    {
        return view('SignIn');
    }

    // Kiểm tra dữ liệu từ form đăng ký
    public function checkSignIn(Request $request)
    {
        // Lấy dữ liệu từ form
        $username = $request->input('username');
        $password = $request->input('password');
        $repass = $request->input('repass');
        $mssv = $request->input('mssv');
        $lopmonhoc = $request->input('lopmonhoc');
        $gioitinh = $request->input('gioitinh');

        // Thông tin sinh viên làm bài (dữ liệu mẫu)
        // Bạn có thể thay đổi thông tin này hoặc lấy từ database
        $studentInfo = [
            'username' => 'kietat',
            'password' => '12022004',
            'mssv' => '3000467',
            'lopmonhoc' => '67PM2',
            'gioitinh' => 'nam'
        ];

        // Kiểm tra password và repass có giống nhau không
        if ($password !== $repass) {
            return redirect()->back()
                ->with('message', 'Đăng ký thất bại! Mật khẩu xác nhận không khớp.')
                ->with('type', 'error');
        }

        // Kiểm tra thông tin có trùng với sinh viên không
        if ($username === $studentInfo['username'] &&
            $password === $studentInfo['password'] &&
            $mssv === $studentInfo['mssv'] &&
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
}
