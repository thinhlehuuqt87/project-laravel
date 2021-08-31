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

// Route::get('/', function () {
//     return view('welcome');
// });

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
// Route::get('product', 'ProductController@index');
Route::resource('product', 'ProductController', ['only'=> ['index', 'show', 'create', 'edit', 'store', 'update']]);
// use verify Authenticate
Route::resource('admin/product', 'ProductController', ['only'=> ['index', 'show', 'create', 'edit', 'store', 'update'],
'middleware'=>'auth']);
// Route::resource('product', 'ProductController', ['axcept'=> ['create', 'store', 'edit']]);

// Validate on Controller
Route::get('post/create', 'PostController@create');
Route::post('post', 'PostController@store');
// Validate ajax request $ validate
Route::get('post_ajax/create', 'PostController@create_ajax');
// Route::get('post_ajax', 'PostController@store_ajax');

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
// Laravel blade 2
Route::get('news', function(){
    $news_list = array(
      ['title' => 'Bài viết số 1', 'content' => 'Nội dung bài viết 1', 'post_date' => '2017-01-03'],
      ['title' => 'Bài viết số 2', 'content' => 'Nội dung bài viết 2', 'post_date' => '2017-01-03'],
      ['title' => 'Bài viết số 3', 'content' => 'Nội dung bài viết 3', 'post_date' => '2017-01-03'],
      ['title' => 'Bài viết số 4', 'content' => 'Nội dung bài viết 4', 'post_date' => '2017-01-03']
      );
    return view('fontend.news-list')->with(compact('news_list'));
  });
// Ket noi DB and validate Controller
Route::get('register', 'UserController@showRegisterForm');
Route::post('register', 'UserController@storeUser');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/**
 * Phan quyen cho phong vien, bien tap
 */
Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@index')->name('list_post');
Route::prefix('posts')->group(function () {
    Route::get('/drafts', 'postController@drafts')
        ->name('list_drafts')
        ->middleware('auth');
    Route::get('/show/{id}', 'PostController@show')
        ->name('show_post');
    Route::get('/create', 'PostController@create')
        ->name('create_post')
        ->middleware('can:post.create');
    Route::post('/create', 'PostController@store')
        ->name('store_post')
        ->middleware('can:post.create');
    Route::get('/edit/{post}', 'PostController@edit')
        ->name('edit_post')
        ->middleware('can:post.update,post');
    Route::post('/edit/{post}', 'PostController@update')
        ->name('update_post')
        ->middleware('can:post.update,post');
    Route::get('/publish/{post}', 'PostController@publish')
        ->name('publish_post')
        ->middleware('can:post.publish');
});
