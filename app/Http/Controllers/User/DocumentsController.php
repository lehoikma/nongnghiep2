<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Documents;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Documents::paginate(20);
        return view('user.documents.index', [
            'document' => $document
        ]);
    }
}
