<?php

namespace App\Http\Controllers\Front;

use App\Advertise;
use App\Category;
use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertiseController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth.front')->except(['show']);
    }

    public function add()
    {
        $data['settings'] = Settings::getById(1);
        $data['categories'] = Category::getAll([
            'is_active' => 1
        ]);
        return view('front/advertise/add', $data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'adv_type' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'cover' => 'required|mimes:jpeg,jpg,png,gif,webp|max:5000',
            'images' => 'required|max:10000',
        ]);
        $cover = '';
        $all_images = array();
        if ($request->hasFile('cover')) {
            $upload = upload_file('image', $request->file('cover'), 'public/images/inserts/cover');
            if ($upload['status'] == true) {
                $cover = 'public/images/inserts/cover/' . $upload['filename'];
            }
        }
        if ($images = $request->file('images')) {
            foreach ($images as $index => $image) {
                $upload = upload_file('image', $image, 'public/images/inserts/image');
                if ($upload['status'] == true) {
                    $all_images[] = 'public/images/inserts/image/' . $upload['filename'];
                }
            }
        }
        if ($request->category_id) {
            $category_id = (Category::getOneBy('uuid', $request->category_id)) ? Category::getOneBy('uuid', $request->category_id)->id : 0;
        } else {
            $category_id = 0;
        }
        $arrayData = [
            'adv_type' => $request->adv_type,
            'category_id' => $category_id,
            'slug' => Str::slug($request->title, '-'),
            'title_ar' => $request->title,
            'title_en' => $request->title,
            'details_ar' => $request->details,
            'details_en' => $request->details,
            'cover' => $cover,
            'images' => implode(',', $all_images),
            'status' => 1,
            'created_by' => auth()->user()->id,
            'url' => $request->youtube_url,
        ];
        if ($request->adv_type == 1) {
            $arrayData['expired_at'] = date('Y-m-d', strtotime(date('Y-m-d') . ' +' . config('vars.adv_type_expiration_days')[1] . ' days')) . ' 23:59:59';
        } elseif ($request->adv_type == 2) {
            $arrayData['expired_at'] = date('Y-m-d', strtotime(date('Y-m-d') . ' +' . config('vars.adv_type_expiration_days')[2] . ' days')) . ' 23:59:59';
        } elseif ($request->adv_type == 3) {
            $arrayData['expired_at'] = date('Y-m-d', strtotime(date('Y-m-d') . ' +' . config('vars.adv_type_expiration_days')[3] . ' days')) . ' 23:59:59';
        }
        $resource = Advertise::create($arrayData);
        // Return
        if ($resource) {
            return redirect(route('front.home.index'))->with('message', [
                'type' => 'success',
                'text' => trans('website.advertise_created_successfully')
            ]);
        } else {
            return back()->with('message', [
                'type' => 'error',
                'text' => trans('website.oops_try_again_later')
            ])->withInput($request->all());
        }
    }

    public function show(Request $request)
    {
        $data['resource'] = Advertise::getOneBy('uuid', $request->uuid);
        return view('front/advertise/show', $data);
    }
}
