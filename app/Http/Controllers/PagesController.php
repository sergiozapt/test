<?php

namespace Pipeline\Http\Controllers;

use Illuminate\Http\Request;

use Pipeline\Http\Requests;
use Pipeline\Http\Controllers\Controller;

class PagesController extends Controller
{
    public  function about()
    {
        //$people = [];
        $people = [
            "Sergio", "Rhoda", "Fifi", "Mr. Legs"
        ];

        return view('pages.about', compact('people'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
