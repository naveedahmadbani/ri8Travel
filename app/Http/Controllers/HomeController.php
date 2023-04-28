<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    public function abouUs()
    {
        return view('pages.about_us');
    }
    public function services()
    {
        return view('pages.services');
    }
    public function packages()
    {
        return view('pages.packages');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
