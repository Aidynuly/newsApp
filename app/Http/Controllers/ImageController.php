<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;
class ImageController extends Controller
{
    public function upload()
    {
        $images = Image::all();
        return view('upload',['images' => $images]);
    }

    public function save_image(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->file('image');
            $reImage = time(). '.' . $image->getClientOriginalExtension();
            $dest = public_path('/imgs');
            $image->move($dest, $reImage);

            $image = new Image;
            $image->img_alt = $request->img_alt;
            $image->img_src = $reImage;
            $image->save();
            return redirect('image/upload')->with('success', 'IMage has been upload and saved');
        }
        else {
            return redirect('image/upload')->with('msg', 'Please choose file');
        }
    }
}
