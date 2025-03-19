<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class LoginController extends Controller {
    public function loginApi(Request $request) {
        // Validate dữ liệu đầu vào
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Kiểm tra user có tồn tại không trước khi đăng nhập
        if (!User::where('email', $request->email)->exists()) {
            return response()->json(['success' => false, 'message' => 'Email không tồn tại.'], 401);
        }

        // Thử đăng nhập
        if (Auth::attempt($credentials)) {
            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công!',
                'redirect' => route('index')
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Email hoặc mật khẩu không đúng.'], 401);
    }

    public function sigUpApi(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|digits_between:6,12',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return response()->json([
            'success' => true,
            'message' => 'Đăng ký thành công!',
            'user' => $user,
        ], 201);
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
