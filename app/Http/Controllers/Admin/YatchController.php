<?php

namespace App\Http\Controllers\Admin;

use App\Models\Yatch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaFile;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\Storage;

class YatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $yatches = Yatch::paginate(10);
        return view('yatchs.index', compact('yatches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('yatchs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'banner' => 'required|file',
            'slides' => 'required',
            'slides.*' => 'mimes:png,jpg,jpeg,gif',
            'banner.*' => 'mimes:png,jpg,jpeg,gif'
        ]);

        $yatch = Yatch::create(request()->all());



        $this->uploadImages($request, $yatch);
        return redirect()->route('yatchs.show', ['yatch' => $yatch->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Yatch  $yatch
     * @return \Illuminate\Http\Response
     */
    public function show(Yatch $yatch)
    {
        //

        return view('yatchs.show', compact('yatch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yatch  $yatch
     * @return \Illuminate\Http\Response
     */
    public function edit(Yatch $yatch)
    {
        //
        return view('yatchs.edit', compact('yatch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Yatch  $yatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Yatch $yatch)
    {
        //
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        $yatch->update(request()->all());

        $images = $yatch->images;
        $deletedFiles = [];
        $deleteLinks = [];
        if ($request->hasFile('slides')) {
            foreach ($images as $image) {
                if ($image->type === 'slides') {
                    array_push($deletedFiles, $image);
                    array_push($deleteLinks, $image->filename);
                }
            }
        }
        if ($request->hasFile('banner')) {
            foreach ($images as $image) {
                if ($image->type === 'banner') {
                    array_push($deletedFiles, $image);
                    array_push($deleteLinks, $image->filename);
                }
            }
        }


        // Delete Images from db;
        $yatch->images()->delete($deletedFiles);
        //Store the new File


        $this->uploadImages($request, $yatch);




        // dd($update);
        Storage::delete($deletedFiles);

        return redirect()->route('yatchs.show', ['yatch' => $yatch->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Yatch  $yatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yatch $yatch)
    {
        //
        $yatch->delete();
        return redirect()->route('yatchs.index');
    }

    public static function all()
    {
        return Yatch::all();
    }

    public function packages(Yatch $yatch)
    {
        return $yatch->packages;
    }

    public function detail(Yatch $yatch)
    {
        return view('cruise.package', compact('yatch'));
    }

    public function uploadImages($request, $yatch)
    {
        $bannerPath = $request->banner->store('/yatch/banner', 'public');

        if ($bannerPath) {
            $bannerUpload = new UploadedFile();
            $bannerUpload->filename = $bannerPath;
            $bannerUpload->extension = $request->banner->getClientOriginalExtension();
            $bannerUpload->mime = $request->banner->getClientOriginalExtension();
            $bannerUpload->type = "banner";
            $bannerUpload->save();
            if ($bannerUpload) {
                MediaFile::create(["type" => "banner", "yatch_id" => $yatch->id, "source" => $bannerUpload->id]);
            }
        }


        foreach ($request->file('slides') as $file) {
            $slidesPath = $file->store('/yatch/slides', 'public');
            $slidesUpload = new UploadedFile();
            $slidesUpload->filename = $slidesPath;
            $slidesUpload->extension = $request->banner->getClientOriginalExtension();
            $slidesUpload->mime = $request->banner->getClientOriginalExtension();
            $slidesUpload->type = "slides";
            $slidesUpload->save();

            if ($slidesUpload) {
                MediaFile::create(["type" => "slide", "yatch_id" => $yatch->id, "source" => $slidesUpload->id]);
            }
        }
    }
}
