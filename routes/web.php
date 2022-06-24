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

Route::resource('genders', GenderController::class);
Route::resource('skills', SkillController::class);
Route::resource('heroes', HeroController::class);
Route::resource('races', RaceController::class);
Route::resource('universes', UniverseController::class);

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');
