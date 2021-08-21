<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello-world', function () {
    return view('hello-world');
});
// Truyen tham so route voi rang buoc se co ??
Route::get('/hello-world/{year}/{yourname?}', function ($year, $yournmae = null) {
    $hello_string = '';
    if ($yournmae == null) {
        $hello_string = 'hello world, '.$year;
    } else {
        $hello_string = 'hello world, '.$year.' My name is '. $yournmae;
    }

    return view('hello-world')->with('hello_str', $hello_string);
});
Route::get('/dashboard', function()
{

})->middleware('checkage');
Route::get('/dashboard', function () {

})->middleware('auth', 'checkage');
// Gan router cho role middleware
Route::get('/role',[
    'middleware' => 'role:superadmin',
    'uses' => 'MainController@checkRole',
 ]);
 // Xu ly su kien trong controller
 Route::get('tin-tuc/{news_id_string}', 'MainController@showNews');
// xu ly gan middleware vao router
Route::get('profile', 'UserController@show')->middleware('auth');
Route::get('/controller-middleware', [
    'middleware'=>'First', // goi middleware sau khi dc khai bao trong kernel
    'uses'      => 'TestController@testControllerMiddleware'
]);
// dung controller --resource de tu dong su dung cac ham CRUD
Route::resource('/photos', 'PhotoController');
// Route::resource('photo', 'PhotoController', ['only'=> [
//     'index', 'show'
// ]]);
// Route::resource('photo', 'PhotoController', ['axcept'=>[
//     'create', 'store', 'update', 'destroy'
// ]]);
Route::get('user-info', 'MainController@getUserInfo');
Route::get('contact', 'ContactController@showContactForm');
Route::post('contact', 'ContactController@insertMessage');
Route::get('gamethu', 'GameController@handle');
// template Blade file extends
Route::get('first-blade-example', function () {
    return view('fontend.first-blade-example');
});
// template Blade Component
Route::get('components', function ($id) {
    return view('fontend.component-example');
});
