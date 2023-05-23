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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('shippers', 'Admin\ShippersController');
Route::resource('warehouses', 'Admin\WarehouseController');
Route::resource('fornecedors', 'Admin\FornecedorController');
Route::put('/fornecedores/{id}', 'Admin\FornecedorController@update')->name('fornecedores.update');
// Route::resource('photos', 'PhotoController')->name('photos.index');

// Route::middleware('auth')->prefix('admin')->namespace('Admin')->group(function(){
//     Route::resource('artigos', 'ArtigosController')->middleware('can:eAutor');
//     Route::resource('usuarios', 'UsuariosController')->middleware('can:eAdmin');
//     Route::resource('autores', 'AutoresController')->middleware('can:eAdmin');
//     Route::resource('adm', 'AdminController')->middleware('can:eAdmin');
// });
