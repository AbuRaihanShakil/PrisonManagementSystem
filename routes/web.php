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
    return redirect()->route('prisoner.show');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/allstaffs','PagesController@allstaff')->name('show.staffs');
Route::get('/staff/{id}','PagesController@staff')->name('view.staff');
Route::post('/staff/{id}','StaffController@update')->name('update.staff');



Route::get('/addprisoner','PagesController@addPrisoner')->name('add.prisoner');
Route::get('/release/{pid}','PrisonerController@prisonerRelease')->name('release.prisoner');
Route::post('/addprisoner','PrisonerController@store')->name('prisoner.store');
Route::get('/allprisoners','PagesController@allPrisoner')->name('prisoner.show');
Route::get('/prisoner/{id}','PagesController@viewPrisoner')->name('prisoner.info');
Route::get('/editprisoner/{id}','PagesController@editPrisoner')->name('edit.prisoner');
Route::post('/editprisoner/{id}','PrisonerController@update')->name('prisoner.update');

Route::get('/addtask/{id}','PagesController@addTask')->name('add.task');
Route::post('/addtask/{pid}','TaskController@storeTask')->name('store.task');
Route::get('/complete/{id}/{pid}','TaskController@complete')->name('complete.task');
Route::get('/Fail/{id}/{pid}','TaskController@fail')->name('fail.task');
Route::get('/taskHistory/{pid}','PagesController@taskHistory')->name('History.task');

Route::get('/addvisitor/{pid}','PagesController@addVisitor')->name('visitor.add');
Route::post('/addvisitor/{pid}','VisitorController@storeVisitore')->name('visitor.store');

Route::post('/filter','PagesController@filter')->name('filter.prisoner');
Route::get('/search', 'PagesController@search')->name('search');

Route::post('/releasefilter','PagesController@releaseFilter')->name('filter.releasedPrisoner');
Route::get('/releaseallprisoners','PagesController@allReleasePrisoner')->name('releasedPrisoner.show');


Route::get('/releasedSearch','PagesController@searchHistory')->name('history.search');
});