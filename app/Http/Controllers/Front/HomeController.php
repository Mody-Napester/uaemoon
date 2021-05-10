<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Settings;
use App\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $data['settings'] = Settings::getById(1);
        $data['slider'] = Slider::getAll();
        $data['categories'] = Category::getAll([
            'is_active' => 1
        ]);
        return view('front/home', $data);
    }
}
