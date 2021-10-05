<?php declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{
    /**
     * @param UploadedFile $file
     * @param string $path
     * @return string|null
     */
    public function upload(UploadedFile $file, string $path = 'news') : ?string
    {
        $originalExtension = $file->getClientOriginalExtension();
        $fineName = uniqid('u_') . "." . $originalExtension;


        $filePath = $file->storeAs($path, $fineName, 'public');
        dd($filePath);
        if($filePath) {
            return $filePath;
        }

        return null;
    }
}
