<?php


use App\Http\Controllers\AccountypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


//Route::resource('accountType', 'App/Http/Controllers/AccountypeController');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//    Route::controller(AccountypeController::class)->group(function () {
//        Route::get('/home/Accountype', 'index');
//
//    });


    Route::resource('Accountype', AccountypeController::class)->only([
        'index','store'
    ]);

});
