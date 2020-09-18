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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//-----HR Routes
Route::get('/admin/applications/{leaves}','LeavesController@show');

Route::get('/admin/get/leaves','LeavesController@leaves');

Route::get('/admin/get/applications','LeavesController@applications');

Route::get('/application/{id}','LeavesController@single');

Route::get('/admin/leaves','LeavesController@create');

Route::post('/create/leave','LeavesController@store');

Route::get('/employees', 'LeavesController@employees');

Route::get('/approve/application/{id}','LeavesController@approve');

Route::post('/assign/{id}','LeavesController@assign');

Route::get('/get/employee/{id}','LeavesController@employee');

Route::post('/reject/application/{id}','LeavesController@reject');

//----Admin Routes
Route::get('/allocated/all','AdminController@index');

Route::get('/profile/employee/{id}','AdminController@employee');

Route::get('/admin/tasks','AdminController@tasks');

Route::get('/admin/get/task/{id}','AdminController@task');

Route::post('/create/tasks','AdminController@create_task');

Route::post('/task/assign/{id}','AdminController@assign');

Route::post('/create/todo/{id}','AdminController@create_todo');

//----Employee Routes

Route::get('/complete/task/{id}','MyController@complete_task');

Route::post('/update/custom/{id}','MyController@custom');

Route::get('/my/applications','MyController@index');

Route::get('/my/tasks','MyController@tasks');

Route::get('/get/my/task/{id}','MyController@single_task');

Route::post('/submit/application','MyController@store');