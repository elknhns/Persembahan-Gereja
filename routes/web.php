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
Route::get('/umat/{person:code}/ubah', 'PersonController@edit');
Route::patch('/umat/{person:code}/ubah', 'PersonController@update');
Route::delete('/umat/{person:code}/hapus', 'PersonController@delete');
Route::get('/umat/scan/{person:code}', 'PersonController@scan');

Route::get('lingkungan', 'AreaController@index')->name('areas');
Route::post('/lingkungan/tambah', 'AreaController@create')->name('areas.create');

Route::get('/lingkungan/{area:slug}', 'AreaController@show');
Route::delete('/lingkungan/{area:slug}/hapus', 'AreaController@delete');

Route::get('/persembahan', 'OfferingController@index')->name('offerings');
Route::get('/persembahan/export_to_excel', 'OfferingController@exportToExcel')->name('offerings.excel');
Route::get('/persembahan/tambah', 'OfferingController@create')->name('offerings.create');
Route::post('/persembahan/simpan', 'OfferingController@store')->name('offerings.store');
Route::get('/persembahan/{offering:code}', 'OfferingController@show')->name('offerings.show');
Route::get('/persembahan/{offering:code}/ubah', 'OfferingController@edit');
Route::patch('/persembahan/{offering:code}/ubah', 'OfferingController@update');
Route::delete('/persembahan/{offering:code}/hapus', 'OfferingController@delete');