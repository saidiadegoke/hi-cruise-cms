<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = PageCategory::paginate(10);
        return view('page-categories.index', compact('pages'));
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
        Validator::make($request->all(), [
            'field' => 'required',
            'label' => 'required',
            'value' => 'required',
            'page_category_id' => 'required',
        ])->validate();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PageCategory $pageCategory)
    {
        


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PageCategory $pageCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageCategory $pageCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageCategory $pageCategory)
    {
        //
    }

    public function pages($category_id) {
        $categoryInfo = '';
        $pages = Page::where(['page_category_id' => $category_id])->paginate(10);

        $category = PageCategory::find($category_id);
        $categoryInfo = $category? 'on ' . $category->label: '';

        return view('pages.index', compact('pages', 'categoryInfo'));
    }
}
