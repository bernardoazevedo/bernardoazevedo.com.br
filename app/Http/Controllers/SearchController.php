<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller {
    public function searchContentsAjax(Request $request): array {
        $searchService = new SearchService();
        return $searchService->searchContents($request->searchTerm);
    }
}
