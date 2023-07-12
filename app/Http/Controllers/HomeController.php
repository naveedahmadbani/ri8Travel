<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visas;
use App\Models\Lead;


class HomeController extends Controller
{
    //
    public function index()
    {
        $top_visas = Visas::whereIn('id',[4,5,6])->get();
        $visas = Visas::Where('status', 'active')->get();
        return view('home',compact('top_visas','visas'));

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
        $visas = Visas::Where('status', 'active')->get();
        return view('pages.contact',compact('visas'));
    }
    public function visaDetails($slug = null, Request $request)
    {
        if($slug == null)
        {
            return redirect()->route('visa.details', ['id' => $request->slug]);
        }else
        {
            $visa = Visas::where('slug', $slug)->first();
            $visa = Visas::first();
            return view('visa.details',compact('visa'));
        }
    }
}
