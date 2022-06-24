<?php

use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UniverseController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/genders', function () {
    return Route::resource('genders', GenderController::class);
})->middleware(['auth'])->name('genders');

Route::get('/skills', function () {
    return Route::resource('skills', SkillController::class);
})->middleware(['auth'])->name('skills');

Route::get('/heroes', function () {
    return Route::resource('heroes', HeroController::class);
})->middleware(['auth'])->name('heroes');

Route::get('/races', function () {
    return Route::resource('races', RaceController::class);
})->middleware(['auth'])->name('races');

Route::get('/universes', function () {
    return Route::resource('universes', UniverseController::class);
})->middleware(['auth'])->name('universes');

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');
