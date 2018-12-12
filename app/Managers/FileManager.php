<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/14/18
 * Time: 9:06 PM
 */

namespace App\Managers;


use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileManager
{
    const format = [256,512,1024];

    public static function storeImage(UploadedFile $image,$path) {
        $l = $image->store($path,'public');
        $link = substr($l,strlen($path));

        FileManager::create_format_folder($path);
        foreach (FileManager::format as $item){
            FileManager::put_image($image,$item,$link,$path);
        }
        return $link;
    }

    public static function loadImage($file_name,$path,$format="") {
        return "/storage".$path. ($format!=""?$format."/":"") .$file_name;
    }

    public static function deleteImage($file_name,$path) {
        Storage::disk('public')->delete( $path.$file_name);
        foreach (FileManager::format as $item) {
            Storage::disk('public')->delete( $path.$item."/".$file_name);
        }
    }

    public static function loadLogo(User $user,$format="256") {
        return self::loadImage($user->logo,config("yorutracer.user_logo_folder"),$format);
    }

    private static function put_image(UploadedFile $image,$size,$link,$path) {
        $img1024 = FileManager::resize_image($image,$size,$size);
        $path = public_path( '/storage'.$path.$size."/".$link);
        switch (strtoupper($image->extension()) ) {
            case "PNG":
                imagepng($img1024,$path);
                break;
            case "JPG":
                imagejpeg($img1024,$path);
                break;
            case "JPEG":
                imagejpeg($img1024,$path);
                break;
            case "GIF":
                imagegif($img1024,$path);
                break;
            default:
                imagepng($img1024,$path);
                break;
        }
    }
    private static function create_format_folder($path) {

        $path = '/storage'.$path;

        foreach (FileManager::format as $item) {
            $a = public_path($path).$item;
            if (!is_dir($a))
                mkdir($a);
        }
    }
    private static function resize_image(UploadedFile $file, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }

        switch (strtoupper($file->extension())) {
            case "PNG" :
                $src = imagecreatefrompng($file);
                break;
            case "JPG":
                $src = imagecreatefromjpeg($file);
                break;
            case "JPEG":
                $src = imagecreatefromjpeg($file);
                break;
            case "GIF":
                $src = imagecreatefromgif($file);
                break;
            default:
                $src = imagecreatefrompng($file);
                break;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        return $dst;
    }

}