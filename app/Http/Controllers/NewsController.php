<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index ()
    {
        return view('news.index', [
           'newsList' => $this->getNews()
        ]);
    }

    public function show (int $id)
    {
        return "Новость - {$id}";
    }

    public function showCategories ()
    {
        return view('news.categories', [
            'categoriesList' => $this->getCategories()
        ]);
    }

    public function showCategoryNews (string $category)
    {
        $newsList = $this->getNews();
        $result = array_filter($newsList, function($news) use ($category)
        {
            return $news['category'] === $category;
        });

        return view('news.showNewsFromCategory', [
            'newsList' => $result
        ]);
    }
}
