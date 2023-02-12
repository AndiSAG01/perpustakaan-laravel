<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CloudinaryController extends Controller
{
    private const folder_path = 'tutorial';

    public function path($path){
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public function upload($image, $filename){
        $newFilename = str_replace(' ', '_', $filename);
        $public_id = date('Y-m-d_His').'_'.$newFilename;
        $result = cloudinary()->upload($image, [
            "public_id" => $this->path($public_id),
            "folder"    => self::folder_path
        ])->getSecurePath();

        return $result;
    }

    public function replace($path, $image, $public_id){
        $public_id = self::folder_path.'/'.$this->path($path);
        $this->delete($path);
        return $this->upload($image, $public_id);
    }

    public function delete($path){
        $public_id = self::folder_path.'/'.$this->path($path);
        return cloudinary()->destroy($public_id);
    }
}
