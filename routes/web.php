<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/like', 'App\Http\Controllers\usersController@like')->name('like');

Route::get('/first', 'App\Http\Controllers\usersController@first')->name('users.first');
Route::post('/first', 'App\Http\Controllers\usersController@first')->name('users.first');

Route::get('/index', 'App\Http\Controllers\usersController@index')->name('users.index');
Route::post('/index', 'App\Http\Controllers\usersController@index')->name('users.index');

Route::get('/signup', 'App\Http\Controllers\usersController@signup')->name('users.signup');

Route::post('/complete', 'App\Http\Controllers\usersController@complete')->name('users.complete');

Route::get('/login', 'App\Http\Controllers\usersController@getlogin')->name('users.login');
Route::post('/login', 'App\Http\Controllers\usersController@login')->name('users.login');

Route::get('/pass', 'App\Http\Controllers\usersController@getPass')->name('users.pass');
Route::post('/pass', 'App\Http\Controllers\usersController@pass')->name('users.pass');

Route::get('/pass_confirm', 'App\Http\Controllers\usersController@pass_confirm')->name('users.pass_confirm');

Route::post('/pass_complete', 'App\Http\Controllers\usersController@pass_complete')->name('users.pass_complete');

Route::post('/detail/{id}/', 'App\Http\Controllers\usersController@detail')->name('users.detail');

Route::get('/application/{id}', 'App\Http\Controllers\usersController@application')->name('users.application');
Route::post('/application/{id}', 'App\Http\Controllers\usersController@application')->name('users.application');

Route::post('/application_complete/{id}', 'App\Http\Controllers\usersController@application_complete')->name('users.application_complete');

Route::get('/list', 'App\Http\Controllers\usersController@list')->name('users.list');
Route::post('/list', 'App\Http\Controllers\usersController@list')->name('users.list');

Route::get('/post', 'App\Http\Controllers\usersController@post')->name('users.post');
Route::post('/post', 'App\Http\Controllers\usersController@post')->name('users.post');

Route::post('/new_post', 'App\Http\Controllers\usersController@new_post')->name('users.new_post');

Route::post('/post_complete', 'App\Http\Controllers\usersController@post_complete')->name('users.post_complete');

Route::post('/post_list/{id}', 'App\Http\Controllers\usersController@post_list')->name('users.post_list');

Route::get('/post_edit/{id}', 'App\Http\Controllers\usersController@post_edit')->name('users.post_edit');
Route::post('/post_edit/{id}', 'App\Http\Controllers\usersController@post_edit')->name('users.post_edit');

Route::get('/update/{id}', 'App\Http\Controllers\usersController@update')->name('users.update');
Route::post('/update/{id}', 'App\Http\Controllers\usersController@update')->name('users.update');

Route::post('/account', 'App\Http\Controllers\usersController@account')->name('users.account');

Route::post('/account_edit', 'App\Http\Controllers\usersController@account_edit')->name('users.account_edit');

Route::post('/account_update', 'App\Http\Controllers\usersController@account_update')->name('users.account_update');

Route::get('/user_list', 'App\Http\Controllers\usersController@user_list')->name('users.user_list');

Route::post('/delete/{id}', 'App\Http\Controllers\usersController@delete')->name('users.delete');

Route::post('/cancele/{id}', 'App\Http\Controllers\usersController@cancele')->name('users.cancele');

Route::get('/header', 'App\Http\Controllers\usersController@header')->name('users.header');
Route::post('/header', 'App\Http\Controllers\usersController@header')->name('users.header');

Route::get('/logout', 'App\Http\Controllers\usersController@logout')->name('users.logout');

Route::post('/like', 'App\Http\Controllers\usersController@like')->name('users.like');

Route::get('/manager', 'App\Http\Controllers\managerController@manager')->name('managers.manager');
Route::post('/manager', 'App\Http\Controllers\managerController@manager')->name('managers.manager');


Route::get('/manager_user', 'App\Http\Controllers\managerController@manager_user')->name('managers.manager_user');
Route::post('/manager_user', 'App\Http\Controllers\managerController@manager_user')->name('managers.manager_user');

Route::get('/manager_edit/{id}', 'App\Http\Controllers\managerController@manager_edit')->name('managers.manager_edit');
Route::post('/manager_edit/{id}', 'App\Http\Controllers\managerController@manager_edit')->name('managers.manager_edit');

Route::post('/manager_header', 'App\Http\Controllers\managerController@manager_header')->name('managers.manager_header');

Route::post('/user_delete/{id}', 'App\Http\Controllers\managerController@user_delete')->name('managers.user_delete');

Route::post('/team_delete/{id}', 'App\Http\Controllers\managerController@team_delete')->name('managers.team_delete');