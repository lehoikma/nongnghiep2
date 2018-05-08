<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditNewsRequest;
use App\Http\Requests\SaveNewsRequest;
use App\Models\CategoriesNews;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNews()
    {
        $categories = CategoriesNews::all();
        return view('admin.news.form_news',[
            'categories' => $categories
        ]);
    }

    public function saveNews(SaveNewsRequest $request)
    {
        $image = $request->file('fileToUpload');
        $filename = time() . '.' . $image->extension();
        $image->move('upload/', $filename);

        $imageFavorite = $request->file('fileFavorite');

        if (!empty($imageFavorite)) {
            $filenameFavorite = time() . '.' . $imageFavorite->extension();
            $imageFavorite->move('upload/', $filenameFavorite);
        }

        $newsCompany = News::create([
            'content' => $request['content_news'],
            'category_news_id' => $request['select_cate_prd'],
            'image' => $filename,
            'status' => $request['status'],
            'image_favorite' => isset($filenameFavorite) ? $filenameFavorite : '',
            'title' => $request['title_news']
        ]);
        if ($newsCompany) {
            \Session::flash('alert-success', 'Tạo Tin Tức Thành Công');
        } else {
            \Session::flash('alert-warning', 'Tạo Tin Tức Lỗi');
        }
        return redirect()->route('list_news');
    }

    public function listNews()
    {
        $news = News::all();
        return view('admin.news.list_news',[
            'news' => $news
        ]);
    }

    public function showEditNews($id)
    {
        $news = News::find($id);

        if (isset($news) && !empty($news)) {
            $categories = CategoriesNews::all();
            return view('admin.news.edit_news', [
                'news' => $news,
                'categories' => $categories
            ]);
        }
        return redirect()->route('list_news');
    }

    public function editNews(EditNewsRequest $request)
    {
        if (!empty($request->file('fileToUpload'))) {
            $image = $request->file('fileToUpload');
            $filename = time() . '.' . $image->extension();
            $image->move('upload/', $filename);
        } else{
            $news = News::where('id', $request['news_id'])->first();
            $filename = $news['image'];
        }

        if (!empty($request->file('fileFavorite'))) {
            $imageFavorite = $request->file('fileFavorite');
            $filenameFavorite = time() . '.' . $imageFavorite->extension();
            $imageFavorite->move('upload/', $filenameFavorite);
        } else{
            $news = News::where('id', $request['news_id'])->first();
            $filenameFavorite = $news['image_favorite'];
        }

        $newsEdit = News::where('id', $request['news_id'])
            ->update([
                'content' => $request['content_news'],
                'category_news_id' => $request['select_cate_prd'],
                'image' => $filename,
                'status' => $request['status'],
                'image_favorite' => $filenameFavorite,
                'title' => $request['title_news']
            ]);
        if ($newsEdit) {
            \Session::flash('alert-success', 'Sửa Tin Tức Thành Công');
        } else {
            \Session::flash('alert-warning', 'Sửa Tin Tức Lỗi');
        }
        return redirect()->route('list_news');

    }

    public function deleteNews($id)
    {
        $news = News::find($id);
        $delete = $news->delete();
        if ($delete) {
            \Session::flash('alert-success', 'Xoá Tin Tức Thành Công');
        } else {
            \Session::flash('alert-warning', 'Xoá Tin Tức Lỗi');
        }
        return redirect()->route('list_news');
    }
}
