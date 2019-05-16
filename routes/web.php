<?php

Route::get('/', ['middleware' => 'auth', 'uses' => 'HomeController@index']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('data_caslab','CaslabController');

Route::get('data_portofolio','PortofolioController@edit')->name('portofolio');
Route::post('data_portofolio','PortofolioController@update');

Route::get('tes/add','TesController@create')->name('addtes');
Route::post('tes/add','TesController@store')->name('storetes');
Route::resource('tes','TesController');

Route::resource('wawancara','WawancaraController');
// Route::get('wawancara/add','WawancaraController@create')->name('addvalue');
// Route::post('wawancara/add','WawancaraController@store')->name('storevalue');

Route::resource('hasil','HasilController');

// Auth::routes();


// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm',
  ]);
  Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login',
  ]);
  Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
  ]);
  
    // Password Reset Routes...
  Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
  ]);
  Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
  ]);
  Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'Auth\ResetPasswordController@reset'
  ]);
  Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
  ]);
  
    // Registration Routes...
  Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
  ]);
  Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
  ]);

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/post/add', 'AddController@create')->name('addpost');
// Route::post('/post/add', 'AddController@store')->name('storepost');
