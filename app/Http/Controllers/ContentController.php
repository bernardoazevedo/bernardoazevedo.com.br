<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Parsedown;

class ContentController extends Controller
{
    public static function getContent(String $name){
        $markdownText = Storage::disk('local')->get('public/content/' . $name);

        if(!isset($markdownText)){
            $content = '<h2>Ops... Conteúdo não encontrado</h2>';
        }
        else{
            $parsedown = new Parsedown();
            $content = $parsedown->text($markdownText);
        }

        return $content;
    }

    public static function listContent(){
        $content = '';
        
        $filesArray = Storage::disk('public')->files('content');
        if(count($filesArray) == 0){
            $content = '<h2>Ops... Conteúdo não encontrado</h2>';
        }
        else{
            $parsedown = new Parsedown();
            
            foreach($filesArray as $file){
                $fileName = str_replace('content/', '', $file);
                $fileName = str_replace('.md', '', $fileName);
                $fileWithoutSpace = str_replace(' ', '%20', $file);

                $line = '- [' . $fileName . '](/' . $fileWithoutSpace . ')<br />';
                $content = $content . $parsedown->text($line);
            }
        }

        return $content;
    }
}
