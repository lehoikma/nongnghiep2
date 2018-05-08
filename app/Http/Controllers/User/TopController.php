<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoriesNews;
use App\Models\Products;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::limit(6)->orderBy('updated_at','desc')->get();
        $categoryNews = CategoriesNews::all();
        return view('user.top.index', [
            'product' => $product,
            'categoryNews' => $categoryNews
        ]);
    }
}
