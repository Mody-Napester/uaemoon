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
        foreach ($data['categories'] as $category){
            $category->name = getFromJson($category->name, 'en');
            $category->details = getFromJson($category->details, 'en');
            $category->picture = url('public/images/category/picture/'. $category->picture);
        }
        return response()->json($data['categories']);
    }

    public function showCategory($uuid)
    {
        $data['category'] = Category::getOneBy('uuid', $uuid);
        return response()->json($data['category']);
    }

    public function listAds()
    {
        $data['ads'] = Advertise::where('is_featured', 1)->get();
        foreach ($data['ads'] as $ad){
            $ad->cover = url('public/images/ver/cover/'. $ad->cover);;
            $ad->images = url('public/images/ver/image/'. $ad->images);;
        }
        return response($data['ads']);
    }

    public function showAd($uuid)
    {
        $data['ad'] = Category::getOneBy('uuid', $uuid);
        return response()->json($data['ad']);
    }

    public function showPrivacyPage()
    {
        $data['privacy'] = Page::where('is_privacy_page', 1)->orderBy('id', 'desc')->first();
        return response()->json($data['privacy']);
    }

    public function showTermsPage()
    {
        $data['terms'] = Page::where('is_terms_page', 1)->orderBy('id', 'desc')->first();
        return response()->json($data['terms']);
    }

    public function showUser($uuid)
    {
        $data['user'] = User::getOneBy('uuid', $uuid);
        return response()->json($data['user']);
    }

    public function showUserAds($uuid)
    {
        $data['user'] = User::getOneBy('uuid', $uuid);
        $data['ads'] = Advertise::getAllBy('created_by', $data['user']->id);

        return response()->json($data);
    }
}
