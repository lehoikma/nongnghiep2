<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveDocumentsRequest;
use App\Http\Requests\SaveIntroducesRequest;
use App\Models\Documents;
use App\Models\Introduces;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formDocuments()
    {
        return view('admin.documents.form_documents');
    }

    public function saveDocuments(SaveDocumentsRequest $request)
    {
        $file = $request->file('fileToUpload');
        $filename = time() . '.' . $file->extension();
        $file->move('upload_documents', $filename);

        $newsCompany = Documents::create([
            'name' => $request['title'],
            'no_key' => $request['no_key'],
            'date' => $request['date'],
            'attach' => $filename
        ]);
        if ($newsCompany) {
            \Session::flash('alert-success', 'Tạo Văn Bản Thành Công');
        } else {
            \Session::flash('alert-warning', 'Tạo Văn Bản Lỗi');
        }
        return redirect()->route('list_documents');
    }

    public function listDocuments()
    {
        $documents = Documents::all();
        return view('admin.documents.list_documents',[
            'documents' => $documents
        ]);
    }

    public function deleteDocuments($id)
    {
        $product = Documents::find($id);
        $delete = $product->delete();
        if ($delete) {
            \Session::flash('alert-success', 'Xoá Văn Bản Thành Công');
        } else {
            \Session::flash('alert-warning', 'Xoá Văn Bản Lỗi');
        }
        return redirect()->route('list_documents');
    }
}
