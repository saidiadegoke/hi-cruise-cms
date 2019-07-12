<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yatch;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packages = Package::Paginate(10);
        return view('packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $yatchs = Yatch::all();
        if (count($yatchs) < 1) {
            return view('packages.create')->with('message', 'No Yatch Please Add a Yatch and return to this page');
        }

        return view('packages.create', compact('yatchs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(), [
            "name" => "required",
            "price" => "required|integer",
            "available_days" => "required|array",
            "yatch" => "required|integer",
            "description" => "required|string"
        ]);

        $yatch = Yatch::find(request('yatch'));
        $available_days = request('available_days');
        $available_days = implode(" , ", $available_days);
        $request->request->set('available_days', $available_days);
        if ($yatch) {
            $package = new Package(request()->except("yatch"));
            $yatch->packages()->save($package);
            return redirect()->route("packages.index");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //

        return view('packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
        $yatchs = Yatch::all();
        return view('packages.edit', compact('package', 'yatchs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $this->validate(request(), [
            "name" => "required",
            "price" => "required|integer",
            "available_days" => "filled|string",
            "yatch" => "required|integer",
            "description" => "required|string"
        ]);

        $package->update(request()->all());
        return redirect()->route('packages.show', ['package' => $package->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
        $package->delete();
        return redirect()->route('packages.index');
    }

    public function single(Package $package)
    {
        return $package;
    }

    public function all()
    {
        return Package::all();
    }
}
