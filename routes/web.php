<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello-world', function() {
    return 'Hello, World!';
});

Route::get('/hello/{name}', function($name) {
    return "Hello, {$name}!";
});

Route::redirect('/prefectures', '/prefecture');
Route::resource('prefecture', 'PrefectureController');
