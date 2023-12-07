<?php

namespace App\Http\Controllers;
use App\Models\Upload;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($id)
    {
        $upload = Upload::findOrFail($id);
        return view('images.show', compact('upload'));
    }
    
}
