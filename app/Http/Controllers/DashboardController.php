<?php

namespace App\Http\Controllers;

class DashboardController extends Controller {
    public function index(){
        $contentController = new ContentController();

        return view('dashboard', [
            'contents' => $contentController->getContents()
        ]);
    }
}
