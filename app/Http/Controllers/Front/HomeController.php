<?php

namespace App\Http\Controllers\Front;

use App\Advertise;
use App\Category;
use App\Http\Controllers\Controller;
use App\Settings;
use App\Slider;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            $locale = app()->getLocale();
            session()->put('locale', $locale);
        }
        $data['settings'] = Settings::getById(1);
        $data['slider'] = Slider::getAll();
        $data['categories'] = Category::getAll([
            'is_active' => 1
        ]);
        $data['featured_adv'] = Advertise::getAll([
            'with' => ['category'],
            'status' => 1,
            'is_featured' => 1,
        ]);
        $data['random_adv'] = Advertise::getAll([
            'with' => ['category'],
            'status' => 1,
            'is_featured' => 0,
            'getRandom' => 8,
        ]);
        return view('front/home', $data);
    }
}
