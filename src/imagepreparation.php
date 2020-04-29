<?php

namespace victorycto\imagepreparation;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Intervention\Image\ImageManagerStatic as ImageIntervention;
use Illuminate\Support\Facades\Storage;

class imagepreparation
{
    private $image;
    private $processedImage;
    private $name;
    private $title;

    public function resizeImage(Request $request)
    {
        $this->title = $request->title;

        $this->image = $request->file('image');
  
        $newImage = new Image;

        $this->resize()->save('full_');
        $newImage->filename_full = $this->name;

        $this->resize(400)->save('small_');
        $newImage->filename_small = $this->name;
        
        $this->resize(100)->save('thm_');
        $newImage->filename_thm = $this->name;

        $newImage->title = $this->title;
        $newImage->save();

        return back()
            ->with('success', 'Image Upload successful')
            ->with('imageName', $this->name);
    }

    private function resize($width = null, $height = null)
    {
        $this->processedImage = ImageIntervention::make($this->image->getRealPath());
        if ($width || $height) {
            $this->processedImage->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        return $this;
    }
    private function save($prefix = "")
    {
        try {
            $this->name = $prefix.''.time().'.'.$this->image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $this->processedImage->save($destinationPath.'/'.$this->name);
            $s3 = Storage::disk('s3');
            $filePath = $destinationPath . '/' . $this->name;
            $s3->put($filePath, file_get_contents($filePath), 'public');
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        
        return $this;
    }
}
