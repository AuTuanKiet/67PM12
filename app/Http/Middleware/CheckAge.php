<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge {
    public function handle(Request $request, Closure $next): Response {
        // Kiểm tra tuổi trong session
        $age = session('age');
        
        if ($age === null) {
            // Nếu chưa xác nhận tuổi, chuyển hướng đến form nhập tuổi
            return redirect()->route('age.form')
                ->with('message', 'Vui lòng xác nhận tuổi trước khi tiếp tục.')
                ->with('type', 'error');
        }

        // Kiểm tra tuổi >= 18
        if (!is_numeric($age) || (int)$age < 18) {
            return response('Không được phép truy cập', 403);
        }

        return $next($request);
    }
}