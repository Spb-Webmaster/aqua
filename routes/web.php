<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Cabinet\CabinetJudgeController;
use App\Http\Controllers\Cabinet\CabinetManagerController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');
});



Route::controller(SignInController::class)->group(function () {

    Route::get('/login', 'page')
       /* ->middleware('guest')*/
        ->name('login');

    Route::post('/login', 'handle')
        ->name('login.handle');

});

Route::controller(LogoutController::class)->group(function () {
    // logout
    Route::post('/logout', 'handle')
        ->name('logout');
});


Route::controller(CabinetManagerController::class)->group(function () {

    Route::get('/cabinet-manager', 'page')
        ->middleware(['role:manager'])
        ->name('cabinetManager');


});

Route::controller(CabinetJudgeController::class)->group(function () {

/*    Route::get('/cabinet-judge', 'page')
        ->middleware(['role:judge'])
        ->name('cabinetJudge');*/
// пока не делаем


});

Route::controller(EventController::class)->group(function () {
// добавить событие
    Route::post('/add-event', 'add')
        ->middleware(['role:manager'])
        ->name('addEvent.handle');
// удалить событие
    Route::post('/delete', 'delete')
        ->middleware(['role:manager'])
        ->name('delete');
// вывод категории
    Route::get('/event/{category_id}', 'selectCategory');
// вывод спортсменов
    Route::get('/event/{category_id}/{item_id}', 'selectItem');
// добавить отценки
    Route::post('/add-score', 'score')
        ->middleware(['role:judge'])
        ->name('addScore.handle');
});



