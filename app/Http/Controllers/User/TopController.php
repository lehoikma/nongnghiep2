<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoriesNews;
use App\Models\Hotel;
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
        $slide = Products::limit(5)
                ->orderBy('updated_at','desc')
                ->where('favorite', 1)->get();
        $categoryNews = CategoriesNews::all();
        $hotel = Hotel::first();
        return view('user.top.index', [
            'product' => $product,
            'slide' => $slide,
            'hotel' => $hotel,
            'categoryNews' => $categoryNews
        ]);
    }
}
