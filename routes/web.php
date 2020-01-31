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

Route::get('/hello-word/{year}/{name?}', function ($year, $name = null) {
    $hello_string = " ";

    if ($name == null) {
        $hello_string = "Hello " . $year;
    } else {
        $hello_string = 'My name:  ' . $name . ' date of birth: ' . $year;
    }
    return view('hello-word')->with('hello_str', $hello_string);
});


// Middlewware
/*
Route::get('/dashboard', function () {
    echo "Trang DashBoard!!!";
    // Mã xử lý khác viết ở đây
})->middleware('checkAge');
*/
Route::get('/role', [
    'middleware' => 'role:supperman',
    'uses' => 'MainController@checkRole'
]);

// hoc ve CONTROLLER
Route::get('/tin-tuc/{new_id_string}', 'MainController@showNews');

// route gán middleware
// Route::get ('/profile','UserController@show')->middleware('auth');
Route::get('/controller-middleware', [
    'middleware' => 'First',
    'uses' => 'TestController@testControllerMiddleware'
]);

//HTTP Request
Route::get('category/laravel-nang-cao', 'MainController@uriTest');
// Request lirieen quan người dùng
Route::get('user-info', 'MainController@getUserInfo');

// REquest lấy thông tin từ Form
Route::get('contact', 'ContactController@showContactForm');
Route::post('contact', 'ContactController@insertMessage');

// VIEW in Laravel

Route::get('test-view', function () {
    return view('fontend.test-view');
});


Route::get('contact', function () {
    if (View::exists('fontend.contact')) {
        return view('fontend.contact');
    } else {
        return 'Trang liên hệ đang bị lỗi, bạn vui lòng quay lại sau';
    }
});

// Study View
Route::get('first-blade-example', function () {
    return view('fontend.first-blade-example');
});

//COmponents và slot
Route::get('components', function () {
    return view('fontend.component-example');
});


// blade template
Route::get('second-blade-example', function () {
    $comment = 'Tôi là <span class="label label-success">All Laravel</span>';
    return view('fontend.second-blade-example')->with('comment', $comment);
});


/// Thuc hanh tao trang blog
Route::get('news', function () {
    $news_list = array(
        ['title' => 'Bài viết số 1', 'content' => 'Nội dung bài viết 1', 'post_date' => '2017-01-03'],
        ['title' => 'Bài viết số 2', 'content' => 'Nội dung bài viết 2', 'post_date' => '2017-01-03'],
        ['title' => 'Bài viết số 3', 'content' => 'Nội dung bài viết 3', 'post_date' => '2017-01-03'],
        ['title' => 'Bài viết số 4', 'content' => 'Nội dung bài viết 4', 'post_date' => '2017-01-03']
    );
    return view('fontend.news-list')->with(compact('news_list'));
});

// Laravel sessiion

/*
Route::post('login', function(){
    $username = Request::input('username');
    $password = Request::input('password');
    if($username == 'admin' && $password == '123456'){
        Request::session()->put('login', true);
        Request::session()->put('name', 'Nguyễn Văn A');
        return view('fontend.login')->with('success', 'Đăng nhập thành công.');
    } else {
        return view('fontend.login')->with('fail', 'Đăng nhập không thành công, sai username hoặc password.');
    }

});
*/

Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);

Route::get('login', function(){
    return view('fontend.login');
});


Route::get('logout', function(){
    Request::session()->flush();
    return view('fontend.login');
});
//Form Validate
Route::get('register', 'UserController@showRegisterForm');
Route::post('register', 'UserController@storeUser');
Route::resource('product', 'ProductController');

Route::get('product',[
    'as'=>'product.list',
    'uses'=>'ProductController@index'
]);
Route::delete('product/{id}',[
    'as'=>'product.destroy',
    'uses'=>'ProductController@destroy'
]);
