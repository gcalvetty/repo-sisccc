<?php

namespace sis_ccc\Http\Controllers; 

use Illuminate\Http\Request; 
use sis_ccc\Http\Controllers\Controller; 
use Illuminate\Foundation\Auth\User;

class ImageCropController extends Controller {
    public function index() {
        return view('image_handling.crop_image'); 
      }
      public function imageCrop(Request $request) {
        $validatedData = $request->validate([
            'image' => 'required|file|mimes:jpeg,png', 
        ]); 
        


        if ($request->file('image')) {
        $usuAux = User::find($request->idusu);
        dd($usuAux->tipo_Usu);
        //Est_ccc;

        $image_file = $request->image; 
        list($type, $image_file) = explode(';', $image_file); 
          list(, $image_file) = explode(',', $image_file); 
          $image_file = base64_decode($image_file); 


          $image_name = ''; 
          $path = public_path('uploads/' . $image_name); 
          file_put_contents($path, $image_file); 
          return response()->json(['status' => true]); 
      }
    }
}
