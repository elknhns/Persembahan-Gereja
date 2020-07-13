<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/umat', 'PersonController@index')->name('people');
Route::get('/umat/tambah', 'PersonController@create')->name('people.create');
Route::post('/umat/simpan', 'PersonController@store')->name('people.store');
Route::get('/umat/{person:code}', 'PersonController@show')->name('people.show');
Route::get('/umat/{person:code}/edit', 'PersonController@edit');
Route::patch('/umat/{person:code}/edit', 'PersonController@update');
Route::delete('/umat/{person:code}/hapus', 'PersonController@delete')->name('people.delete');

Route::get('/persembahan', 'OfferingController@index')->name('offerings');
Route::get('/persembahan/tambah', 'OfferingController@create')->name('offerings.create');
Route::post('/persembahan/simpan', 'OfferingController@store')->name('offerings.store');
Route::get('/persembahan/{offering:code}', 'OfferingController@show')->name('offerings.show');
Route::get('/persembahan/{offering:code}/edit', 'OfferingController@edit')->name('offerings.edit');
Route::patch('/persembahan/{offering:code}/edit', 'OfferingController@update')->name('offerings.update');
Route::delete('/persembahan/{offering:code}/hapus', 'OfferingController@delete')->name('offerings.delete');