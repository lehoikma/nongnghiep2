<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditNewsRequest;
use App\Http\Requests\EditProductsRequest;
use App\Http\Requests\SaveNewsRequest;
use App\Http\Requests\SaveProductsRequest;
use App\Models\CategoriesNews;
use App\Models\CategoriesProducts;
use App\Models\News;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProducts()
    {
        $categories = CategoriesProducts::all();
        return view('admin.products.form_products',[
            'categories' => $categories
        ]);
    }

    public function saveProducts(SaveProductsRequest $request)
    {
        $image = $request->file('fileToUpload');
        $filename = time() . '.' . $image->extension();
        $image->move('upload/', $filename);

        $imageFavorite = $request->file('fileFavorite');

        if (!empty($imageFavorite)) {
            $filenameFavorite = time() . '.' . $imageFavorite->extension();
            $imageFavorite->move('upload/', $filenameFavorite);
        }

        $newsCompany = Products::create([
            'content' => $request['content_products'],
            'description' => $request['description'],
            'category_product_id' => $request['select_cate_prd'],
            'image' => $filename,
            'favorite' => $request['status'],
            'image_slide' => isset($filenameFavorite) ? $filenameFavorite : '',
            'title' => $request['title_products']
        ]);
        if ($newsCompany) {
            \Session::flash('alert-success', 'Tạo Sản Phẩm Thành Công');
        } else {
            \Session::flash('alert-warning', 'Tạo Sản Phẩm Lỗi');
        }
        return redirect()->route('list_products');
    }

    public function listProducts()
    {
        $products = Products::all();
        return view('admin.products.list_products',[
            'products' => $products
        ]);
    }

    public function showEditProducts($id)
    {
        $products = Products::find($id);

        if (isset($products) && !empty($products)) {
            $categories = CategoriesProducts::all();
            return view('admin.products.edit_products', [
                'products' => $products,
                'categories' => $categories
            ]);
        }
        return redirect()->route('list_products');
    }

    public function editProducts(EditProductsRequest $request)
    {
        if (!empty($request->file('fileToUpload'))) {
            $image = $request->file('fileToUpload');
            $filename = time() . '.' . $image->extension();
            $image->move('upload/', $filename);
        } else{
            $product = Products::where('id', $request['products_id'])->first();
            $filename = $product['image'];
        }

        if (!empty($request->file('fileFavorite'))) {
            $imageFavorite = $request->file('fileFavorite');
            $filenameFavorite = time() . '.' . $imageFavorite->extension();
            $imageFavorite->move('upload/', $filenameFavorite);
        } else{
            $product = Products::where('id', $request['products_id'])->first();
            $filenameFavorite = $product['image_slide'];
        }

        $newsEdit = Products::where('id', $request['products_id'])
            ->update([
                'description' => $request['description'],
                'content' => $request['content_products'],
                'category_product_id' => $request['select_cate_prd'],
                'image' => $filename,
                'favorite' => $request['status'],
                'image_slide' => isset($filenameFavorite) ? $filenameFavorite : '',
                'title' => $request['title_products']
            ]);
        if ($newsEdit) {
            \Session::flash('alert-success', 'Sửa Sản Phẩm Thành Công');
        } else {
            \Session::flash('alert-warning', 'Sửa Sản Phẩm Lỗi');
        }
        return redirect()->route('list_products');

    }

    public function deleteProducts($id)
    {
        $product = Products::find($id);
        $delete = $product->delete();
        if ($delete) {
            \Session::flash('alert-success', 'Xoá Sản Phẩm Thành Công');
        } else {
            \Session::flash('alert-warning', 'Xoá Sản Phẩm Lỗi');
        }
        return redirect()->route('list_products');
    }
}
