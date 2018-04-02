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

Route::get('/', 'WelcomeController@index');
Route::get('Materiel/{id}','MaterielController@single')->name('single');
Route::get('/event','EventController@index')->name('events');
Route::post('Materiel/{id}','CommentaireController@store')->name('single');
Route::get('/twitch', 'TwitchController@getTopGames')->name('twitch');






/* admin */
Route::get('/admin/welcome', 'WelcomeController@index')->name('admin.welcome');
Route::get('/admin/AjoutMateriel', 'MaterielController@createMateriel');
Route::post('/admin/AjoutMateriel', 'MaterielController@store')->name('materiel.add');
Route::get('/admin/AjoutCategorie', 'CategorieController@createCategorie')->name('category.add');
Route::post('/admin/AjoutCategorie', 'CategorieController@store');
Route::get('/admin/Materiel/destroy/{id}','MaterielController@delete')->name('admin.delete');
Route::get('/admin/Materiel/update/{id}', 'MaterielController@updateview')->name('admin.updateview');
Route::post('/admin/Materiel/update/{id}', 'MaterielController@update')->name('admin.update');
Route::get('/admin/Materiel/{id}','MaterielController@single')->name('admin.single');
Route::get('admin/event', 'EventController@index')->name('admin.events');
Route::post('admin/event', 'EventController@addEvent')->name('events.add');
Route::post('admin/Materiel/{id}','CommentaireController@store');
Auth::routes();


