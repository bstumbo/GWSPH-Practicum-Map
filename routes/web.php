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
Route::post('/departments', 'SiteSearch@apply');
Route::get('/upload', 'JSONUploader@index');
Route::post('/uploaded', 'JSONUploader@uploadJSON');
Route::get('/sites', 'Admin@sitesAll');
Route::get('/sites/{site_id?}', 'Admin@readSite');
Route::post('/sites', 'Admin@createSite');
Route::put('/sites/{site_id?}', 'Admin@editSite');
Route::delete('/sites/{site_id?}', 'Admin@deleteSite');
Route::get('/practicums', 'Admin@practicumsAll');
Route::get('/practicums/{practicum_id?}', 'Admin@readPrac');
Route::post('/practicums', 'Admin@createPrac');
Route::put('/practicums/{practicum_id?}', 'Admin@editPrac');
Route::delete('/practicums/{practicum_id?}', 'Admin@deletePrac');