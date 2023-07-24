<?php

use App\Http\Controllers\FilmsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PlacesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UIController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersServices;
use App\Http\Middleware\AuthUser;
use App\Http\Middleware\HasBoughtBill;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;


//Error routes
Route::view('error', 'errors/error');

//Orders routes
Route::get('ordersuser/{id}', [OrdersController::class, 'OrdersUser']);
Route::get('ordersadmin', [OrdersController::class, 'OrdersAdmin']);

Route::get('deleteanorder/{id}', [OrdersController::class, 'DeleteAnOrder']);
Route::view('buybill', "orders/buy_bill");

Route::get('buybill/{id}', [OrdersController::class, "BuyBill"]);
Route::get('registeranorder/{id}', [OrdersController::class, "RegisterAnOrder"])->middleware('auth')->middleware('hasbill');

//UI routes
Route::post('comment', [UIController::class, "AddAComment"]);
Route::view('famimages', 'ui/fam_images');

Route::post('famimages', [UIController::class, 'BestImages']);

//Middlewares
Route::get('export-pdf/{id}', [OrdersController::class, 'CreatePdfFile'])->middleware('auth');

//Films routes
Route::get('/', [FilmsController::class, 'ShowList']);
Route::view('addafilm', 'films/add_a_film');

Route::get('filmsadmin', [FilmsController::class, 'FilmsAdmin']);
Route::get('addafilm', [FilmsController::class, 'AddAFilmFirstInit']);

Route::post('addafilm', [FilmsController::class, 'AddAFilm']);
Route::get('editafilm/{id}', [FilmsController::class, 'EditAFilm']);

Route::post('updatethefilm/{id}', [FilmsController::class, 'UpdateTheFilmInformation']);
Route::get('delete_an_item/{id}', [FilmsController::class, 'DeleteAFilm']);

Route::get('setfilmid/{film_id}', [FilmsController::class, 'SetFilmId']);

//Places routes
Route::get('selectaplace/{place_id}', [PlacesController::class, 'InitPlaces']);
Route::get('placesadmin', [PlacesController::class, 'PlacesAdmin']);

Route::get('addaplace', [PlacesController::class, 'AddAPlaceFirstInit']);
Route::post('addaplace', [PlacesController::class, 'AddAPlace']);

Route::get('editaplace/{id}', [PlacesController::class, 'EditAPlace']);
Route::post('updatetheplace/{id}', [PlacesController::class, 'UpdateThePlaceInformation']);

Route::get('deleteaplace/{id}', [PlacesController::class, 'DeleteAPlace']);
Route::get('selectacity/{id}', [PlacesController::class, 'InitCities']);

//News routes
Route::view('addnews', 'news/add_news');
Route::get('newsuser', [NewsController::class, "ShowNews"]);

Route::get('newsadmin', [NewsController::class, "NewsAdmin"]);
Route::post('addnews', [NewsController::class, "AddNews"]);

Route::get('editnews/{identification}', [NewsController::class, "EditNews"]);
Route::post('updatenewsinformation/{id}', [NewsController::class, "UpdateNewsInformation"]);

Route::get('deletenews/{identification}', [NewsController::class, "DeleteNews"]);

//Users routes
Route::get('usersadmin', [UsersController::class, "UsersAdmin"]);
Route::get('deleteauser/{id}', [UsersController::class, "DeleteAUser"]);

Auth::routes();
Route::get('../', [HomeController::class, 'index']);
