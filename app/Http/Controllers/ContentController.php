<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Parsedown;

class ContentController extends Controller
{
    /**
     * Display the creating view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming creating request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'text'  => ['required', 'string'],
        ]);

        $content = Content::create([
            'title' => $request->title,
            'text'  => $request->text,
        ]);

        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Save content by array.
     */
    public function storeByArray(array $content): RedirectResponse
    {
        $content = Content::create([
            'title' => $content['title'],
            'text'  => $content['text'],
        ]);

        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Display the content's form.
     */
    public function edit(string $slug): View
    {
        $content = $this->getContentBySlug($slug);
        return view('content.edit', [
            'content' => $content,
        ]);
    }

    /**
     * Update the content's information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->content()->fill($request->validated());

        $request->content()->save();

        return Redirect::route('dashboard')->with('status', 'content-updated');
    }

    /**
     * Delete the content.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $content = $request->content();

        $content->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public static function getContent(String $name){
        $markdownText = Storage::disk('local')->get('public/content/' . $name .'.md');

        if(!isset($markdownText)){
            $content = '<h2>Ops... Conteúdo não encontrado</h2>';
        }
        else{
            $parsedown = new Parsedown();
            $content = $parsedown->text($markdownText);
        }
    }

    /**
     * 
     */
    public static function getContentBySlug(String $slug){
        $title = str_replace('%20', ' ', $slug);
        $content = Content::where('title', $title)->take(1)->get()[0];
        return $content;
    }

    /**
     * get all contents
     */
    public static function getContents(){
        return Content::all();
    }

    /**
     * 
     */
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

    /**
     * 
     */
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
                $title = str_replace('.md', '', $title);
                
                $contentController->storeByArray([
                    'title' => $title,
                    'text'  => $text,
                ]);
            }
        }
        catch(Exception $e){
            dd($e->getMessage());
        }

        return Redirect::to('dashboard');
    }
}
