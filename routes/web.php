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
Route::get('{slug}', function () {
    return view('welcome');
})->where('slug', '(?!api|login)([A-z\d-\/_.]+)?')->name('react.index');
// Route::get('/', 'FrontEndController@get_index')->name('home.index');
Route::get('/thanks', function(){
	return view('thanks');
})->name('home.thanks');
Route::get('/contact', 'FrontEndController@get_contact')->name('home.contact');
Route::get('/page/{id}', 'FrontEndController@get_pages')->name('home.pages');
Route::get('/subpage/{id}', 'FrontEndController@get_sub_pages')->name('home.subpages');
Route::get('/api/all-data', 'FrontEndController@get_all_data')->name('home.getall');
Auth::routes();
Route::middleware(['auth'])->group(function () {
	Route::resource('/backend/dashboard','backend\SiteInfoController');
	Route::resource('/backend/page','backend\PageController');
	Route::resource('/backend/subpage','backend\SubPageController');
	Route::resource('/backend/review','backend\ReviewController');
	Route::resource('/backend/slider','backend\SliderController');
	Route::resource('/backend/affiliation','backend\AffiliationController');
});
Route::get('/home', 'backend\SiteInfoController@index')->name('home');
Route::post('/api/send', 'MailController@send')->name('mail.send');