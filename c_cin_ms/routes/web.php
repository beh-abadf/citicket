<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\UIController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersServices;
use App\Http\Middleware\HasBoughtBill;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;

//Error routes
Route::view('error', 'errors\error');

//Orders routes
Route::get('orders-admin', [OrdersController::class, 'OrdersAdmin']);
Route::get('orders-user/{id}', [OrdersController::class, 'OrdersUser']);

Route::view('buy-bill', "orders\buy_bill");
Route::get('buy-bill/{id}', [OrdersController::class, "BuyBill"]);

Route::get('register-an-order/{id}', [OrdersController::class, "RegisterAnOrder"])->middleware('has_bill');
Route::get('delete-the-order/{id}', [OrdersController::class, 'DeleteTheOrder']);

//UI routes
Route::view('famimages', 'ui\fam_images');
Route::post('famimages', [UIController::class, 'BestImages']);

Route::post('comment', [UIController::class, "AddAComment"]);

//Middlewares
Route::get('export-pdf/{id}', [OrdersController::class, 'CreatePdfFile']);

//Films routes
Route::get('films-admin', [FilmsController::class, 'FilmsAdmin']);
Route::get('/', [FilmsController::class, 'ShowList']);
Route::get('setfilmid/{film_id}', [FilmsController::class, 'SetFilmId']);

Route::get('init-values-of-the-film-addition', [FilmsController::class, 'InitialValuesForTheFilmAddition']);
Route::post('add-a-film', [FilmsController::class, 'AddAFilm']);

Route::get('init-values-of-the-film-edition/{id}', [FilmsController::class, 'InitialValuesForTheFilmEdition']);
Route::post('update-the-film-information/{id}', [FilmsController::class, 'UpdateTheFilmInformation']);

Route::get('delete-the-film/{id}', [FilmsController::class, 'DeleteAFilm']);

//Cinemas routes
Route::get('cinemas-admin', [PlacesController::class, 'CinemasAdmin']);
Route::get('select-a-city/{id}', [PlacesController::class, 'InitCities']);

Route::get('init-values-of-the-cinema-addition', [PlacesController::class, 'InitialValuesForTheCinemaAddition']);
Route::post('add-a-cinema', [PlacesController::class, 'AddACinema']);

Route::get('init-values-of-the-cinema-edition/{id}', [PlacesController::class, 'InitialValuesForTheCinemaEdition']);
Route::post('update-the-cinema-information/{id}', [PlacesController::class, 'UpdateTheCinemaInformation']);

Route::get('delete-a-cinema/{id}', [PlacesController::class, 'DeleteACinema']);
//News routes
Route::get('news-admin', [NewsController::class, "NewsAdmin"]);
Route::get('news-user', [NewsController::class, "NewsUser"]);

Route::view('add-news', 'news\add_news');
Route::post('add-news', [NewsController::class, "AddNews"]);

Route::get('edit-news/{id}', [NewsController::class, "EditNews"]);
Route::post('update-news/{id}', [NewsController::class, "UpdateNews"]);

Route::get('delete-news/{id}', [NewsController::class, "DeleteNews"]);

//Users routes
Route::get('users-admin', [UsersController::class, "UsersAdmin"]);

Route::view('user-signup', "user_services\\user_signup");
Route::post('user-signup', [RegisterController::class, "register"]);

Route::view('user-login', "user_services\\user_login")
    ->name('user-login')
    ->middleware('entered');
Route::post('user-login', [LoginController::class, 'login']);

Route::view('forgotten-password-controller-page', 'user_services\forgotten_password_controller_page');
Route::post('forgotten-password-controller-page', [UsersServices::class, 'HandleForgottenPassword']);

Route::view('reset-password', 'user_services\reset_password');
Route::post('reset-password', [UsersServices::class, 'UpdatePassword']);

Route::get('deleteauser/{id}', [UsersController::class, "DeleteAUser"]);


