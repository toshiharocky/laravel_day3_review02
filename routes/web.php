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

Route::get('/', function () {
    return view('welcome');
});

//メール送信フォームを表示
Route::get('/mail', 'MailController@index');

//メール送信処理
Route::post('/mail/send', 'MailController@send');


Route::group(['middleware' => ['auth','can:premier-only']],
function(){
    // 画像アップロード画面表示
    Route::get('/img', 'ImgController@index');
    
    // 画像アップロード処理
    Route::post('/img/upload', 'ImgController@upload');
}
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
