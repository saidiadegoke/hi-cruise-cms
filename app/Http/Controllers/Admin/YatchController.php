<?php

namespace App\Http\Controllers\Admin;

use App\Models\Yatch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        ]);

        $yatch = Yatch::create(request()->all());

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

    public function all(Yatch $yatch)
    {
        return $yatch->packages;
    }
}
