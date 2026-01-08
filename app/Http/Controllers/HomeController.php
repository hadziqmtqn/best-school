<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $title = 'Beranda';

        return \view('home.index', compact('title'));
    }
}
