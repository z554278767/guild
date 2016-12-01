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