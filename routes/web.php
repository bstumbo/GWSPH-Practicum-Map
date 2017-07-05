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

Route::get('/','Map@index');
Route::post('/departments', 'AppSearch@apply');
Route::post('/sites', 'Admin\AdminSearch\SiteSearch@apply')->name('sites');
Route::get('/upload', 'JSONUploader@index');
Route::post('/uploaded', 'JSONUploader@uploadJSON');
Route::get('/sites', 'Admin\Admin@sitesAll')->name('sitesall');
Route::get('/programs', 'Admin\Admin@programsAll')->name('programssall');
Route::get('/sites-edit/{site_id?}', 'Admin\Admin@readSite');
Route::post('/sites-edit', 'Admin\Admin@createSite');
Route::put('/sites-edit/{site_id?}', 'Admin\Admin@editSite');
Route::delete('/sites-edit/{site_id?}', 'Admin\Admin@deleteSite');
Route::get('/practicums', 'Admin\Admin@practicumsAll');
Route::post('/practicums', 'Admin\AdminSearch\PracticumSearch@apply');
Route::get('/practicums-edit/{practicum_id?}', 'Admin\Admin@readPrac');
Route::post('/practicums-edit', 'Admin\Admin@createPrac');
Route::put('/practicums-edit/{practicum_id?}', 'Admin\Admin@editPrac');
Route::delete('/practicums-edit/{practicum_id?}', 'Admin\Admin@deletePrac');
Route::get('/programs-edit/{programs_id?}', 'Admin\Admin@readProgram');
Route::post('/programs-edit', 'Admin\Admin@createProgram');
Route::put('/programs-edit/{programs_id?}', 'Admin\Admin@editProgram');
Route::delete('/programs-edit/{programs_id?}', 'Admin\Admin@deleteProgram');
Route::get('/import', function () {
            $this->middleware('auth');
            return view('import');
            });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
