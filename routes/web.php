<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMateriController;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\RegisterController;

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
    return view('home',[
        "judul" => "Home",
        "active" => "home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "judul" => "About",
        "active" => "about"
    ]);
});
Route::get('/materis', [MateriController::class, 'index']);
Route::get('/materis/{materi:slug}', [MateriController::class, 'show']);

Route::get('/kategories', function() {
    return view('kategories', [
        'judul' => 'Materi Kategories',
        'active' => 'kategories',
        'kategories' => Kategori::all()
    ]);
});


Route::get('/masuk', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/materis/checkSlug', [DashboardMateriController::class, 'checkSlug'])
->middleware('auth');
Route::resource('/dashboard/materis', DashboardMateriController::class)->middleware('auth');


