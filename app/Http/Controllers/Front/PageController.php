<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Page;
use App\Settings;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        $data['settings'] = Settings::getById(1);
        return view('front/page/about_us', $data);
    }

    public function contactUs()
    {
        $data['settings'] = Settings::getById(1);
        return view('front/page/contact_us', $data);
    }

    public function privacyPage()
    {
        $data['page'] = Page::where('is_privacy_page', 1)->orderBy('id', 'desc')->first();
        return view('front/page/privacy_page', $data);
    }

    public function termsPage()
    {
        $data['page'] = Page::where('is_terms_page', 1)->orderBy('id', 'desc')->first();
        return view('front/page/terms_page', $data);
    }

    public function anyPage(Request $request)
    {
        $data['page'] = Page::getOneBy('uuid', $request->uuid);
        return view('front/page/any_page', $data);
    }
}
