<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
        $filesList = Storage::disk('public')->files('content');

        foreach($filesList as $key => $mdFile){
            $mdFile = str_replace('content/', '', $mdFile);
            $filesList[$key] = $mdFile;
            $markdownFiles[$mdFile] = Storage::disk('local')->get("public/content/$mdFile");
        }

        return view('dashboard', [
            'markdownFiles' => $markdownFiles,
        ]);
    }

    public function saveFilesContentToDatabase(){
        $filesList = Storage::disk('public')->files('content');

        try{

            foreach($filesList as $key => $mdFile){
                $mdFile = str_replace('content/', '', $mdFile);
                $filesList[$key] = $mdFile;
                $markdownFiles[$mdFile] = Storage::disk('local')->get("public/content/$mdFile");
            }
            
            $contentController = new ContentController();
            foreach($markdownFiles as $title => $text){
                $contentController->storeByArray([
                    'title' => $title,
                    'text'  => $text,
                ]);
            }
        }
        catch(Exception $e){
            dd($e->getMessage());
        }

        return view('dashboard', [
            'markdownFiles' => $markdownFiles,
        ]);
    }
}
