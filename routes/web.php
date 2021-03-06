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
Route::get('wawancara/add','WawancaraController@create')->name('addvalue');
Route::post('wawancara/add','WawancaraController@store')->name('storevalue');

Route::resource('hasil','HasilController');

// Auth::routes();


// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm',
    'middleware'    => 'checkstatus'
  ]);
  Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login',
    'middleware'    => 'checkstatus'
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

Route::group(['middleware' => ['role:admin','auth']], function () {
  Route::get('/user/list', 'AdminController@user_list')->name('user_list');
  Route::get('/user/baru', 'AdminController@new_user')->name('new_user');
  Route::patch('/caslab/baru/{id}', 'AdminController@terima_caslab')->name('terima_caslab');
  Route::patch('/user/detail/{id}', 'AdminController@detail_user')->name('detail_user');
  Route::patch('/user/{id}','AdminController@edit')->name('user.edit');
});

Route::group(['middleware' => ['auth']], function () {
  Route::get('/caslab/list', 'CaslabController@list_caslab')->name('list_caslab');
  Route::get('/caslab/ujian', 'CaslabController@ujian')->name('ujian');
  Route::patch('/caslab/ujian/{id}', 'CaslabController@action_ujian_caslab')->name('action_ujian_caslab');
  Route::patch('/caslab/rincian/{id}', 'CaslabController@rincian_ujian_caslab')->name('rincian_ujian_caslab');
  Route::patch('/caslab/ujian/{id}/submit', 'CaslabController@submit_pengerjaan')->name('submit_pengerjaan');
  Route::get('/portofolio/page', 'CaslabController@portofolio_page')->name('portofolio');
  Route::patch('/portofolio/upload', 'CaslabController@porto_upload')->name('porto_upload');
});

Route::group(['middleware' => ['role:asisten|admin','auth']], function () {
  Route::get('/ujian/list', 'AsistenController@list_ujian')->name('list_ujian');
  Route::get('/ujian/new', 'AsistenController@buat_ujian')->name('buat_ujian');
  Route::get('/portofolio/list', 'CaslabController@list_portofolio')->name('list_portofolio');
  Route::patch('/ujian/{idTest}/wawancara/{nim}', 'AsistenController@action_wawancara')->name('action_wawancara');
  Route::patch('/ujian/{idTest}/wawancara/{nim}/submit', 'AsistenController@submit_wawancara')->name('submit_wawancara');
  Route::patch('/ujian/submit', 'AsistenController@buat_ujian_submit')->name('buat_ujian_submit');
  Route::patch('/ujian/action/{id}', 'AsistenController@action_ujian')->name('action_ujian');
  Route::patch('/ujian/action/{id}/submit', 'AsistenController@edit_ujian_submit')->name('edit_ujian_submit');
  Route::get('/ujian/{id}/soal/new', 'AsistenController@buat_soal')->name('buat_soal');
  Route::patch('/ujian/{id}/soal/submit', 'AsistenController@buat_soal_submit')->name('buat_soal_submit');
  
  Route::get('/ujian/nilai', 'AsistenController@list_nilai_total')->name('list_nilai_total');
  Route::patch('/ujian/nilai/{id}', 'AsistenController@list_nilai_ujian')->name('list_nilai_ujian');
  Route::patch('/ujian/{idTest}/soal/{id}/destroy', 'AsistenController@hapus_soal')->name('hapus_soal');

  Route::patch('/portofolio/{id}/nilai', 'AsistenController@penilaian_porto')->name('penilaian_porto');
  Route::patch('/portofolio/{id}/submit', 'AsistenController@nilai_porto_submit')->name('nilai_porto_submit');
  
  
  Route::patch('/topsis/{id}/rekomendasi', 'AsistenController@perhitunganTopsis')->name('perhitunganTopsis');
  Route::get('/topsis/list', 'AsistenController@topsisOne')->name('topsisOne');
});