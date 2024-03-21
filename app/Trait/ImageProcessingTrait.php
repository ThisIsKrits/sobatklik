<?php
namespace App\Trait;

trait ImageProcessingTrait
{
    private function storeContact($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName= time().'.png';
        $path = public_path('storage') . "/uploads/kontak/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    private function storeSosmed($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName= time().'.png';
        $path = public_path('storage') . "/uploads/sosmed/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    private function storeProfile($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName= time().'.png';
        $path = public_path('storage') . "/uploads/profile/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    private function storeLogo($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName= 'logo'.time().'.png';
        $path = public_path() . "/storage/uploads/logo/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    private function storeMaskot($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName= 'maskot'.time().'.png';
        $path = public_path() . "/storage/uploads/maskot/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    private function deleteLogo($imageName)
    {
        $path = public_path() ."/storage/uploads/logo/" . $imageName;

        if (file_exists($path)) {
            unlink($path);
        }
    }

    private function deleteMaskot($imageName)
    {
        $path = public_path() . "/storage/uploads/maskot/" . $imageName;

        if (file_exists($path)) {
            unlink($path);
        }
    }

    private function deleteContact($imageName)
    {
        $path = public_path("storage/uploads/kontak/$imageName");

        if (file_exists($path)) {
            unlink($path);
        }
    }

    private function deleteSosmed($imageName)
    {
        $path = public_path("storage/uploads/sosmed/$imageName");

        if (file_exists($path)) {
            unlink($path);
        }
    }

    private function deleteProfile($imageName)
    {
        $path = public_path("storage/uploads/profile/$imageName");

        if (file_exists($path)) {
            unlink($path);
        }
    }
}
