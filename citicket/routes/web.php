<?php

use App\Http\Controllers\Auth\ForgottenPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FilmsControllers\FilmsController;
use App\Http\Controllers\NewsControllers\NewsController;
use App\Http\Controllers\OrdersControllers\OrdersController;
use App\Http\Controllers\CinemasControllers\CinemasController;
use App\Http\Controllers\UIsControllers\UIsController;
use App\Http\Controllers\UsersControllers\UsersController;
use App\Http\Controllers\UsersControllers\UsersServices;
use App\Http\Middleware\HasBoughtBill;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;

//Error routes
Route::view('error', 'errors\error');

//Orders routes
Route::get('orders-admin', [OrdersController::class, 'ordersAdmin']);
Route::get('orders-user/{order}', [OrdersController::class, 'ordersUser']);

Route::view('buy-ticket', "orders\buy_ticket");
Route::get('buy-ticket/{order}', [OrdersController::class, "buyTicket"]);

Route::get('register-an-order/{order}', [OrdersController::class, "registerAnOrder"])->middleware('has_bill');
Route::get('delete-the-order/{order}', [OrdersController::class, 'deleteTheOrder']);

Route::get('create-ticket/{order}', [OrdersController::class, 'createATicket']);

//UI routes
Route::view('famimages', 'ui\fam_images');
Route::post('famimages', [UIsController::class, 'BestImages']);

Route::post('comment', [UIsController::class, "addAComment"]);

//Middlewares


//Films routes
Route::get('films-admin', [FilmsController::class, 'filmsAdmin']);
Route::get('/', [FilmsController::class, 'filmsUser']);
Route::get('setfilmid/{film}', [FilmsController::class, 'SetFilmId']);

Route::get('init-values-of-the-film-addition', [FilmsController::class, 'initializeInputsForTheFilmAddition']);
Route::post('add-a-film', [FilmsController::class, 'addAFilm']);

Route::get('init-values-of-the-film-edition/{film}', [FilmsController::class, 'initializeInputsForTheFilmEdition']);
Route::post('update-the-film-information/{film}', [FilmsController::class, 'updateTheFilmInformation']);

Route::get('delete-the-film/{film}', [FilmsController::class, 'deleteAFilm']);

//Cinemas routes
Route::get('cinemas-admin', [CinemasController::class, 'cinemasAdmin']);
Route::get('select-a-city/{id}', [CinemasController::class, 'dropdownValuesForCities']);

Route::get('init-values-of-the-cinema-addition', [CinemasController::class, 'initializeInputsForTheCinemaAddition']);
Route::post('add-a-cinema', [CinemasController::class, 'addACinema']);

Route::get('init-values-of-the-cinema-edition/{cinema}', [CinemasController::class, 'initializeInputsForTheCinemaEdition']);
Route::post('update-the-cinema-information/{cinema}', [CinemasController::class, 'updateTheCinemaInformation']);

Route::get('delete-a-cinema/{cinema}', [CinemasController::class, 'deleteACinema']);
//News routes
Route::get('news-admin', [NewsController::class, "newsAdmin"]);
Route::get('news-user', [NewsController::class, "newsUser"]);

Route::view('add-news', 'news\add_news');
Route::post('add-news', [NewsController::class, "addNews"]);

Route::get('edit-news/{news}', [NewsController::class, "initializeInputsForNewsEdition"]);
Route::post('update-news/{news}', [NewsController::class, "updateNewsInformation"]);

Route::get('delete-news/{news}', [NewsController::class, "deleteNews"]);

//Users routes
Route::get('users-admin', [UsersController::class, "UsersAdmin"]);

Route::view('user-signup', "user_services\\user_signup");
Route::post('user-signup', [RegisterController::class, "register"]);

Route::view('user-login', "user_services\\user_login")
    ->name('user-login');
Route::post('user-login', [LoginController::class, 'login'])
    ->middleware('entered');

Route::view('forgotten-password-controller-page', 'user_services\forgotten_password_controller_page');
Route::post('forgotten-password-controller-page', [UsersServices::class, 'handleForgottenPassword']);

Route::view('reset-password', 'user_services\reset_password');
Route::post('reset-password', [UsersServices::class, 'updatePassword']);

Route::get('delete-a-user/{user}', [UsersController::class, "deleteAUser"]);


