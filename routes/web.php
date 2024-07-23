<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about-me', function () {
    return view('about-me');
});

Route::get('/content', function () {
    $htmlText = ContentController::getContent('teste.md');
    return view('content', ['htmlText' => $htmlText]);
});