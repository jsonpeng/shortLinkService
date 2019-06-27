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


Auth::routes();

//前端路由
Route::get('/','FrontController@dealLongUrl');

//防止污染后台
if(!empty($_SERVER['REQUEST_URI']) && substr($_SERVER['REQUEST_URI'], 0, 5) != '/zcjy' && substr($_SERVER['REQUEST_URI'], 0, 8) != '/erweima'){
	Route::get('/{short_url}', 'FrontController@dealShortUrl');
}
//刷新缓存
Route::post('/clearCache','CommonApiController@clearCache');

Route::get('/erweima','FrontController@erweima');

//后台管理系统
Route::group(['middleware' => ['auth'], 'prefix' => 'zcjy'], function () {
	//后台首页
	Route::get('/', 'SettingController@setting');

    //系统设置
    Route::get('settings/setting', 'SettingController@setting')->name('settings.setting');
    Route::post('settings/setting', 'SettingController@update')->name('settings.setting.update');
   
    //修改密码
	Route::get('setting/edit_pwd','SettingController@edit_pwd')->name('settings.edit_pwd');
    Route::post('setting/edit_pwd/{id}','SettingController@edit_pwd_api')->name('settings.pwd_update');
 	//短链接地址
	Route::resource('linkLists', 'LinkListController');
});




