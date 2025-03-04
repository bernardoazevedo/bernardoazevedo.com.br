<?php

namespace App\Services;

use App\Models\Content;
use Exception;
use Illuminate\Http\Request;

class SearchService {

    /**
     * @param  Request $request
     * @return array
     */
    public function searchContents(string $searchTerm): array {
        try{
            $contentsArray = Content::query()
                ->where('title',  'LIKE', "%{$searchTerm}%")
                ->orWhere('text', 'LIKE', "%{$searchTerm}%")
                ->get()
                ->toArray();
        }
        catch(Exception $e){
            return [
                'error' => 'Error searching for content... Please try again in a few moments'
            ];
        }

        return $contentsArray;
    }
}
