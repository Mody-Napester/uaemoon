<?php

namespace App\Http\Controllers;

use App\Settings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    function __construct()
    {
//        $this->middleware('auth');
    }

    public function editSettings()
    {
        // Check Authority
        if (!check_authority('list.settings')) {
            return redirect('/');
        }
        $data['settings'] = Settings::getById(1);
        return view('settings/add', $data);
    }

    public function editSettingsHomeSeo()
    {
        // Check Authority
        if (!check_authority('list.home_seo')) {
            return redirect('/');
        }
        $data['settings'] = Settings::getById(1);
        return view('settings/home_seo', $data);
    }

    public function editSettingsAboutSeo()
    {
        // Check Authority
        if (!check_authority('list.about_seo')) {
            return redirect('/');
        }
        $data['settings'] = Settings::getById(1);
        return view('settings/about_seo', $data);
    }

    public function editSettingsAboutUs()
    {
        // Check Authority
        if (!check_authority('list.about_us')) {
            return redirect('/');
        }
        $data['settings'] = Settings::getById(1);
        return view('settings/about_us', $data);
    }

    public function editSettingsContactSeo()
    {
        // Check Authority
        if (!check_authority('list.contact_seo')) {
            return redirect('/');
        }
        $data['settings'] = Settings::getById(1);
        return view('settings/contact_seo', $data);
    }

    public function editSettingsContactUs()
    {
        // Check Authority
        if (!check_authority('list.contact_us')) {
            return redirect('/');
        }
        $data['settings'] = Settings::getById(1);
        return view('settings/contact_us', $data);
    }

    public function updateSettings(Request $request)
    {
        try {
            $inputs = $request->except('_token');
            if ($request->hasFile('logo_en')) {
                $upload = upload_file('image', $request->file('logo_en'), 'public/images/settings');
                if ($upload['status'] == true) {
                    $inputs['logo_en'] = $upload['filename'];
                } else {
                    return back()->with('message', [
                        'type' => 'danger',
                        'text' => 'Image ' . $upload['message']
                    ]);
                }
            }
            if ($request->hasFile('logo_ar')) {
                $upload = upload_file('image', $request->file('logo_ar'), 'public/images/settings');
                if ($upload['status'] == true) {
                    $inputs['logo_ar'] = $upload['filename'];
                } else {
                    return back()->with('message', [
                        'type' => 'danger',
                        'text' => 'Image ' . $upload['message']
                    ]);
                }
            }
            if ($request->hasFile('about_us_image')) {
                $upload = upload_file('image', $request->file('about_us_image'), 'public/images/settings');
                if ($upload['status'] == true) {
                    $inputs['about_us_image'] = $upload['filename'];
                } else {
                    return back()->with('message', [
                        'type' => 'danger',
                        'text' => 'Image ' . $upload['message']
                    ]);
                }
            }
            if ($request->hasFile('contact_us_image')) {
                $upload = upload_file('image', $request->file('contact_us_image'), 'public/images/settings');
                if ($upload['status'] == true) {
                    $inputs['contact_us_image'] = $upload['filename'];
                } else {
                    return back()->with('message', [
                        'type' => 'danger',
                        'text' => 'Image ' . $upload['message']
                    ]);
                }
            }
            if ($request->hasFile('footer_image_ar')) {
                $upload = upload_file('image', $request->file('footer_image_ar'), 'public/images/settings');
                if ($upload['status'] == true) {
                    $inputs['footer_image_ar'] = $upload['filename'];
                } else {
                    return back()->with('message', [
                        'type' => 'danger',
                        'text' => 'Image ' . $upload['message']
                    ]);
                }
            }
            if ($request->hasFile('footer_image_en')) {
                $upload = upload_file('image', $request->file('footer_image_en'), 'public/images/settings');
                if ($upload['status'] == true) {
                    $inputs['footer_image_en'] = $upload['filename'];
                } else {
                    return back()->with('message', [
                        'type' => 'danger',
                        'text' => 'Image ' . $upload['message']
                    ]);
                }
            }
            Settings::edit($inputs, 1);
            return back()->with('message', [
                'type' => 'success',
                'text' => 'Updated successfully'
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->with('message', [
                'type' => 'error',
                'text' => 'Error!, Please try again.'
            ]);
        }
    }
}
