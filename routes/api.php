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

//联合惩戒 列表
Route::any('/punish','PunishController@Punish_list');
//惩戒 详情
Route::any('/punish_details','PunishController@punish_details');
//联合惩戒 添加
Route::post('/punish_add','PunishController@punish_add');

