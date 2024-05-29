<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    //
    public function store(Request $request) {
        $image = $request->file('file');

        $name = Str::Uuid() . "." . $image->extension();

        $manager = new ImageManager(new Driver());

        $imageServer = $manager::gd()->read($image);
        $imageServer->cover(1000, 1000);

        $imagePath = public_path('uploads') . '/' . $name;

        $imageServer->save($imagePath);

        return response()->json([
            'img' => $name
        ]);
    }
}
