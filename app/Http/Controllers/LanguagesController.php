<?php

namespace App\Http\Controllers;

class LanguagesController extends Controller
{
    // Set Site Language
    public function setLanguage($locale){
        app()->setLocale($locale);
        //storing the locale in session to get it back in the middleware
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
