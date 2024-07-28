<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::get('/', function () {
    $pageArray = ContentController::getAboutme();
    return view('content', ['htmlText' => $pageArray['content'], 'pageTitle' => $pageArray['title']]);
});

Route::get('/content', function () {
    $pageArray = ContentController::listContent();
    return view('content', ['htmlText' => $pageArray['content'], 'pageTitle' => $pageArray['title']]);
});

Route::get('/content/{slug}', function ($slug) {
    $pageArray = ContentController::getContent($slug);
    return view('content', ['htmlText' => $pageArray['content'], 'pageTitle' => $pageArray['title']]);
});