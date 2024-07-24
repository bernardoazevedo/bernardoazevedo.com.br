<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about-me', function () {
    $htmlText = ContentController::getAboutme();
    return view('content', ['htmlText' => $htmlText]);
});

Route::get('/content', function () {
    $htmlText = ContentController::listContent();
    return view('content', ['htmlText' => $htmlText]);
});

Route::get('/content/{slug}', function ($slug) {
    $htmlText = ContentController::getContent($slug);
    return view('content', ['htmlText' => $htmlText]);
});