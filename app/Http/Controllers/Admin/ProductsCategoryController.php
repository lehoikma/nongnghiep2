<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoriesNews;
use App\Models\CategoriesProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory()
    {
        $categoriesNews = CategoriesProducts::all();
        return view('admin.products_category.create_category', [
            'categoriesNews' => $categoriesNews
        ]);
    }

    public function saveCategory(Request $request)
    {
        if (!empty($request['name_category_news'])) {
            CategoriesProducts::create([
                'name' => $request['name_category_news']
            ]);
            \Session::flash('alert-success', 'Tạo Danh Mục Sản Phẩm Thành Công');

        }
        return redirect()->route('form_products_category');
    }

    public function editCategory($id)
    {
        $category = CategoriesProducts::find($id);
        $categoriesNews = CategoriesProducts::all();
        if (empty($category)) {
            return redirect()->route('form_products_category');
        }
        return view('admin.products_category.edit_category', [
            'categoriesNews' => $categoriesNews,
            'category' => $category
        ]);
    }

    public function saveEditCategory(Request $request)
    {
        if (!empty($request['name_category_news'])) {
            $update = CategoriesProducts::where('id',  $request['id_category_news'])
                ->update([
                    'name' => $request['name_category_news']
                ]);
            if ($update) {
                \Session::flash('alert-success', 'Sửa Danh Mục Sản Phẩm Thành Công');
            } else {
                \Session::flash('alert-success', 'Sửa Danh Mục Sản Phẩm Lỗi');
            }
        }
        return redirect()->route('form_products_category');
    }

    public function deleteCategory($id)
    {
        $category = CategoriesProducts::find($id);
        $delete = $category->delete();
        if ($delete) {
            \Session::flash('alert-success', 'Xoá Danh Mục Sản Phẩm Thành Công');
        } else {
            \Session::flash('alert-warning', 'Xoá Danh Mục Sản Phẩm Lỗi');
        }
        return redirect()->route('form_products_category');
    }
}
