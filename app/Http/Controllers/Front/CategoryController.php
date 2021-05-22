<?php

namespace App\Http\Controllers\Front;

use App\Advertise;
use App\Category;
use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth.front');
    }

    public function show(Request $request)
    {
        $data['resource'] = Category::getOneBy('uuid', $request->uuid);
        return view('front/category/show', $data);
    }
}
