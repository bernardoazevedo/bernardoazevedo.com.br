<?php

namespace App\Services;

use Illuminate\Http\Request;
use ParsedownTasks;

class ParserService {
    /**
     * Parse a Markdown text to HTML
     * @param  string $markdownText the Markdown text to be parsed to HTML
     * @return string
     */
    public function markdownToHtmlAjax(Request $request): string {
        return $this->markdownToHtml($request->markdownText);
    }

    /**
     * Parse a Markdown text to HTML
     * @param  string $markdownText the Markdown text to be parsed to HTML
     * @return string
     */
    public function markdownToHtml(string $markdownText): string {
        $parsedown = new ParsedownTasks();
        $htmlText  = $parsedown->text($markdownText);
        return $htmlText;
    }
}
