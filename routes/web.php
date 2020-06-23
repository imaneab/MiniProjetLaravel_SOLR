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
Route::resource('actualites','ActualiteController');
Route::get('/', function () {
    return view('index');
});
Route::resource('/', 'ActualiteController');


Route::get('main/index', 'ActualiteController@indexActualite');

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/elements', function () {
    return view('elements');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/connexion', function () {
    return view('User.login');
});

//admin
Route::get('/main','MainController@indexAdmin');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/create', 'MainController@create');
Route::get('/edit', 'MainController@edit');
Route::get('main/logout', 'MainController@logout');
Route::get('/main/listAllFiles', 'FileController@listAllFiles');

//user
Route::post('/user/checklogin', 'UserController@checklogin');
Route::get('user/successlogin', 'UserController@successlogin');
Route::get('/ajouterFichier', 'FileController@ajouterFichierPage');
Route::post('/ajouterFichier', 'FileController@saveFile')->name('saveFile');
Route::get('/listFichier/{id}', 'FileController@listFichier');


