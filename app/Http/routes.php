<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

Route::get('/home', 'HomeController@index');

Route::get('tentang', 'PagesController@tentang');
Route::get('tentang/{slug}', 'PagesController@show');
Route::get('kontak', 'PagesController@kontak');
Route::get('p/{slug}', 'PagesController@show');

Route::get('alumni/direktori', 'AlumniController@list');
Route::get('dashboard', 'AlumniController@dashboard');

Route::get('responden', 'AlumniController@responden');

Route::get('test', function(){
        \Mail::send('emails.register', ['data' => 'test' ], function ($m) {
        $m->from('admin@ikastaba.or.id', 'Your Application');
        $m->to('juniorsev3n@gmail.com','irfan')->subject('IKASTABA REGISTRASI!');
                });

});

Route::get('a/{code}', 'AuthController@active');
