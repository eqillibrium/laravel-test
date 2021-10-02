<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Parser;
use App\Models\News;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use App\Http\Controllers\Controller;
use App\Models\News as Model;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Parser $service
     * @return void
     */
    #[NoReturn] public function __invoke(Request $request, Parser $service) : void
    {
        $array = $service->parse('https://news.yandex.ru/music.rss');
        $news = [];
        foreach ($array['news'] as $el) {
            $news[] = [
                'category_id' => 5,
                'source_id'   => 1,
                'title'       => $el['title'],
                'image'       => null,
                'author'      => 'admin',
                'description' => $el['description'],
            ];
            dump($el);
        }
        $newsList = (new \App\Models\News)->fill($news)->save();
        dump($newsList);
    }
}
