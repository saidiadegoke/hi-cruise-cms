<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediaFilePurpose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\FileUpload;
use Illuminate\Support\Facades\Storage;

class MediaFilePurposesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mediaFilePurposes = MediaFilePurpose::orderBy('updated_at', 'desc')->paginate(10);

        return view('media-file-purposes.index', compact('mediaFilePurposes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
        * Call the form view
        */
        return view('media-file-purposes.create');

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
            'name' => 'required',
            'published' => 'required',
        ])->validate();
        
        $mediaFilePurpose = MediaFilePurpose::create($request->all());
        if($mediaFilePurpose) {
            return redirect()->route('media-file-purposes.show', ['mediaFilePurpose' => $mediaFilePurpose->id]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaFilePurpose  $MediaFilePurpose
     * @return \Illuminate\Http\Response
     */
    public function show(MediaFilePurpose $mediaFilePurpose)
    {
        //
        return view('media-file-purposes.show', compact('mediaFilePurpose'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaFilePurpose  $MediaFilePurpose
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaFilePurpose $mediaFilePurpose)
    {
        return view('media-file-purposes.edit', compact('mediaFilePurpose'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaFilePurpose  $MediaFilePurpose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaFilePurpose $mediaFilePurpose)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'published' => 'required',
        ])->validate();
        
        $mediaFilePurpose->name = $request->name;
        $mediaFilePurpose->published = $request->published? 1: 0;
        $mediaFilePurpose->save();
        
        if($mediaFilePurpose) {
            return redirect()->route('media-file-purposes.show', ['mediaFilePurpose' => $mediaFilePurpose->id]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaFilePurpose  $MediaFilePurpose
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaFilePurpose $mediaFilePurpose)
    {
        $mediaFilePurpose->delete();
        return redirect()->route('media-file-purposes.index');
    }
}
