<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Services\ParserService;
use App\Http\Controllers\SearchController;

Route::get('/', [ContentController::class, 'showAboutMe'])->name('about-me');
Route::get('/content', [ContentController::class, 'listContent'])->name('content.list');
Route::get('/content/{slug}', [ContentController::class, 'showContent'])->name('content.show');

Route::get('/markdownToHtml', [ParserService::class, 'markdownToHtmlAjax'])->name('markdownToHtml');

Route::get('/searchContents', [SearchController::class, 'searchContentsAjax'])->name('searchContents');

Route::middleware('auth')->group(function () {
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // content
    // Route::get('/saveToDatabase', [ContentController::class, 'saveFilesContentToDatabase'])->name('saveToDatabase');
    Route::get('/edit/{slug}', [ContentController::class, 'edit'])->name('content.edit');
    Route::patch('/content', [ContentController::class, 'update'])->name('content.update');
    Route::delete('/content', [ContentController::class, 'destroy'])->name('content.destroy');
    Route::get('/new-content', [ContentController::class, 'create'])->name('content.create');
    Route::post('/store-content', [ContentController::class, 'store'])->name('content.store');
});

require __DIR__.'/auth.php';
