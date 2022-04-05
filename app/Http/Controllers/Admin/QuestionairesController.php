<?php

namespace App\Http\Controllers\Admin;

use App\Models\Questionaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionaires = Questionaire::orderBy('created_at', 'desc')->paginate(10);
        return view('questionaires.index', compact('questionaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionaire $questionaire)
    {
        return view('questionaires.show', ['event' => $questionaire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionaire $questionaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionaire $questionaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionaire $questionaire)
    {
        //
    }
}
