<?php

namespace App\Http\Controllers\Admin;

use App\Models\Yacht;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaFile;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\Storage;

class YachtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $yachts = Yacht::paginate(10);
        return view('yachts.index', compact('yachts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('yachts.create');
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
        ]);

        $yacht = Yacht::create(request()->all());



        // $this->uploadImages($request, $yacht);
        return redirect()->route('yachts.show', ['yacht' => $yacht->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */
    public function show(Yacht $yacht)
    {
        //

        return view('yachts.show', compact('yacht'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */
    public function edit(Yacht $yacht)
    {
        //
        return view('yachts.edit', compact('yacht'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Yacht $yacht)
    {
        //
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        $yacht->update(request()->all());

        $images = $yacht->images;
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
        $yacht->images()->delete($deletedFiles);
        //Store the new File


        $this->uploadImages($request, $yacht);




        // dd($update);
        Storage::delete($deletedFiles);

        return redirect()->route('yachts.show', ['yacht' => $yacht->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yacht $yacht)
    {
        //
        $yacht->delete();
        return redirect()->route('yachts.index');
    }

    public static function all()
    {
        return Yacht::all();
    }

    public function packages(Yacht $yacht)
    {
        return $yacht->packages;
    }

    public function detail(Yacht $yacht)
    {
        return view('cruise.package', compact('yacht'));
    }

    public function uploadImages($request, $yacht)
    {
        $bannerPath = $request->banner->store('/yacht/banner', 'public');

        if ($bannerPath) {
            $bannerUpload = new UploadedFile();
            $bannerUpload->filename = $bannerPath;
            $bannerUpload->extension = $request->banner->getClientOriginalExtension();
            $bannerUpload->mime = $request->banner->getClientOriginalExtension();
            $bannerUpload->type = "banner";
            $bannerUpload->save();
            if ($bannerUpload) {
                MediaFile::create(["type" => "banner", "yacht_id" => $yacht->id, "source" => $bannerUpload->id]);
            }
        }


        foreach ($request->file('slides') as $file) {
            $slidesPath = $file->store('/yacht/slides', 'public');
            $slidesUpload = new UploadedFile();
            $slidesUpload->filename = $slidesPath;
            $slidesUpload->extension = $request->banner->getClientOriginalExtension();
            $slidesUpload->mime = $request->banner->getClientOriginalExtension();
            $slidesUpload->type = "slides";
            $slidesUpload->save();

            if ($slidesUpload) {
                MediaFile::create(["type" => "slide", "yacht_id" => $yacht->id, "source" => $slidesUpload->id]);
            }
        }
    }
}
