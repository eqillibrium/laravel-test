<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Parser;
use App\Jobs\NewsJob;
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
    #[NoReturn] public function __invoke(Request $request, Parser $service)
    {
        $urls = [
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/music.rss',
        ];

        foreach ($urls as $url) {
            dispatch(new NewsJob($url));
        }

        return back()->with('success', 'Новости добавлены');
    }
}
