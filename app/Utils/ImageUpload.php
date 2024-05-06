<?php

 namespace App\Utils;
 use Illuminate\Support\Str;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Storage;
 use Intervention\Image\Facades\Image;

 class ImageUpload
 {

    public static function UploadImage($request,$height = null, $width = null,$path=null)
    {
        // $file = $request->file('image');

        // $imagename = Str::uuid().date('Y-m-d').'.'.  $file->extension();

        // [$widthDefult, $heightDefult] = getimagesize($request);

        // $height = is_null($height)?$heightDefult:$height;

        // $width  = is_null($width) ? $widthDefult : $width ;

        // $image  = Image::make($request->path());

        // $image->fit($height, $width, function ($constraint) {
        //     $constraint->upsize();
        // })->stream();

        // Storage::disk('images')->put($path.$imagename, $image);

        // return $path.$imagename ;

        $imagename = Str::uuid() . date('Y-m-d') . '.' . $request->extension();
        [$widthDefult, $heightDefult] = getimagesize($request);
        $width = $width ?? $widthDefult;
        $height = $height ?? $heightDefult;

        $image = Image::make($request->path());
        $image->fit($width, $height, function ($constraint) {
            $constraint->upsize();
        })->stream();
        Storage::disk('images')->put($path.$imagename, $image);
        return $path.$imagename;


    }
 }





?>
