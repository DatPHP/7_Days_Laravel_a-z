<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class UserController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('log')->only('index');

        $this->middleware('subscribed')->except('store');
    }
    */


    //
    public function showRegisterForm(){
        return view('fontend.register');
    }

    public function storeUser(Request $request){
        //dd($request->all());

        $messages = [
            'required' => 'Trường :attribute bắt buộc nhập.',
            'email'    => 'Trường :attribute phải có định dạng email'
        ];
        $validator = Validator::make($request->all(), [
            'name'     => 'required|max:255',
            'email'    => 'required|email',
            'password' => 'required|between:6,255|confirmed',
            'password_confirmation' => 'required',
            'website'  => 'sometimes|required|url'

        ], $messages);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Lưu thông tin vào database, phần này sẽ giới thiệu ở bài về database
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $website = $request->input('website');

            DB::insert('insert into users (name, email, password, website) values (?, ?, ?, ?)', [$name, $email, $password, $website]);
            return redirect('register')
                ->with('message', 'Đăng ký thành công.');
        }
    }

}
