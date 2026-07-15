<?php

use App\Models\GeneralSetting;
use App\Models\Pages\Page;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SocialMedia;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

if (!function_exists('create_option')) {
    function create_option($key)
    {
        $exists = GeneralSetting::where('key', $key)->exists();
        if (!$exists) {
            GeneralSetting::create(['key' => $key]);
        }
    }
}
if (!function_exists('get_option')) {
    function get_option($key)
    {
        $getOption = GeneralSetting::select('value')->where('key', $key)->firstOrFail();
        return $getOption->value;
    }
}
if (!function_exists('update_option')) {
    function update_option($key, $value)
    {
        $option = GeneralSetting::where('key', $key)->firstOrFail();
        $option->value = $value;
        $option->save();
    }
}


if (!function_exists('uploadFile')) {
    function uploadFile($file, $prefix = '', $dir = 'documents')
    {
        $extension = $file->getClientOriginalExtension();
        $uniqueId = uniqid();
        $fileName = "{$prefix}{$uniqueId}.{$extension}";
        // $fileName = time() . $extension;

        $path = public_path($dir . '/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file->move($path, $fileName);

        return $dir . '/' . $fileName;
    }
}
// if (!function_exists('uploadImage')) {

//     function uploadImage($file, $width = null, $height = null, $prefix = '', $dir = 'images')
//     {
//         $uniqueId = uniqid();
//         $imageName = $prefix . '_' . $uniqueId . '.' . $file->getClientOriginalExtension();
//         $path = public_path($dir . '/');

//         if (!file_exists($path)) {
//             mkdir($path, 0777, true);
//         }
//         Image::read($file)->resize($width, $height)->save($path . $imageName);
//         return $dir . '/' . $imageName;
//     }
// }
if (!function_exists('uploadImage')) {
    function uploadImage($file, $width = null, $height = null, $prefix = '', $dir = 'images')
    {
        $uniqueId = uniqid();
        $imageName = $prefix . '_' . $uniqueId . '.webp'; // force webp
        $path = public_path($dir . '/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $image = Image::read($file);
        // Resize only if width/height provided
        if ($width || $height) {
            $image->resize($width, $height);
        }
        // Save as WEBP (you can control quality: 80-90 is good)
        $image->toWebp(85)->save($path . $imageName);
        return $dir . '/' . $imageName;
    }
}
if (!function_exists('uploadSameImage')) {

    function uploadSameImage($file, $prefix = '', $dir = 'images')
    {
        $uniqueId = uniqid();
        $imageName = $prefix . '_' . $uniqueId . '.' . $file->getClientOriginalExtension();
        $path = public_path($dir . '/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        Image::read($file)->save($path . $imageName);
        return $dir . '/' . $imageName;
    }
}
if (!function_exists('deleteImage')) {

    function deleteImage($path): bool
    {
        if ($path && file_exists(public_path($path))) {
            unlink(public_path($path));
            return true;
        }
        return false;
    }
}

if (!function_exists('uploadImages')) {

    function uploadImages($files, $width, $height, $prefix = '', $dir = 'images')
    {
        $uploadedImages = [];
        $path = public_path($dir . '/');

        // Ensure the directory exists
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        foreach ($files as $file) {
            $imageName = $prefix . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            Image::read($file)->resize($width, $height)->save($path . $imageName);
            $uploadedImages[] = $dir . '/' . $imageName;
        }

        return $uploadedImages;
    }
}


if (!function_exists('logged_user_info')) {
    function logged_user_info()
    {
        if (auth('admin')->user()) {
            return auth('admin')->user();
        }
    }
}



if (!function_exists('get_active_social_medias')) {
    function get_active_social_medias()
    {
        return SocialMedia::where('is_active', true)->select('name', 'link')->get();
    }
}
if (!function_exists('get_active_service_categories')) {
    function get_active_service_categories()
    {
        return ServiceCategory::where('is_active', true)->select('name', 'slug')->get();
    }
}
if (!function_exists('get_active_custom_pages')) {
    function get_active_custom_pages()
    {
        return Page::where('is_active', true)->select('name', 'slug')->get();
    }
}
if (!function_exists('get_active_services')) {
    function get_active_services()
    {
        return Service::where('is_active', true)->orderBy('created_at', 'asc')->select('title', 'slug')->get();
    }
}
if (!function_exists('get_active_projects')) {
    function get_active_projects()
    {
        return Project::where('is_active', true)->select('name', 'slug')->limit(10)->get();
    }
}
if (!function_exists('userAvatar')) {
    function userAvatar($image, $name)
    {
        if (!empty($image) && file_exists(public_path($image))) {
            return '<img src="' . asset($image) . '" alt="user" class="w-10 h-10 rounded-full">';
        }

        $firstLetter = Str::upper(Str::substr($name, 0, 1));

        return '<div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center font-bold text-gray-700">'
             . $firstLetter .
             '</div>';
    }
}