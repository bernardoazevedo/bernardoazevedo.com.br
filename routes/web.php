<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::get('/', function () {
    $pageArray = ContentController::getAboutme();
    return view('content', ['htmlText' => $pageArray['content'], 'pageTitle' => $pageArray['title']]);
});

Route::get('/content', function () {
    $pageArray = ContentController::listContent();
    return view('list-content', ['htmlText' => $pageArray['content'], 'pageTitle' => $pageArray['title']]);
});

Route::get('/content/{slug}', function ($slug) {
    $pageArray = ContentController::getContent($slug);
    return view('content', ['htmlText' => $pageArray['content'], 'pageTitle' => $pageArray['title']]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
