<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;
use App\Http\Controllers\CrudController;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function(){
        Route::get('/', function () {
            return view('welcome');
        });

        Auth::routes(['verify'=>true]);

        Route::get('redirect/{service}','App\Http\Controllers\SocialController@redirect');
        Route::get('callback/{service}','App\Http\Controllers\SocialController@callback');

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
            ->name('home')->middleware(['auth','verified']);

        Route::get('/send', function(){
            Mail::to('arabeagle345@gmail.com')
                ->send(new TestMail());
            return response('Sending Completed');
        });

        Route::resource('offers', CrudController::class);

    });








