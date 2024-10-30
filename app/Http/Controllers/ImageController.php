<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Buglinjo\LaravelWebp\Facades\Webp;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function convert(ImageRequest $request)
    {
        $images = $request->file('images');
        foreach ($images as $image) {
            $name = $image->getClientOriginalName();
            $img = Webp::make($image)->save(storage_path('/app/public/' . $name . '.webp'));
        }

        return redirect()->route('home');
    }

    public function download($file)
    {
        return response()->download($file);
    }
}
