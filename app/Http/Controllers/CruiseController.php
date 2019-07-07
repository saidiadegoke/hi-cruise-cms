<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CruiseController extends Controller
{
    //
    public function about()
    {
        return view("cruise.about");
    }

    public function contact()
    {
        return view("cruise.contact");
    }

    public function eugene()
    {
        return view("cruise.eugene");
    }

    public function eugene1()
    {
        return view("cruise.eugene1");
    }

    public function gallery()
    {
        return view("cruise.gallery");
    }

    public function packages()
    {
        return view("cruise.packages");
    }
}
