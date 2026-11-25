<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Realisation;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'latestArticles' => Article::published()->latest('published_at')->take(3)->get(),
            'latestRealisations' => Realisation::published()->latest('completed_at')->take(6)->get(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function services(): View
    {
        return view('pages.services');
    }

    public function team(): View
    {
        return view('pages.team');
    }
}
