<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\FileUpload;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('updated_at', 'desc')->paginate(10);

        return view('categories.index', compact('categories'));
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
        return view('categories.create');

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
        //$image = $request->file('news');
        //$imageName = $image->getClientOriginalName();
        //$moved = $image->move(public_path('news'),$imageName);
        $path = $request->category->store('/categories', 'public');
        if($path) {
            $imageUpload = new FileUpload();
            $imageUpload->filename = $path;
            $imageUpload->extension = $request->category->getClientOriginalExtension();
            $imageUpload->mime = $request->category->getClientOriginalExtension();
            $imageUpload->save();

            if($imageUpload) { 
        $data = $request->all();
        $data['cover_type'] = 'image';
        $data['slug'] = str_slug($request->name);
        //$data['published_at'] = date('Y-m-d');
        $data['cover'] = $imageUpload->id;
        $category = Category::create($data);
        if($category) {
            return redirect()->route('categories.show', ['category' => $category->id]);
        }
           }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ])->validate();
        
        if($request->hasFile('category')) {
            if($category->file) {
                Storage::delete($category->file->filename);
            }
            
            $path = $request->category->store('/categories', 'public');
            if($path) {
                $imageUpload = $category->file? $category->file: new FileUpload();
                $imageUpload->filename = $path;
                $imageUpload->extension = $request->category->getClientOriginalExtension();
                $imageUpload->mime = $request->category->getClientOriginalExtension();
                $imageUpload->save();
            }
        }
        
        $data = $request->all();
        $data['cover_type'] = 'image';
        $data['cover'] = ($request->hasFile('category') && $path)? $imageUpload->id: $category->cover;
        $category->update($data);
        if($category) {
            return redirect()->route('categories.show', ['category' => $category->id]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin');
    }
}
