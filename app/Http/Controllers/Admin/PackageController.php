<?php

namespace App\Http\Controllers\Admin;

use App\Models\Day;
use App\Models\Yacht;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvailableDay;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $days = Day::all();
        $yachts = Yacht::all();

        if (count($yachts) < 1) {
            return view('packages.create')->with('message', 'No Yacht Please Add a Yacht and return to this page');
        }

        return view('packages.create', compact('yachts', 'days'));
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
            "yacht" => "required|integer",
            "description" => "required|string"
        ]);

        $available_days = request('available_days');
        $yacht = Yacht::find(request('yacht'));
        if ($yacht) {
            $package = new Package(request()->except("yacht"));
            $available_day = [];
            $package = $yacht->packages()->save($package);
            $now = Carbon::now()->toDateTimeString();
            foreach ($available_days as $day) {
                array_push($available_day, ["day_id" => $day, "created_at" => $now, "updated_at" => $now, "package_id" => $package->id]);
            }
            AvailableDay::insert($available_day);
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
        $days = Day::all();
        $yachts = Yacht::all();
        return view('packages.edit', compact('package', 'yachts', 'days'));
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
            "available_days" => "required|array",
            "yacht" => "required|integer",
            "description" => "required|string"
        ]);

        $available_days = request('available_days');
        $available_day = [];

        DB::table('available_days')->where('package_id', $package->id)->delete();


        $now = Carbon::now()->toDateTimeString();
        foreach ($available_days as $day) {
            array_push($available_day, ["day_id" => $day, "created_at" => $now, "updated_at" => $now, "package_id" => $package->id]);
        }
        AvailableDay::insert($available_day);

        $package->update(request()->except('available_days'));
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
