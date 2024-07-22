<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('home');
});

Route::get('/about-me', function () {
    return view('about-me');
});

Route::get('/content', function () {
    try
    {
        $filename = 'teste.md';
        $markdownText = Storage::disk('local')->get('teste.md');
    }
    catch (Exception $exception)
    {
        dd($markdownText);
    }

    $parsedown = new Parsedown();
    $htmlText = $parsedown->text($markdownText);

    return view('content', ['htmlText' => $htmlText]);
});