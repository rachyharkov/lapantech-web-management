<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('visitor.welcome', [
            'page' => $request->page
        ]);
    }

    public function index()
    {
        return view('visitor.welcome', [
            'page' => 'home'
        ]);
    }

    public function fetch_page(Request $request)
    {
        return view('visitor.welcome', [
            'page' => $request->page
        ]);
    }
}
