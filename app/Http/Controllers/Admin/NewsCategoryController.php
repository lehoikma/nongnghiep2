<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoriesNews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory()
    {
        $categoriesNews = CategoriesNews::all();
        return view('admin.news_category.create_category', [
            'categoriesNews' => $categoriesNews
        ]);
    }

    public function saveCategory(Request $request)
    {
        if (!empty($request['name_category_news'])) {
            CategoriesNews::create([
                'name' => $request['name_category_news']
            ]);
            \Session::flash('alert-success', 'Tạo Danh Mục Tin Tức Thành Công');

        }
        return redirect()->route('form_news_category');
    }

    public function editCategory($id)
    {
        $category = CategoriesNews::find($id);
        $categoriesNews = CategoriesNews::all();
        if (empty($category)) {
            return redirect()->route('form_news_category');
        }
        return view('admin.news_category.edit_category', [
            'categoriesNews' => $categoriesNews,
            'category' => $category
        ]);
    }

    public function saveEditCategory(Request $request)
    {
        if (!empty($request['name_category_news'])) {
            $update = CategoriesNews::where('id',  $request['id_category_news'])
                ->update([
                    'name' => $request['name_category_news']
                ]);
            if ($update) {
                \Session::flash('alert-success', 'Sửa Danh Mục Tin Tức Thành Công');
            } else {
                \Session::flash('alert-success', 'Sửa Danh Mục Tin Tức Lỗi');
            }
        }
        return redirect()->route('form_news_category');
    }

    public function deleteCategory($id)
    {
        $category = CategoriesNews::find($id);
        $delete = $category->delete();
        if ($delete) {
            \Session::flash('alert-success', 'Xoá Danh Mục Tin Tức Thành Công');
        } else {
            \Session::flash('alert-warning', 'Xoá Danh Mục Tin Tức Lỗi');
        }
        return redirect()->route('form_news_category');
    }
}
