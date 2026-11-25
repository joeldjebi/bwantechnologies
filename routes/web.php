<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RealisationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/equipe', [PageController::class, 'team'])->name('team');

Route::get('/realisations', [RealisationController::class, 'index'])->name('realisations.index');
Route::get('/realisations/{realisation}', [RealisationController::class, 'show'])->name('realisations.show');

Route::get('/blog', [ArticleController::class, 'index'])->name('blog.index');
Route::get('/blog/{article}', [ArticleController::class, 'show'])->name('blog.show');

Route::get('/emplois', [JobOfferController::class, 'index'])->name('jobs.index');
Route::get('/emplois/{jobOffer}', [JobOfferController::class, 'show'])->name('jobs.show');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
