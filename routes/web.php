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

//Route::get('/', function () {
//    return view('index');
//});


Route::get('/','IndexController@index');

Route::get('home','IndexController@index')->name('home');


Route::namespace('Auth')->group(function (){
    //注册 路由
    Route::get('register','RegisterController@showRegistrationForm');
    Route::post('register','RegisterController@register')->middleware('mailer'); //注册中间件，实现邮件发送
    //登录
    Route::get('login','LoginController@showLoginForm')->name('login');
    Route::post('login','LoginController@login');
    //退出
    Route::get('logout','LoginController@logout');
});


//检测用户是否登录，使用系统封装好的中间件auth
Route::middleware('auth')->group(function (){
    //申请 路由
    Route::get('jie','ProController@jie');
    Route::post('jie','ProController@jiePost');

    //审核列表 路由
    Route::get('prolist','CheckController@prolist');
    //审核路由
    Route::get('check/{pid}','CheckController@check');
    Route::post('check/{pid}','CheckController@checkPost');

    //投资 路由
    Route::get('touzi/{pid}','ProController@touzi');
    Route::post('touzi/{pid}','ProController@touziPost');

    //打款
    Route::get('grow','GrowController@grow');
    Route::get('myzd','ProController@myzd');
    Route::get('mysy','ProController@mysy');
    Route::get('mytz','ProController@mytz');

    //图形验证码
    Route::get('captcha','ProController@captcha');

    //支付
    Route::get('pay','ProController@pay');

    //短信验证码
    Route::get('mess/{m}','ProController@mess');
    Route::get('checkmess','ProController@checkmess');
});



















