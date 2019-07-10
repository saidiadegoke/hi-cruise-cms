<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediaFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\FileUpload;

class MediaFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediaFiles = MediaFile::orderBy('updated_at', 'desc')->paginate(10);

        return view('media-files.index', compact('mediaFiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media-files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'file' => ['required', 'file'],
            'page' => 'required',
            'published' => 'required',
        ])->validate();
        
        $path = $request->file->store('/media-files', 'public');
        if($path) {
            $imageUpload = new FileUpload();
            $imageUpload->filename = $path;
            $imageUpload->extension = $request->file->getClientOriginalExtension();
            $imageUpload->mime = $request->file->getClientOriginalExtension();
            $imageUpload->save();

            if($imageUpload) {
                $data = $request->all();
                $data['type'] = 'image';
                $data['file'] = $imageUpload->id;
                $mediaFile = MediaFile::create($data);
                if($mediaFile) {
                    return redirect()->route('media-files.show', ['mediaFile' => $mediaFile->id]);
                }
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function show(MediaFile $mediaFile)
    {
        //dd($mediaFile->mfile);
        return view('media-files.show', compact('mediaFile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaFile $mediaFile)
    {
        return view('media-files.edit', compact('mediaFile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaFile $mediaFile)
    {
        Validator::make($request->all(), [
            //'file' => ['required', 'file'],
            'page' => 'required',
            'published' => 'required',
        ])->validate();
        
        if($request->hasFile('file')) {
            Storage::delete($mediaFile->file->filename);
            $path = $request->file->store('/media-files', 'public');
            if($path) {
                $imageUpload = $mediaFile->file;
                $imageUpload->filename = $path;
                $imageUpload->extension = $request->slide->getClientOriginalExtension();
                $imageUpload->mime = $request->slide->getClientOriginalExtension();
                $imageUpload->save();
            }
        }
        
        $data = $request->all();
        $data['type'] = 'image';
        $data['file'] = ($request->hasFile('file') && $path)? $imageUpload->id: $mediaFile->file;
        $mediaFile->update($data);
        if($mediaFile) {
            return redirect()->route('media-files.show', ['mediaFile' => $mediaFile->id]);
        }
        

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaFile $mediaFile)
    {
        $mediaFile->delete();
        return redirect()->route('media-files.index');
    }
}
