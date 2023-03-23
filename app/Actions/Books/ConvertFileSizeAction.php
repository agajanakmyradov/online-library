<?php

namespace App\Actions\Books;

class ConvertFileSizeAction
{
    public function handle($file)
    {
        $size = $file->getSize();

        if($size > (1024*1024)) {
            return (ceil($size*10/1024/1024)/10) . ' MB';
        }

        return (ceil($size*10/1024)/10) . ' KB';
    }
}
