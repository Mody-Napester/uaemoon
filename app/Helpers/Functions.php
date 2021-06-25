<?php

function getFromJson($json, $lang)
{
    $data = json_decode($json, true);
    return $data[$lang];
}

// Get path
function get_path($path)
{
    return base_path() . config('custom.public') . '/' . $path;
}

// check authority
function check_authority($authority)
{
    return \App\User::hasAuthority($authority);
}

// Default language
function lang()
{
    return app()->getLocale();
}

// System languages
function langs($get = null)
{
    $get_array = [];
    if ($get == null) {
        $get_array = config('vars.langs');
    } else {
        foreach (config('vars.langs') as $lang) {
            if ($get == 'short_name') {
                $get_array[] = $lang['short_name'];
            }
        }
    }
    return $get_array;
}

// Get lookup
function lookup($by, $value)
{
    $results = null;
    $by_array = ['id', 'uuid', 'name', 'parent_id'];
    if (in_array($by, $by_array)) {
        $results = \App\Lookup::where($by, $value)->first();
    }
    return $results;
}

// Get lookups
function lookups($key)
{
    $lookup = \App\Lookup::getOneBy('key', $key);
    if ($lookup) {
        return \App\Lookup::getAllBy('parent_id', $lookup->id);
    } else {
        return null;
    }
}

// User fullname
function name($user = null)
{
    if ($user != null) {
        return $user->fname . ' ' . $user->lname;
    } else {
        return auth()->user()->fname . ' ' . auth()->user()->lname;
    }
}

// Custom Date
function custom_date($date)
{
    return date('d-m-Y, g:i:s a', strtotime($date));
}

// Human Date
function human_date($date)
{
//    $editDate = str_replace('-0001-11-30', '2016-11-30', $date);
    return Carbon\Carbon::createFromTimeStamp(strtotime($date))->diffForHumans();
}

// Site languages
function languages()
{
    $lookup = \App\Lookup::where('name', 'languages')->first();
    return \App\Lookup::where('parent_id', $lookup->id)->get();
}

// Get lookups
function str_well($value)
{
    return ucfirst(str_replace('_', ' ', $value));
}

// Upload files
function upload_file($type, $file, $path)
{

    $results = [
        'status' => false,
        'filename' => null,
        'mime' => null,
        'message' => null,
    ];

    $extention = strtolower($file->getClientOriginalExtension());

    $validExtentions = [];
    $file_mimes = lookups('file_mimes');

    $results['mime'] = $type . '/' . $extention;

    if ($type == "image") {
        foreach ($file_mimes as $file_mime) {
            $ext = strtolower(str_replace('image\/', '', $file_mime->name));
            $validExtentions[] = getFromJson($ext, 'en');
        }
    } elseif ($type == "text") {
        foreach ($file_mimes as $file_mime) {
            $ext = strtolower(str_replace('text/', '', $file_mime->name));
            $validExtentions[] = getFromJson($ext, 'en');
        }
    }

    if (in_array($extention, $validExtentions)) {

        $filename = time() . rand(1000, 9999) . '.' . $extention;
        $destinationPath = get_path($path);

        $upload = $file->move($destinationPath, $filename);

        if ($upload) {
            // File Uploaded
            $results['status'] = true;
            $results['filename'] = $filename;
            $results['message'] = 'Uploaded Successfully';

            return $results;
        } else {
            // Error Uploading
            $results['message'] = 'Error Uploading';

            return $results;
        }

    } else {
        // File not valid
        $results['message'] = 'File not valid';

        return $results;
    }
}

// Function to get the client IP address
function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function getCategoryImage($picture)
{
    if ($picture) {
        return url('public/images/category/picture/' . $picture);
    } else {
        return url('public/images/no-image.png');
    }
}

function getPageImage($image, $pictureOrCover = '')
{
    if ($image) {
        if ($pictureOrCover == 'picture') {
            return url('public/images/page/picture/' . $image);
        } else {
            return url('public/images/page/cover/' . $image);
        }
    } else {
        return url('public/images/no-image.png');
    }
}

function getYoutubeId($url, $getEmbedUrl = false)
{
    $id = '';
    if (strpos($url, '?v=') !== false) {
        if (strpos($url, 'https://www.youtube.com/') !== false) {
            $id = str_replace('https://www.youtube.com/watch?v=', '', $url);
        } elseif (strpos($url, 'https://youtu.be') !== false) {
            $id = str_replace('https://youtu.be?v=', '', $url);
        }
    } else {
        if (strpos($url, 'https://www.youtube.com/embed/') !== false) {
            $id = str_replace('https://www.youtube.com/embed/', '', $url);
        } elseif (strpos($url, 'https://youtu.be/') !== false) {
            $id = str_replace('https://youtu.be/', '', $url);
        }
    }
    if($id) {
        if (strpos($url, '&') !== false) {
            $id = explode('&', $id)[0];
        }
    }
    if ($id && $getEmbedUrl) {
        return 'https://www.youtube.com/embed/' . $id;
    } else {
        return $id;
    }
}
