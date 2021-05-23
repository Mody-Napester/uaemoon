<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Category;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ApisController extends Controller
{

    public function listCategories()
    {
        $data['categories'] = Category::where('is_active', 1)->get();
        return $data;
    }

    public function showCategory($uuid)
    {
        $data['category'] = Category::getOneBy('uuid', $uuid);
        return $data;
    }

    public function listAds()
    {
        $data['ads'] = Advertise::all();
        return $data;
    }

    public function showAd($uuid)
    {
        $data['ad'] = Category::getOneBy('uuid', $uuid);
        return $data;
    }

    public function showPrivacyPage()
    {
        $data['privacy'] = Page::where('is_privacy_page', 1)->orderBy('id', 'desc')->first();
        return $data;
    }

    public function showTermsPage()
    {
        $data['terms'] = Page::where('is_terms_page', 1)->orderBy('id', 'desc')->first();
        return $data;
    }

    public function showUser($uuid)
    {
        $data['user'] = User::getOneBy('uuid', $uuid);
        return $data;
    }

    public function showUserAds($uuid)
    {
        $data['user'] = User::getOneBy('uuid', $uuid);
        $data['ads'] = Advertise::getAllBy('created_by', $data['user']->id);
        
        return $data;
    }
}
