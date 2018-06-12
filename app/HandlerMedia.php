<?php

namespace App;
use Illuminate\Support\Facades\Storage;

class HandlerMedia
{
    public function fileExists($disk, $filename){
        try{
            return Storage::disk($disk)->exists($filename);
        }catch(Exception $e){
            return false;
        }
    }

    public function deleteMedia($disk, $filename){
        Storage::disk($disk)->delete($filename);
    }

    public function saveTempMedia($b64file, $path, $format){

    	$this->storageMedia($b64file, $path, $format, "tmp");
    }

    public function saveMedia($b64file, $path, $format){
    	$this->storageMedia($b64file, $path, $format, "images");
    }

    public function moveMedia($filename, $from, $to){
        $full_path_source = Storage::disk($from)->getDriver()->getAdapter()->applyPathPrefix($filename);
        $full_path_dest = Storage::disk($to)->getDriver()->getAdapter()->applyPathPrefix($filename);
        \File::move($full_path_source, $full_path_dest);
    }

    public function strimMediaName($mediaName){
        $only_name = explode(".", $mediaName)[0];
        $format = explode(".", $mediaName)[ count( explode(".", $mediaName) )-1 ];
        return implode("-", explode(".", $only_name)).".".$format;
    }

    public function removeMedia($image){
    	Storage::disk('images')->move($image->url, '/tmp/'.$image->url);
    	$image->status = 0;
    	return $image->save();
    }

    private function storageMedia($b64file, $path, $format, $disk){
    	$base_path = public_path()."/".$disk."/";
    	
    	if ($format == 'jpeg' || $format == 'jpg'){ 
            $image = imagecreatefromjpeg($b64file);
            imagejpeg( $image, $base_path.$path, 90);
        } else if ($format == 'gif'){ 
            $image = imagecreatefromgif($b64file);
            imagegif( $image, $base_path.$path);
        } elseif ($format == 'png'){ 
            $image = imagecreatefrompng($b64file);
            imagealphablending($image, false);
            imagesavealpha($image, true);
            imagepng( $image, $base_path.$path, 9);
        } else {
            $img = preg_split("/[,]/",  $b64file);
            $img = base64_decode($img[1]);
            Storage::disk($disk)->put($path, $img);
        
        }
    }
}
