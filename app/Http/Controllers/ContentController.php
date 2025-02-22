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

class ContentController extends Controller {
    /**
     * Action to show the about-me
     * @return false|\Illuminate\Contracts\View\View
     */
    public function showAboutMe(){
        return $this->showContent('about-me');
    }

    /**
     * Action to show a list with all contents
     * @return \Illuminate\Contracts\View\View
     */
    public function listContent(){
        return view('content.list-content', [
            'contents' => $this->getContents(),
        ]);
    }

    /**
     * Action to show selected content
     * 
     * @param String $slug the content slug
     * @return false|\Illuminate\Contracts\View\View
     */
    public function showContent(String $slug){
        $content = $this->getContentBySlug($slug);

        if(!isset($content)){
            return false;
        }
        else{
            $content->text = $this->markdownToHtml($content->text);
        }

        return view('content.content', [
            'content' => $content,
        ]);
    }

    /**
     * Function to get all md files stored in app folder and store them in database
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveFilesContentToDatabase(){
        $filesList = Storage::disk('public')->files('content');
        $aboutMeList = Storage::disk('public')->files('about-me');

        try{
            // getting posts
            foreach($filesList as $key => $mdFile){
                $mdFile = str_replace('content/', '', $mdFile);
                $markdownFiles[$mdFile] = Storage::disk('local')->get("public/content/$mdFile");
            }

            // getting about me
            foreach($aboutMeList as $key => $mdFile){
                $mdFile = str_replace('about-me/', '', $mdFile);
                $markdownFiles[$mdFile] = Storage::disk('local')->get("public/about-me/$mdFile");
            }
            
            // storing in database
            foreach($markdownFiles as $title => $text){
                $title = str_replace('.md', '', $title);
                
                $this->storeByArray([
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

    /**
     * Display the creating view.
     */
    public function create(): View {
        return view('content.create');
    }

    /**
     * Handle an incoming creating request.
     */
    public function store(Request $request): RedirectResponse {
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
    public function storeByArray(array $content): RedirectResponse {
        $content = Content::create([
            'title' => $content['title'],
            'text'  => $content['text'],
        ]);

        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Display the content's form.
     */
    public function edit(string $slug): View {
        $content = $this->getContentBySlug($slug);
        return view('content.edit', [
            'content' => $content,
        ]);
    }

    /**
     * Update the content's information.
     */
    public function update(Request $request): RedirectResponse {
        $content = $this->getContentById($request->id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text'  => 'required|string',
        ]);

        $content->update($validated);

        return Redirect::route('dashboard')->with('status', 'content-updated');
    }

    /**
     * Delete the content.
     */
    public function destroy(Request $request): RedirectResponse {
        $content = $this->getContentById($request->id);
        $content->delete();

        return Redirect::route('dashboard')->with('status', 'content-destroyed');
    }

        /**
     * Parse a Markdown text to HTML
     * @param  String $markdownText the Markdown text to be parsed to HTML
     * @return String 
     */
    public function markdownToHtmlAjax(Request $request): String {
        return $this->markdownToHtml($request->markdownText);
    }

    /**
     * Get all contents
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getContents(){
        return Content::all();
    }

    /**
     * Get a content by it's slug
     * @param String $slug
     * @return Content
     */
    private function getContentBySlug(String $slug){
        $title = str_replace('%20', ' ', $slug);
        return $this->getContentByTitle($title);
    }

    /**
     * Get a content by it's title
     * @param String $title
     * @return Content
     */
    private function getContentByTitle(String $title){
        try{
            $content = Content::where('title', $title)->take(1)->get()[0];
        }
        catch(Exception $e){
            $content = new Content();
            $content->title = 'Erro';
            $content->text = '
# Erro
Erro ao buscar conteúdo, tente novamente.
            ';
        }
        return $content;
    }

    /**
     * Get a content by id
     * @param int $id
     * @return Content
     */
    private function getContentById(int $id){
        $content = Content::where('id', $id)->take(1)->get()[0];
        return $content;
    }

    /**
     * Parse a Markdown text to HTML
     * @param  String $markdownText the Markdown text to be parsed to HTML
     * @return String 
     */
    private function markdownToHtml(String $markdownText): String {
        $parsedown = new Parsedown();
        $htmlText  = $parsedown->text($markdownText);
        return $htmlText;
    }
}
