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

Route::get('subhome','FrondEndController@subhome')->name('subhome');
Route::post('submit','FrondEndController@submit')->name('submit');
Route::get('login','LoginController@login')->name('login');
Route::post('do-login','LoginController@dologin')->name('do.login');

Route::group(['middleware'=>'user_auth'],function(){
    Route::get('/','FrondEndController@homepage')->name('home');
    Route::get('logout','LoginController@logout')->name('logout.user');
    Route::get('new-user','FrondEndController@create')->name('create.user');
    Route::get('delete-user/{user_id}','FrondEndController@delete')->name('delete.user');
    Route::get('activate-user/{user_id}','FrondEndController@activate')->name('activate.user');
    Route::get('force-delete-user/{user_id}','FrondEndController@forceDelete')->name('force.user');
    Route::get('edit-user/{user_id}','FrondEndController@edituser')->name('edit.user');
    Route::get('view-user/{user_id}','FrondEndController@viewuser')->name('view.user');
    Route::post('update-user','FrondEndController@updateuser')->name('update.user');
    Route::post('save-user','FrondEndController@save')->name('save.user');
    Route::get('about-us','FrondEndController@aboutus')->name('about');
    Route::get('contact-us','FrondEndController@contactus')->name('contact');
    Route::get('export','FrondEndController@export')->name('export');
    Route::get('admin','LoginController@admin')->name('admin');
});

