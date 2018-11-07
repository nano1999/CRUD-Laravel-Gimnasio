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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/a', function () {
    $user = App\User::findOrFail(2);

    return $user->activities;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::resource('vehiculos', 'VehiculosController');

Route::get('/crearProfesor', 'AdminsController@crearProfesor');
Route::get('/crearActividad', 'AdminsController@crearActividad');
Route::get('/dictoActividad/{id}', 'ProfesorsController@dictoActividad');
Route::get('/asistoActividad/{id}', 'UsersController@asistoActividad');
Route::get('/altaActividad/{id}', 'UsersController@altaActividad');


Route::resource('profesors', 'ProfesorsController');
Route::resource('activities', 'ActivitiesController');
Route::resource('users', 'UsersController');
Route::resource('activities_users', 'Activities_usersController');