<?php

namespace App\Http\Controllers;

use App\Enums\ArticleCategory;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $selectedCategory = ArticleCategory::tryFrom((string) $request->query('category'));

        $articles = Article::published()
            ->when($selectedCategory, fn ($query) => $query->where('category', $selectedCategory))
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        return view('blog.index', [
            'articles' => $articles,
            'categories' => ArticleCategory::cases(),
            'selectedCategory' => $selectedCategory,
            'categoryCounts' => Article::published()->selectRaw('category, count(*) as total')->groupBy('category')->pluck('total', 'category'),
            'recentArticles' => Article::published()->latest('published_at')->take(5)->get(),
        ]);
    }

    public function show(Article $article): View
    {
        abort_if($article->published_at === null || $article->published_at->isFuture(), 404);

        return view('blog.show', [
            'article' => $article,
            'recentArticles' => Article::published()->latest('published_at')->take(5)->get(),
            'relatedArticles' => Article::published()
                ->where('category', $article->category)
                ->whereKeyNot($article->getKey())
                ->latest('published_at')
                ->take(3)
                ->get(),
        ]);
    }
}
