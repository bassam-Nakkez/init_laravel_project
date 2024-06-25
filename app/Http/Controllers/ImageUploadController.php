<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function __invoke( Request $request )
    {
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $file->store('images', 'public');

        return response()->json(['path' => $path], 200);
    }

    return response()->json(['error' => 'No file uploaded'], 400);
    }
}
