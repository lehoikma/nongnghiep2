<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use App\Models\Videos;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Videos::orderBy('updated_at', 'desc')->paginate(20);
        return view('user.videos.index', [
            'videos' => $videos
        ]);
    }

    public function contact()
    {
        return view('user.videos.contact');
    }
}
