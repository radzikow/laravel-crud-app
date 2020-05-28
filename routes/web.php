<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;


// Public pages
Route::get('/', function () {
  return view('welcome');
});
Route::get('/products', 'ProductController@products');
Route::post('/products/search', 'ProductController@search');
Route::get('/product/{id}', 'ProductController@details');

// Auth routes
Auth::routes([
  'reset' => false,
  'verify' => false,
]);

// Admin pages
Route::group([
  'middleware' => 'auth',
  'prefix' => 'dashboard'
], function () {
  Route::get('/', 'ProductController@index');
  Route::get('/create', 'ProductController@create');
  Route::post('/create', 'ProductController@store');
  Route::post('/search', 'ProductController@dashboardSearch');
  Route::get('/edit/{id}', 'ProductController@edit');
  Route::put('/update/{id}', 'ProductController@update');
  Route::delete('/destroy/{id}', 'ProductController@destroy');
});


// ------------------------------
// Clearing page
Route::get('/clear', function () {
  return view('clear');
});

// ------------------------------
// Clear cache facade value:
Route::get('/clear-cache', function () {
  $exitCode = Artisan::call('cache:clear');
  return back()->with('clear-message', 'Cache facade value cleared!');
});

// ------------------------------
// Clear route cache:
Route::get('/clear-route', function () {
  $exitCode = Artisan::call('route:clear');
  return back()->with('clear-message', 'Route cache cleared!');
});

// ------------------------------
// Clear view cache:
Route::get('/clear-view', function () {
  $exitCode = Artisan::call('view:clear');
  return back()->with('clear-message', 'View cache cleared!');
});

// ------------------------------
// Clear config cache:
Route::get('/clear-config', function () {
  $exitCode = Artisan::call('config:clear');
  return back()->with('clear-message', 'Config cache cleared!');
});
