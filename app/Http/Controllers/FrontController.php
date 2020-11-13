<?php

namespace App\Http\Controllers;

use App\Front;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fronts = Front::all();

        return view('post.index', compact('posts'));
    }
}
