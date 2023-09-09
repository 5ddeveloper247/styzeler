<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

if (!function_exists('saveMultipleImages')) {

    function saveMultipleImages($files, $path)
    {

        $savedFilePaths = [];

        if (!File::isDirectory(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true);
        }

        foreach ($files as $file) {
            $filename = $file->getClientOriginalExtension();
            $date_append = Str::random(16);
            $file->move(public_path($path), $date_append . '.' . $filename);

            $savedFilePaths[] = $path . '/' . $date_append . '.' . $filename;
        }

        return $savedFilePaths;
    }
}

if (!function_exists('saveSingleImage')) {

    function saveSingleImage($file, $path)
    {

        if (!File::isDirectory(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true);
        }

        $filename = $file->getClientOriginalExtension();
        $date_append = Str::random(16);
        $file->move(public_path($path), $date_append . '.' . $filename);

        $savedFilePaths = $path . '/' . $date_append . '.' . $filename;

        return $savedFilePaths;
    }
}


if (!function_exists('customView')) {
    /**
     * Get the evaluated view contents for the given view.
     */
    function customView($freelancer_view, $owner_view, $client_view, $type, $data = [], $mergeData = [])
    {
        $freelancer_types = [
            'wedding',
            'hairStylist',
            'beautician',
            'barber'

        ];
        $owner_types = [
            'beautySalon',
            'hairdressingSalon'
        ];

        if (in_array($type, $freelancer_types)) {

            return view($freelancer_view, $data, $mergeData);
        } elseif (in_array($type, $owner_types)) {

            return view($owner_view, $data, $mergeData);
        } else {
            return view($client_view, $data, $mergeData);
        }
    }
}
if (!function_exists('deleteImage')) {
    function deleteImage($imagePath)
    {
        $imagePath = public_path($imagePath);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        } else {
            // Image not found
        }
        try {
            // Check if the file exists before attempting to delete it
            if (File::exists($imagePath)) {
                // Delete the file
                File::delete($imagePath);
                return 'Image deleted successfully';
            } else {
                return 'Image not found';
            }
        } catch (\Exception $e) {
            return 'Error deleting image: ' . $e->getMessage();
        }
    }
}