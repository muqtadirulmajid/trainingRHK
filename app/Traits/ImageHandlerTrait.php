<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Image;

trait ImageHandlerTrait
{
   public function uploadImage(Request $request, $path)
   {
      if ($request->image) {
         $imageName = time() . '.' . $request->image->extension();
         $img = Image::make($request->image->getRealPath());
         $img->resize(960, 540, function ($constraint) {
            $constraint->aspectRatio();
         })->save($path . '/' . $imageName);
         return $imageName;
      }
   }

   public function unlinkImage($path, $imageName)
   {
      $image = $path . $imageName;
      if (file_exists($image)) {
         @unlink($image);
      }
   }
}
