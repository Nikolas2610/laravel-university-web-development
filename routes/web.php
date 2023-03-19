<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\OfferController;
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

// Web Pages

Route::get('/', [HomeController::class, 'homePage'])->name('home');


Route::get('/announcements', [AnnouncementController::class, 'anouncementPage'])->name('announcements');
Route::get('/import', [OfferController::class, 'importPage'])->name('import');

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');

Route::get('/search', [OfferController::class, 'searchPage'])->name('search');

// Actions
Route::post('/register', [AuthController::class, 'createUser'])->name('createUser');
Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
Route::post('/announcements', [AnnouncementController::class, 'importAnnouncement'])->name('announcementImport');
Route::delete('/announcements', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
Route::post('/import', [OfferController::class, 'importOffer'])->name('import.offer');