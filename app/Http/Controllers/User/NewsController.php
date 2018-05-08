<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoriesNews;
use App\Models\Documents;
use App\Models\Introduces;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsCtgs = CategoriesNews::all();
        return view('user.news.index',[
            'newsCtgs' => $newsCtgs
        ]);
    }

    public function listNewsCategory($slg, $id)
    {
        $news = News::where('category_news_id', $id)->get();
        return view('user.news.list_news_category', [
            'news' => $news
        ]);
    }
}
