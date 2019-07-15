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
}
