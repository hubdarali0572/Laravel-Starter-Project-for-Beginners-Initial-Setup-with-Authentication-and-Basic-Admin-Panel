<?php

namespace App\Http\Controllers;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home');
    }

    public function about()
    {
        return view('Frontend.pages.about');
    }

    public function contact()
    {
        return view('Frontend.pages.contact');
    }
}
