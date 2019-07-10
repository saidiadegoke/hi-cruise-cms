<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Programme;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slides = Slide::where(['published' => 1])->orderBy('updated_at', 'desc')->paginate(5);

        return view('admin.index', compact('slides'));
    }
}
