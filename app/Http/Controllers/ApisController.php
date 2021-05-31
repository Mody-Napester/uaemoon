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

    public function listSliders()
    {
        $data['sliders'] = Slider::getAll();
        foreach ($data['sliders'] as $slider){
            $slider->image = url('public/images/slider/'. $slider->image);
        }
        return response()->json($data['sliders']);
    }

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

    public function listCategoryAds($uuid)
    {
        $data['category'] = Category::getOneBy('uuid', $uuid);
        $data['ads'] = Advertise::where('status', 1)->where('category_id', $data['category']->id)->get();
        foreach ($data['ads'] as $ad){
            $ad->cover = url($ad->cover);;
            $ad->images = url($ad->images);;
        }
        return response()->json($data['ads']);
    }

    public function listAds()
    {
        $data['ads'] = Advertise::where('status', 1)->get();
        foreach ($data['ads'] as $ad){
            $ad->cover = url($ad->cover);

            $images = explode(',', $ad->images);

            foreach ($images as $key => $image){
                $images[$key] = ['url' => url($image)];
            }

//            $ad->images = json_encode($images);
            $ad->images = $images;
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

        $data['privacy']->name = getFromJson($data['privacy']->name, lang());
        $data['privacy']->details = getFromJson($data['privacy']->details, lang());
        $data['privacy']->picture = url('public/images/page/picture/'. $data['privacy']->picture);
        $data['privacy']->cover = url('public/images/page/cover/'. $data['privacy']->cover);

        return response($data['privacy']);
    }

    public function showTermsPage()
    {
        $data['terms'] = Page::where('is_terms_page', 1)->orderBy('id', 'desc')->first();

        $data['terms']->name = getFromJson($data['terms']->name, lang());
        $data['terms']->details = getFromJson($data['terms']->details, lang());
        $data['terms']->picture = url('public/images/page/picture/'. $data['terms']->picture);
        $data['terms']->cover = url('public/images/page/cover/'. $data['terms']->cover);

        return response($data['terms']);
    }

    public function showUser($uuid)
    {
        $data['user'] = User::getOneBy('uuid', $uuid);
        return response($data['user']);
    }

    public function showUserAds($uuid)
    {
        $data['user'] = User::getOneBy('uuid', $uuid);
        $data['ads'] = Advertise::getAllBy('created_by', $data['user']->id);
        foreach ($data['ads'] as $ad){
            if($ad->status == 0){$ad->status_text = 'Pending';$ad->bg = 'primary';}
            elseif ($ad->status == 1){$ad->status_text = 'Approved';$ad->bg = 'success';}
            elseif ($ad->status == 2){$ad->status_text = 'Not Approved';$ad->bg = 'warning';}
            elseif ($ad->status == 3){$ad->status_text = 'Expired';$ad->bg = 'danger';}

            $ad->cover = url($ad->cover);
            $ad->images = url($ad->images);
        }
        return response($data['ads']);
    }

    public function uploadImage(Request $request)
    {
        return $request;

        $resource = [];

        if ($request->hasFile('image')) {
            $upload = upload_file('image', $request->file('image'), 'public/images/inserts/image');
            if ($upload['status'] == true) {
                $image = 'public/images/inserts/image/' . $upload['filename'];
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

//        $cover = '';
//        $all_images = array();
//        if ($request->hasFile('cover')) {
//            $upload = upload_file('image', $request->file('cover'), 'public/images/inserts/cover');
//            if ($upload['status'] == true) {
//                $cover = 'public/images/inserts/cover/' . $upload['filename'];
//            }
//        }
//        if ($images = $request->file('images')) {
//            foreach ($images as $index => $image) {
//                $upload = upload_file('image', $image, 'public/images/inserts/image');
//                if ($upload['status'] == true) {
//                    $all_images[] = 'public/images/inserts/image/' . $upload['filename'];
//                }
//            }
//        }

        if ($request->hasFile('image')) {
            $upload = upload_file('image', $request->file('image'), 'public/images/inserts/image');
            if ($upload['status'] == true) {
                $image = 'public/images/inserts/image/' . $upload['filename'];
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
            'cover' => $image,
            'images' => $image, // implode(',', $all_images)
            'status' => 0,
            'created_by' => $data['user']->id,
        ]);

        if($resource){
            $resource->status = 1;
        }else{
            $resource->status = 0;
        }

        return response()->json($resource);
    }


}
