<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
   function login(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');
    if ($username == 'admin' && $password == '123456') {
        $request->session()->put('login', true);
        $request->session()->put('name', 'Nguyễn Văn A');
        return view('fontend.login')->with('success', 'Đăng nhập thành công.');
    } else {
        return view('fontend.login')->with('fail', 'Đăng nhập không thành công, sai username hoặc password.');
    }
}
}
