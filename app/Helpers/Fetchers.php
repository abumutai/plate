 <?php

use App\CanSkill;
use App\Skill;

 function getRestaurantLogo($restaurant=null, $wait = 10)
 {
     if(!$restaurant)
         goto fault;
     $url = $restaurant->logo;
     if (!$url || !is_string($url) || !preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)) {
         fault:
         return asset('images/backgrounds/1x/rest_default.png');
     }

     if (http_response($url, $wait) >= 400)
         return asset('images/backgrounds/1x/rest_default.png');
     return $url;
 }

function getUserAvatar($user, $wait = 10)
{
    if ($user->role_id < 3)
        return getCompanyLogo($user);
    $default_avatar = asset('images/icons/avatar_candidate.svg');
    $url = $user->can_profile->avatar;
    if (!$url || !is_string($url) || !preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)) {
        return $default_avatar;
    }

    if (http_response($url, $wait) >= 400)
        return $default_avatar;

    return $url;
}

function getCompanyLogo($user, $wait = 10)
{
    $url = $user->employer->logo;
    if (!$url || !is_string($url) || !preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)) {
        return asset('images/icons/avatar_company.svg');
    }

    if (http_response($url, $wait) >= 400)
        return asset('images/icons/avatar_company.svg');
    return $url;
}

function http_response($url, $wait = 10)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);

    //This makes the request absolute insecure, uncomment below to make sure its only available locally
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    /* if( stristr("127.0.0.1",$_SERVER["SERVER_NAME"] ) || stristr("localhost",$_SERVER["SERVER_NAME"] ))
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);*/

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT, $wait);
    $head = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
    curl_close($ch);

    //check the curl_error after the curl_getinfo to find out the hidden errors.
    /*
     * curl_error($ch)
     */
    return $head ? $httpCode : 404;
}

function getBlogImage($blog, $wait = 10)
{
    $url = $blog->cover_image;
    if (!$url || !is_string($url) || !preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)) {
        return asset('test/assets/images/blog_default.png');
    }

    if (http_response($url, $wait) >= 400)
        return asset('test/assets/images/blog_default.png');
    return $url;
}

function checkFileState($file)
{
    //TODO specify file size variable
    if ($file->getSize() > (5 * 1024 * 1024))
        return array("status" => false, "message" => "One or more file exceeds the limit < 10MB");
    elseif (in_array($file->getClientOriginalExtension(), ["exe", "dll"]))
        return array("status" => false, "message" => "Virus detected. Please re-upload the files");
    return array("status" => true, "message" => "its okay");
}

;

function getSuggestedSkills($user)
{
    $count = 0;
    $skillBag = array();
    foreach (Skill::all() as $skill) {
        if (CanSkill::where([["can_profile_id", $user->can_profile->id], ["skill_id", $skill->id]])->exists())
            continue;
        $count++;
        array_push($skillBag, $skill);
        if ($count > 10)
            break;
    }
    return $skillBag;
}

function calculatProfileCompletion($user)
{
    $docCount = $user->can_profile->uploaded_documents->count();
    $docCount = $docCount > 4 ? 4 : $docCount;
    $points = 0;
    $points += $user->can_profile->headline != null ? 12.5 : 0;
    $points += $user->can_profile->about != null ? 12.5 : 0;
    $points += $user->can_profile->avatar != null ? 12.5 : 0;
    $points += $user->can_profile->phone != null ? 12.5 : 0;
    $points += $user->can_profile->address != null ? 12.5 : 0;
    $points += $docCount / 4 * 12.5;
    $points += $user->can_profile->can_skills->count() > 0 ? 12.5 : 0;
    $points += $user->can_profile->can_subcategory_id != null ? 12.5 : 0;

    return $points;
}

function quickSession($key, $value = "", $get = false, $del = false)
{
    if (!$get)
        !$del ? session([$key => $value]) : session()->forget($key);
    else
        return session()->get($key);
    return null;
}

function showNewsLetterSubscribe($user)
{
    if ($user != null && $user->setting->subscribe_news) {
        return false;
    }
    return true;
}

function sendEmail($to, $data)
{
    Illuminate\Support\Facades\Mail::to($to)
        ->send(new App\Mail\DefaultMail($data));


    return "sent";
}

function getApplicationStatus($status = 0)
{
    switch ($status) {
        case 1:
            return 'viewed';
            break;
        case 2:
            return 'shortlisted';
            break;
        case 3:
            return 'hired';
            break;
        case 4:
            return 'rejected';
            break;
        default:
            return "Pending";
    }

}

function getJobStatus($status = 0)
{//0=pending,1=online,2=offline,3=banned
    switch ($status) {
        case 0:
            return 'pending';
            break;
        case 1:
            return 'online';
            break;
        case 2:
            return 'offline';
            break;
        case 3:
            return 'banned';
            break;
        default:
            return "pending";
    }
}

function calculateRating($restaurant)
{
    $stars_5 = $restaurant->ratings->where('rating', '=', 5)->count();
    $stars_4 = $restaurant->ratings->where('rating', '=', 4)->count();
    $stars_3 = $restaurant->ratings->where('rating', '=', 3)->count();
    $stars_2 = $restaurant->ratings->where('rating', '=', 2)->count();
    $stars_1 = $restaurant->ratings->where('rating', '=', 1)->count();
    $weighted_avg = (5 * $stars_5 + 4 * $stars_4 + 3 * $stars_3 + 2 * $stars_2 + 1 * $stars_1) / max(($stars_5 + $stars_4 + $stars_3 + $stars_2 + $stars_1),1);
    return ceil($weighted_avg);
}













function getMenuImage($menu, $wait = 10)
{
    $default_Image = asset('images/logo/SVG/food.svg');
    $url = $menu->image;
    if (!$url || !is_string($url) || !preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)) {
        return $default_Image;
    }

    if (http_response($url, $wait) >= 400)
        return $default_Image;

    return $url;
}

