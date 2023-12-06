<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uploads = Upload::get();
        return view('uploads.index', ['uploads' => $uploads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload = new Upload;
        $upload->mimeType = $request->file('upload')->getMimeType();
        $upload->originalName = $request->file('upload')->getClientOriginalName();
        $upload->path = $request->file('upload')->store('uploads', 'public');
        $upload->description = $request->input('description'); 
        $upload->save();

        return redirect('/uploads'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        $upload = Upload::findOrFail($upload->id);
        return response()->file(storage_path() . '/app/' . $upload->path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        return view('uploads.edit', [
            'id' => $upload->id,
            'path' => $upload->path,
            'originalName' => $upload->originalName,
            'mimeType' => $upload->mimeType
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        $upload = Upload::findOrFail($upload->id);
        Storage::delete($upload->path);
        $upload->originalName = $request->file('upload')->getClientOriginalName();
        $upload->path = $request->file('upload')->store('uploads');
        $upload->mimeType = $request->file('upload')->getClientMimeType();
        $upload->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        $upload = Upload::findOrFail($upload->id);
        Storage::delete($upload->path);
        $upload->delete();

        return back()->with(['operation' => 'deleted', 'id' => $upload->id]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $uploads = Upload::where('description', 'LIKE', "%{$query}%")->get();
        return view('uploads.search', ['uploads' => $uploads]);
    }
}
