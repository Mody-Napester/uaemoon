<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Category;
use App\Page;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ApisController extends Controller
{

    public function listSliders($lang)
    {
        $data['sliders'] = Slider::getAll();
        foreach ($data['sliders'] as $slider){
            $slider->image = url('public/images/slider/'. $slider->image);
        }
        return response()->json($data['sliders']);
    }

    public function listCategories($lang)
    {
        $data['categories'] = Category::where('is_active', 1)->get();
        foreach ($data['categories'] as $category){
            $category->name = getFromJson($category->name, $lang);
//            $category->details = getFromJson($category->details, 'en');

            $icon_full = explode('"', $category->icon);
            $icon = explode(" ", $icon_full[1]);
            $category->icon_fa = $icon[0];
            $category->icon = str_replace('fa-', '', $icon[1]);

            $category->picture = url('public/images/category/picture/'. $category->picture);
        }
        return response()->json($data['categories']);
    }

    public function showCategory($uuid, $lang)
    {
        $data['category'] = Category::getOneBy('uuid', $uuid);
        $data['category']->name = getFromJson($data['category']->name, $lang);
        return response()->json($data['category']);
    }

    public function listCategoryAds($lang, $uuid)
    {
        $data['category'] = Category::getOneBy('uuid', $uuid);
        if($data['category']){
            $data['ads'] = Advertise::where('status', 1)->where('category_id', $data['category']->id)->get();
            foreach ($data['ads'] as $ad){
                $ad->title_en = ($lang == 'ar')? $ad->title_ar : $ad->title_en;
                $ad->cover = url($ad->cover);
                if(strpos($ad->images, ',') !== false){
                    $images = explode(',', $ad->images);
                    foreach ($images as $key => $image){
                        $images[$key] = ['url' => url($image)];
                    }
                    $ad->images = $images;
                }else{
                    $images = [];
                    $images[0] = ['url' => url($ad->images)];
                    $images[1] = ['url' => url($ad->images)];
                    $ad->images = $images;
                }
            }
        }else{
            $data['ads'] = collect(new Advertise());
        }

        return response()->json($data['ads']);
    }

    public function listAds($lang)
    {
        $data['ads'] = Advertise::where('status', 1)->get();
        foreach ($data['ads'] as $ad){
            $ad->title_en = ($lang == 'ar')? $ad->title_ar : $ad->title_en;
            $ad->cover = url($ad->cover);

            if(strpos($ad->images, ',') !== false){
                $images = explode(',', $ad->images);
                foreach ($images as $key => $image){
                    $images[$key] = ['url' => url($image)];
                }
                $ad->images = $images;
            }else{
                $images = [];
                $images[0] = ['url' => url($ad->images)];
                $images[1] = ['url' => url($ad->images)];
                $ad->images = $images;
            }
        }
        return response($data['ads']);
    }

    public function showAd($lang, $uuid)
    {
        $data['ad'] = Category::getOneBy('uuid', $uuid);
        return response()->json($data['ad']);
    }

    public function showPrivacyPage($lang)
    {
        $data['privacy'] = Page::where('is_privacy_page', 1)->orderBy('id', 'desc')->first();

        $data['privacy']->name = getFromJson($data['privacy']->name, $lang);
        $data['privacy']->details = getFromJson($data['privacy']->details, $lang);
        $data['privacy']->picture = url('public/images/page/picture/'. $data['privacy']->picture);
        $data['privacy']->cover = url('public/images/page/cover/'. $data['privacy']->cover);

        return response($data['privacy']);
    }

    public function showTermsPage($lang)
    {
        $data['terms'] = Page::where('is_terms_page', 1)->orderBy('id', 'desc')->first();

        $data['terms']->name = getFromJson($data['terms']->name, $lang);
        $data['terms']->details = getFromJson($data['terms']->details, $lang);
        $data['terms']->picture = url('public/images/page/picture/'. $data['terms']->picture);
        $data['terms']->cover = url('public/images/page/cover/'. $data['terms']->cover);

        return response($data['terms']);
    }

    public function listPages($lang)
    {
        $data['pages'] = Page::all();

        foreach ($data['pages'] as $page){
            $page->name = getFromJson($page->name, $lang);
            $page->details = getFromJson($page->details, $lang);
            $page->picture = url('public/images/page/picture/'. $page->picture);
            $page->cover = url('public/images/page/cover/'. $page->cover);
        }

        return response($data['pages']);
    }

    public function showUser($uuid)
    {
        $data['user'] = User::getOneBy('uuid', $uuid);
        return response($data['user']);
    }

    public function showUserAds($lang, $uuid)
    {
        $data['user'] = User::getOneBy('uuid', $uuid);
        $data['ads'] = Advertise::getAllBy('created_by', $data['user']->id);
        foreach ($data['ads'] as $ad){
            $ad->title_en = ($lang == 'ar')? $ad->title_ar : $ad->title_en;
            if($ad->status == 0){$ad->status_text = 'Pending';$ad->bg = 'primary';}
            elseif ($ad->status == 1){$ad->status_text = 'Approved';$ad->bg = 'success';}
            elseif ($ad->status == 2){$ad->status_text = 'Not Approved';$ad->bg = 'warning';}
            elseif ($ad->status == 3){$ad->status_text = 'Expired';$ad->bg = 'danger';}

            $ad->cover = url($ad->cover);
            if(strpos($ad->images, ',') !== false){
                $images = explode(',', $ad->images);
                foreach ($images as $key => $image){
                    $images[$key] = ['url' => url($image)];
                }
                $ad->images = $images;
            }else{
                $images = [];
                $images[0] = ['url' => url($ad->images)];
                $images[1] = ['url' => url($ad->images)];
                $ad->images = $images;
            }
        }
        return response($data['ads']);
    }

    public function uploadImage(Request $request)
    {
//        $request->picture = json_decode($request->picture);
//        return $request->all();

        $resource = [];

        // Cover
        $cover = '';
        $upload = upload_file('image', $request->file('cover'), 'public/images/inserts/cover');
        if ($upload['status'] == true) {
            $cover = 'public/images/inserts/cover/' . $upload['filename'];
        }

        // Images
        $images = array();
        for ($i = 0; $i < $request->pictures_count ; $i++){
            $upload3 = upload_file('image', $request->file('picture_'.$i), 'public/images/inserts/image');
            if ($upload3['status'] == true) {
                $images[] = 'public/images/inserts/image/' . $upload3['filename'];
            }
        }

         if(isset($image)){
             $resource['image'] = $image;
             $resource['status'] = 1;
         }else{
             $resource['status'] = 0;
         }

        return response()->json($resource);
    }

    public function addUserInsert(Request $request, $uuid)
    {
        $data['user'] = User::getOneBy('uuid', $uuid);

        // Cover
        $cover = '';
        $upload = upload_file('image', $request->file('cover'), 'public/images/inserts/cover');
        if ($upload['status'] == true) {
            $cover = 'public/images/inserts/cover/' . $upload['filename'];
        }

        // Images
        $images = array();
        for ($i = 0; $i < $request->pictures_count ; $i++){
            $upload3 = upload_file('image', $request->file('picture_'.$i), 'public/images/inserts/image');
            if ($upload3['status'] == true) {
                $images[] = 'public/images/inserts/image/' . $upload3['filename'];
            }
        }

        if ($request->category) {
            $category_id = (Category::getOneBy('uuid', $request->category)) ? Category::getOneBy('uuid', $request->category)->id : 0;
        } else {
            $category_id = 0;
        }
        $resource = Advertise::create([
            'is_featured' => 0, // $request->is_vip
            'category_id' => $category_id,
            'slug' => Str::slug($request->title, '-'),
            'title_ar' => $request->title,
            'title_en' => $request->title,
            'details_ar' => $request->details,
            'details_en' => $request->details,
            'cover' => $cover,
            'images' => implode(',', $images),
            'status' => 0,
            'created_by' => $data['user']->id,
        ]);

        if($resource){
            $resource = 1;
        }else{
            $resource = 0;
        }

        return response()->json($resource);
    }


}
