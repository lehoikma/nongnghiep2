<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoriesNews;
use App\Models\CategoriesProducts;
use App\Models\Documents;
use App\Models\Introduces;

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
}
