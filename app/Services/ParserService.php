<?php

namespace App\Services;

use Illuminate\Http\Request;
use ParsedownTasks;

class ParserService {
    /**
     * Parse a Markdown text to HTML
     * @param  String $markdownText the Markdown text to be parsed to HTML
     * @return String
     */
    public function markdownToHtmlAjax(Request $request): String {
        return $this->markdownToHtml($request->markdownText);
    }

    /**
     * Parse a Markdown text to HTML
     * @param  String $markdownText the Markdown text to be parsed to HTML
     * @return String
     */
    public function markdownToHtml(String $markdownText): String {
        $parsedown = new ParsedownTasks();
        $htmlText  = $parsedown->text($markdownText);
        return $htmlText;
    }
}
