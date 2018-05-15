<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SaveHotelRequest;
use App\Models\Hotel;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    public function registerHotel()
    {
        $hotel = Hotel::first();
        return view('admin.hotel.register_hotel', [
            'hotel' => $hotel
        ]);
    }

    public function saveHotel(SaveHotelRequest $request)
    {
        if (!empty($request['id'])) {
            if (!empty($request->file('fileToUpload'))) {
                $image = $request->file('fileToUpload');
                $filename = time() . '.' . $image->extension();
                $image->move('upload/', $filename);
            } else{
                $hotel = Hotel::where('id', $request['id'])->first();
                $filename = $hotel['image'];
            }
            $hotelEdit = Hotel::where('id', $request['id'])
                ->update([
                    'content' => $request['content_hotel'],
                    'description' => $request['description'],
                    'image' => $filename,
                    'name' => $request['title_hotel']
                ]);
            if ($hotelEdit) {
                \Session::flash('alert-success', 'Sửa Khách Sạn Thành Công');
            } else {
                \Session::flash('alert-warning', 'Sửa Khách Sạn Lỗi');
            }
        } else {
            $image = $request->file('fileToUpload');
            $filename = time() . '.' . $image->extension();
            $image->move('upload/', $filename);

            $newsCompany = Hotel::create([
                'content' => $request['content_hotel'],
                'description' => $request['description'],
                'image' => $filename,
                'name' => $request['title_hotel']
            ]);
            if ($newsCompany) {
                \Session::flash('alert-success', 'Tạo Khách Sạn Thành Công');
            } else {
                \Session::flash('alert-warning', 'Tạo Khách Sạn Lỗi');
            }
        }

        return redirect()->route('register_hotel');
    }
}
