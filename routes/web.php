<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wellcome', function () {
    return view('dat24');
});
/*
Route::get('/hello-word',function(){
    return view ('hello-word');
});


Route::get('/hello-world/{year}', function($year){
    echo ('Hello world, ' . $year);
    // return view('hello-world');
});
*/

/*
Route::get('/hello-word/{name}/{year?}',function($name,$year = null){
    if($year == null )
    {
        echo ('Hello world, ' . $name);
    }
    else
    {
        echo ('My name:  ' . $name. ' date of birth: '.$year);
    }

});
*/

Route::get('/hello-word/{year}/{name?}',function($year,$name = null){
    $hello_string = " ";

    if($name == null )
    {
        $hello_string = "Hello ". $year;
    }
    else
    {
        $hello_string = 'My name:  ' . $name. ' date of birth: '.$year;
    }
    return view('hello-word')->with('hello_str',$hello_string);
});


// Middlewware
/*
Route::get('/dashboard', function () {
    echo "Trang DashBoard!!!";
    // Mã xử lý khác viết ở đây
})->middleware('checkAge');
*/
Route::get('/role',[
    'middleware'=>'role:supperman',
    'uses'=>'MainController@checkRole'
]);

// hoc ve CONTROLLER
Route::get('/tin-tuc/{new_id_string}','MainController@showNews');

// route gán middleware
// Route::get ('/profile','UserController@show')->middleware('auth');
Route::get('/controller-middleware', [
    'middleware' => 'First',
    'uses'       => 'TestController@testControllerMiddleware'
]);

//HTTP Request
Route::get('category/laravel-nang-cao', 'MainController@uriTest');
// Request lirieen quan người dùng
Route::get('user-info', 'MainController@getUserInfo');

// REquest lấy thông tin từ Form
Route::get('contact', 'ContactController@showContactForm');
Route::post('contact', 'ContactController@insertMessage');

// VIEW in Laravel

Route::get('test-view', function(){
    return view('fontend.test-view');
});


Route::get('contact', function(){
    if (View::exists('fontend.contact')) {
        return view('fontend.contact');
    } else {
        return 'Trang liên hệ đang bị lỗi, bạn vui lòng quay lại sau';
    }
});
