<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Parsedown;
use Exception;

class ContentController extends Controller
{
    public static function getContent(String $name){
        $markdownText = Storage::disk('local')->get($name);

        if(!isset($markdownText)){
            $content = '<h2>Ops... Conteúdo não encontrado</h2>';
            // abort(404);
        }
        else{
            $parsedown = new Parsedown();
            $content = $parsedown->text($markdownText);
        }

        return $content;
    }
}
