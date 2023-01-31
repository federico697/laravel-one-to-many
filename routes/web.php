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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', 'HomeController@index')->name('home');


'Auth'::routes();

// qui dobbiamo creare un modo per gestire le rotte sotto autenticanzione
Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('index');
        // aggiungo controller crud nella sezione admin
        Route::resource('/posts', PostsController::class );
    });

// qui dobbiamo creare un modo per gestire le rotte che non usano autenticanzione
Route::get('{any?}', function(){
    return view('guest.home');
})->where("any", ".*");

