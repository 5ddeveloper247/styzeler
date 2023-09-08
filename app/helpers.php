<?php

use App\Models\User;
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
            $filename = $file->getClientOriginalName();
            $date_append = date("Y-m-d-His-");
            $file->move(public_path($path), $date_append . $filename);

            $savedFilePaths[] = $path . '/' . $date_append . $filename;
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

        $filename = $file->getClientOriginalName();
        $date_append = time();
        $file->move(public_path($path), $date_append . $filename);

        $savedFilePaths = $path . '/' . $date_append . $filename;

        return $savedFilePaths;
    }
}


if (!function_exists('customView')) {
    /**
     * Get the evaluated view contents for the given view.
     */
    function customView($freelancer_view, $owner_view, $type, $data = [], $mergeData = [])
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
        }
    }
}
