<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Url;
use App\Services\UrlService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UrlController extends Controller {

    public function list(): View {
        return view('url.list', [
            'urls' => UrlService::getAll(),
        ]);
    }

    public function create(): View {
        return view('url.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:urls,name'],
            'url'  => ['required', 'string'],
        ]);

        $url = Url::create([
            'name' => $request->name,
            'url'  => $request->url,
        ]);

        return redirect(route('url.list', absolute: false));
    }

    public function edit(string $slug): View {
        $url = UrlService::getUrlByName($slug);
        return view('url.edit', [
            
            'url' => $url,
        ]);
    }

    public function update(Request $request): RedirectResponse {
        $url       = UrlService::getUrlById($request->id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url'  => ['required', 'string'],
        ]);

        $url->update($validated);

        return Redirect::route('url.list')->with('status', 'url-updated');
    }

    public function redirect(Request $request): RedirectResponse {
        $url = UrlService::getUrlByName($request->slug);
        return redirect($url['url']);
    }

    public function destroy(Request $request): RedirectResponse {
        $url = UrlService::getUrlById($request->id);
        $url->delete();
        return Redirect::route('dashboard')->with('status', 'url-destroyed');
    }
}
