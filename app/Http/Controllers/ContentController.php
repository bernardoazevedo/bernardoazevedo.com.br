<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Parsedown;

class ContentController extends Controller
{
    public static function getContent(String $name){
        $markdownText = Storage::disk('local')->get('public/content/' . $name .'.md');

        if(!isset($markdownText)){
            $content = '<h2>Ops... Conteúdo não encontrado</h2>';
        }
        else{
            $parsedown = new Parsedown();
            $content = $parsedown->text($markdownText);
        }

        $page = ['title' => $name, 'content' => $content];

        return $page;
    }

    public static function listContent(){
        $content = '<h1>Content</h1>';
        
        $filesArray = Storage::disk('public')->files('content');
        if(count($filesArray) == 0){
            $content = '<h2>Ops... Conteúdo não encontrado</h2>';
        }
        else{
            $parsedown = new Parsedown();
            
            foreach($filesArray as $file){
                $fileName = str_replace('content/', '', $file);
                $fileName = str_replace('.md', '', $fileName);
                $file = str_replace('.md', '', $file);
                $fileWithoutSpace = str_replace(' ', '%20', $file);

                $line = '- [' . $fileName . '](/' . $fileWithoutSpace . ')<br />';
                $content = $content . $parsedown->text($line);
            }
        }

        $page = ['title' => "Content", 'content' => $content];

        return $page;
    }

    public static function getAboutme(){
        $markdownText = Storage::disk('local')->get('public/about-me/about-me.md');

        if(!isset($markdownText)){
            $content = '<h2>Ops... Conteúdo não encontrado</h2>';
        }
        else{
            $parsedown = new Parsedown();
            $content = $parsedown->text($markdownText);
        }

        $page = ['title' => "Bernardo Azevedo Costa", 'content' => $content];

        return $page;
    }
}
