<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoriesProducts;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prdCtgs = CategoriesProducts::all();
        return view('user.products.index',[
            'prdCtgs' => $prdCtgs
        ]);
    }

    public function listProductsCategory($slg, $id)
    {
        $products = Products::where('category_product_id', $id)->paginate(15);
        $cateName = CategoriesProducts::find($id);
        return view('user.products.list_products_category', [
            'products' => $products,
            'cateName' => $cateName
        ]);
    }

    public function detailProducts($id)
    {
        $products = Products::find($id);
        return view('user.products.detail_product', [
            'products' => $products
        ]);
    }
}
