<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('category')
              ->paginate(config('news.paginate'));
        return view('admin.news.index', [
           'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $sources    = Source::all();
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories,
            'sources'    => $sources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        $news = News::create($request->validated());

        if($news) {
            return redirect()
                    ->route('admin.news.index')
                    ->with('success', trans('messages.admin.news.create.success'));
        }

        return back()
                ->with('error', trans('messages.admin.news.create.fail'))
                ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) : string
    {
        return "Новость с id = {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $sources    = Source::all();
        $categories = Category::all();

        return view('admin.news.edit', [
            'categories' => $categories,
            'sources'    => $sources,
            'news'       => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $news = $news->fill($request->validated())->save();

        if($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', trans('messages.admin.news.update.success'));
        }

        return back()
            ->with('error', trans('messages.admin.news.update.fail'))
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        redirect()
            ->route('admin.news.index')
            ->with('success', 'Запись успешно удалена');
        return response()->json([
            'status' => 'success'
        ]);
    }
}
