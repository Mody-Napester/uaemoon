<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Settings;
use App\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $data['settings'] = Settings::getById(1);
        $data['slider'] = Slider::getAll();
        return view('front/home', $data);
    }
}
