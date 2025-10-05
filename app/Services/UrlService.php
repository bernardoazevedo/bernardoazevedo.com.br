<?php

namespace App\Services;

use App\Models\Url;

class UrlService {

    public static function getAll() {
        return Url::all();
    }

    public static function getUrlByName(String $name) {
        return Url::where('name', $name)->take(1)->get()[0];
    }

    public static function getUrlById(int $id) {
        return Url::where('id', $id)->take(1)->get()[0];
    }

    public static function formatUrl(String $url): String {
        if(!str_starts_with($url, "https://") || !str_starts_with($url, "http://")) {
            $url = "https://$url";
        }
        return $url;
    }
}
