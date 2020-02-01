<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
   function login(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');

    $user = DB::table('users')->where('name', $username )->where('password', $password )->first();

    if ( $user ) {
        $request->session()->put('login', true);
        $request->session()->put('name', $user->name);
        return view('fontend.login')->with('success', 'Đăng nhập thành công.');
    } else {
        return view('fontend.login')->with('fail', 'Đăng nhập không thành công, sai username hoặc password.');
    }
}
}
