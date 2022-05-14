<?php

namespace App\Http\Livewire\Concerns;

use finfo;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait InteractsWithFiles
{
    protected $files = [];

    protected function listeners()
    {
        return array_merge($this->listeners, ['fileUploaded']);
    }

  //Trying to simulate a FileBag with protected $files property
    public function fileUploaded($field, $file, $filename, $extension, $size)
    {
        $file = $this->createTempFile($file, $filename);
        if ($file->isValid()) {
            $this->files[$field] = $file;
        } else {
            $this->feedback('File upload error. Please try again', 'error');
        }
    }

    protected function createTempFile($content, $filename)
    {
        $path = tempnam(sys_get_temp_dir(), uniqid('livewire', true));

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        File::put($path, base64_decode(Str::after($content, 'base64,')));

        return new UploadedFile(
            $path,
            $filename,
            $finfo->file($path),
            0,
            true
        );
    }

}
