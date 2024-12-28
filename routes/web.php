<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;

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



Route::middleware('auth')->group(function () {
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // content
    Route::get('/saveToDatabase', [ContentController::class, 'saveFilesContentToDatabase'])->name('saveToDatabase');
    Route::get('/edit/{slug}', [ContentController::class, 'edit'])->name('content.edit');
    Route::patch('/content', [ContentController::class, 'update'])->name('content.update');
    Route::delete('/content', [ContentController::class, 'destroy'])->name('content.destroy');
});

require __DIR__.'/auth.php';
