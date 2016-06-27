<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class Upload
{
    private $filename;
    private $folder;

    /**
     * Create a new Upload instance.
     *
     * @param file   $file   The file to upload, sent through a form request
     * @param string $folder The directory in which the file should be moved
     *
     * @return void
     */
    public function __construct($file, $folder = 'uploads')
    {
        $this->folder = $folder;

        $destinationPath = public_path().'/'.$folder.'/';

        $this->filename = str_replace(' ', '_', str_random(5).time().$this->cleanAccents($file->getClientOriginalName()));

        $uploadSuccess = $file->move($destinationPath, $this->filename);

        return $this;
    }

    /**
     * Resize the uploaded file to specific dimensions.
     *
     * @param int $width
     * @param int $height
     *
     * @return object
     */
    public function thumbnail($width, $height)
    {
        $img = Image::make(public_path().'/'.$this->folder.'/'.$this->filename);
        $img->resize($width, $height);
        $this->filename = 'thumb_'.$this->filename;
        $img->save(public_path().'/'.$this->folder.'/'.$this->filename);

        return $this;
    }

    /**
     * return the Filename only.
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->filename;
    }

    /**
     * return the full path in which the file is located.
     *
     * @return string
     */
    public function getFullPath()
    {
        return '/'.$this->folder.'/'.$this->filename;
    }

    /**
     * Clean up a string of bad characters.
     *
     * @param string $str The String to be cleaned up
     *
     * @return string The cleaned string
     */
    public function cleanAccents($str)
    {
        $unwanted_array = [
            'Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â'  => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ'  => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
            'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î'  => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ'  => 'b', 'ÿ' => 'y',
        ];

        return strtr($str, $unwanted_array);
    }
}
