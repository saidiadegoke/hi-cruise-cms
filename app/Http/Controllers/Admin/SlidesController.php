<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slides = Slide::paginate(10);

        return view('slides.index', compact('slides'));
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
        return view('slides.create');
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
            'slide' => ['required', 'file'],
            'title' => 'required',
            'published' => 'required',
        ])->validate();

        $path = $request->slide->store('/slides', 'public');
        if ($path) {
            $imageUpload = new UploadedFile();
            $imageUpload->filename = $path;
            $imageUpload->extension = $request->slide->getClientOriginalExtension();
            $imageUpload->mime = $request->slide->getClientOriginalExtension();
            $imageUpload->save();

            if ($imageUpload) {

                $data = $request->all();
                $data['source'] = $imageUpload->id;
                $slide = Slide::create($data);
                if ($slide) {
                    return redirect()->route('slides.show', ['slide' => $slide->id]);
                }
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
        return view('slides.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
        return view('slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'published' => 'required',
        ])->validate();

        if ($request->hasFile('slide')) {
            Storage::delete($slide->file->filename);
            $path = $request->slide->store('/slides', 'public');
            if ($path) {
                $imageUpload = $slide->file;
                $imageUpload->filename = $path;
                $imageUpload->extension = $request->slide->getClientOriginalExtension();
                $imageUpload->mime = $request->slide->getClientOriginalExtension();
                $imageUpload->save();
            }
        }

        $data = $request->all();
        $data['source'] = ($request->hasFile('slide') && $path) ? $imageUpload->id : $slide->cover;
        $slide->update($data);
        if ($slide) {
            return redirect()->route('slides.show', ['slide' => $slide->id]);
        }


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return redirect()->route('slides.index');
    }
}
