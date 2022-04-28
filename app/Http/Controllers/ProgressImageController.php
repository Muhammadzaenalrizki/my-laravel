<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressImageController extends Controller
{
    public function index()
    {
        return view('progress_image.index');
    }
    public function postImage(Request $request)
    {

        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images');
        return response(['status' => 200, 'name' => $name]);
    }
}
