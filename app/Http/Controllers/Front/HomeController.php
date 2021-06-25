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
        $data['categoriesWithVipAdv'] = Category::with('advertisesVipAndActive')->where('is_active', 1)->whereHas('advertises', function ($q) {
            $q->where('status', 1);
            $q->where('adv_type', 3);
            $q->where(function ($q2) {
                $q2->whereNull('expired_at');
                $q2->orWhere('expired_at', '>=', date('Y-m-d') . ' 23:59:59');
            });
        })->get();
//        $data['featured_adv'] = Advertise::getAll([
//            'with' => ['category'],
//            'status' => 1,
//            'is_featured' => 1,
//        ]);
        $data['random_adv'] = [];
//            Advertise::getAll([
//            'with' => ['category'],
//            'status' => 1,
//            'is_featured' => 0,
//            'getRandom' => 8,
//        ]);
        return view('front/home', $data);
    }
}
