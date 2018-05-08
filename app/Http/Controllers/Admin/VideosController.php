<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SaveVideosRequest;
use App\Models\Videos;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerVideos()
    {
        return view('admin.video.register_videos');
    }

    public function saveVideos(SaveVideosRequest $request)
    {
        Videos::create([
            'name' => $request['name_videos'],
            'videos' => $request['content_videos']
        ]);
        return redirect()->route('list_videos');
    }

    public function listVideos()
    {
        $videos = Videos::all();
        return view('admin.video.list_videos', [
            'videos' => $videos
        ]);
    }

    public function deleteVideos($id)
    {
        $videos = Videos::find($id);
        $delete = $videos->delete();
        if ($delete) {
            \Session::flash('alert-success', 'Xoá Video Thành Công');
        } else {
            \Session::flash('alert-warning', 'Xoá Video Lỗi');
        }
        return redirect()->route('list_videos');
    }
}
