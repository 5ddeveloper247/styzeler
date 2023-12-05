<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;

if (!function_exists('saveMultipleImages')) {

    function saveMultipleImages($files, $path)
    {

        $savedFilePaths = [];

        if (!File::isDirectory(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true);
        }

        foreach ($files as $file) {
            $filename = $file->getClientOriginalExtension();
            $date_append = Str::random(32);
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
        $date_append = Str::random(32);
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

if (!function_exists('sendMail')) {
    function sendMail($send_to_name, $send_to_email, $email_from_name, $subject, $body)
    {
        try {
            $mail_val = [
                'send_to_name' => $send_to_name,
                'send_to' => $send_to_email,
                'email_from' => 'noreply@styzeler.co.uk',
                'email_from_name' => $email_from_name,
                // 'email_from' => 'misterkamran93@gmail.com',
                'subject' => $subject,
            ];

            Mail::send('emails.mail', ['body' => $body], function ($send) use ($mail_val) {
                $send->from($mail_val['email_from'], $mail_val['email_from_name']);
                $send->replyto($mail_val['email_from'], $mail_val['email_from_name']);
                $send->to($mail_val['send_to'], $mail_val['send_to_name'])->subject($mail_val['subject']);
            });
            return true;
        } 
        catch (\Exception $e) {
            Log::error($e->getMessage());
            echo "An error occurred while sending the email: " . $e->getMessage();
            return false;
        }
    }
}

if (!function_exists('formatUserType')) {
    function formatUserType($type)
    {
        preg_match('/\((.*?)\)/', $type, $matches);

        if (isset($matches[1])) {
            return ucwords($matches[1]) . " " . ucwords(preg_replace('/([a-z])([A-Z])/', '$1 $2', substr($type, 0, -strlen($matches[0]))));
        }

        if (mb_strtolower(substr($type, -5)) === 'salon') {
            return ucwords(preg_replace('/([a-z])([A-Z])/', '$1 $2', $type)) . " Owner";
        }

        if ($type === 'wedding') {
            return "Wedding Stylist";
        }

        return ucwords(preg_replace('/([a-z])([A-Z])/', '$1 $2', $type));
    }
}
