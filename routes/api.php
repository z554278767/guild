<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//登录
Route::any('/login','LoginController@login');
//审批列表
Route::any('/check_list','CompanysController@check_list');
//审批详情
Route::any('/details','CompanysController@details');
//动态信息列表
Route::any('/message_list','CommerceController@message_list');
//动态信息添加
Route::any('/message_add','CommerceController@message_add');
//动态信息删除
Route::any('/message_del','CommerceController@message_del');
//动态信息修改
Route::any('/message_update','CommerceController@message_update');
//标题关键字查询
Route::any('/search','CommerceController@search');