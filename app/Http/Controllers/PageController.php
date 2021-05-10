<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index()
    {
        // Check Authority
        if (!check_authority('list.page')) {
            return redirect('/');
        }

        $data['resources'] = Page::orderBy('order')->paginate(config('vars.pagination'));
        return view('page.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.page')) {
            return redirect('/');
        }

        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return String
     */
    public function store(Request $request)
    {
        // Check Authority
        if (!check_authority('store.page')) {
            return redirect('/');
        }

        // Validation
        $rules = [
//            'picture' => 'required',
//            'cover' => 'required',
            'is_active' => 'required',
            'order' => 'required',
        ];
        // Code
        $name = [];
        $details = [];
        foreach (langs("short_name") as $lang) {
            $rules['name_' . $lang] = 'required';
            $rules['details_' . $lang] = 'required';

            $name[$lang] = $request->input('name_' . $lang);
            $details[$lang] = $request->input('details_' . $lang);
        }

        $request->validate($rules);

        if ($request->hasFile('picture')) {
            $upload = upload_file('image', $request->file('picture'), 'public/images/page/picture');
            if ($upload['status'] == true) {
                $picture = $upload['filename'];
            } else {
                return back()->with('message', [
                    'type' => 'danger',
                    'text' => 'Image ' . $upload['message']
                ]);
            }
        }

        if ($request->hasFile('cover')) {
            $upload = upload_file('image', $request->file('cover'), 'public/images/page/cover');
            if ($upload['status'] == true) {
                $cover = $upload['filename'];
            } else {
                return back()->with('message', [
                    'type' => 'danger',
                    'text' => 'Image ' . $upload['message']
                ]);
            }
        }

//        if ((isset($request->is_privacy_page))) {
//            Page::editAll([
//                'is_privacy_page' => 0
//            ]);
//        }
//        if ((isset($request->is_terms_page))) {
//            Page::editAll([
//                'is_terms_page' => 0
//            ]);
//        }
        $resource = Page::create([
            'slug' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'details' => json_encode($details),
            'picture' => (isset($picture)) ? $picture : '',
            'cover' => (isset($cover)) ? $cover : '',
            'is_active' => ($request->is_active == 1) ? 1 : 0,
            'in_menu' => (isset($request->in_menu)) ? 1 : 0,
            'in_footer' => (isset($request->in_footer)) ? 1 : 0,
            'is_privacy_page' => (isset($request->is_privacy_page)) ? 1 : 0,
            'is_terms_page' => (isset($request->is_terms_page)) ? 1 : 0,
            'order' => $request->order,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if ($resource) {
            return redirect(route('page.index'))->with('message', [
                'type' => 'success',
                'text' => 'Created successfully'
            ]);
        } else {
            return back()->with('message', [
                'type' => 'error',
                'text' => 'Error!, Please try again.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Page $page
     * @return String
     */
    public function edit(Page $page)
    {
        // Check Authority
        if (!check_authority('edit.page')) {
            return redirect('/');
        }

        $data['resource'] = $page;
        return view('page.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return String
     */
    public function update(Request $request, Page $page)
    {
        // Check Authority
        if (!check_authority('update.page')) {
            return redirect('/');
        }

        $data['resource'] = $page;

        // Return
        if (!$data['resource']) {
            return redirect()->back()->with('message', [
                'type' => 'danger',
                'text' => 'Sorry! not exists.'
            ]);
        }

        $rules = [
//            'picture' => 'required',
//            'cover' => 'required',
            'is_active' => 'required',
            'order' => 'required',
        ];
        // Code
        $name = [];
        $details = [];
        foreach (langs("short_name") as $lang) {
            $rules['name_' . $lang] = 'required';
            $rules['details_' . $lang] = 'required';

            $name[$lang] = $request->input('name_' . $lang);
            $details[$lang] = $request->input('details_' . $lang);
        }

        $request->validate($rules);

        if ($request->hasFile('picture')) {
            $upload = upload_file('image', $request->file('picture'), 'public/images/page/picture');
            if ($upload['status'] == true) {
                $picture = $upload['filename'];
            } else {
                return back()->with('message', [
                    'type' => 'danger',
                    'text' => 'Image ' . $upload['message']
                ]);
            }
        }

        if ($request->hasFile('cover')) {
            $upload = upload_file('image', $request->file('cover'), 'public/images/page/cover');
            if ($upload['status'] == true) {
                $cover = $upload['filename'];
            } else {
                return back()->with('message', [
                    'type' => 'danger',
                    'text' => 'Image ' . $upload['message']
                ]);
            }
        }
//        if (isset($request->is_privacy_page)) {
//            Page::editAll([
//                'is_privacy_page' => 0
//            ]);
//        }
//        if (isset($request->is_terms_page)) {
//            Page::editAll([
//                'is_terms_page' => 0
//            ]);
//        }
        $resource = $data['resource']->update([
            'slug' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'details' => json_encode($details),
            'picture' => (isset($picture)) ? $picture : $data['resource']->picture,
            'cover' => (isset($cover)) ? $cover : $data['resource']->cover,
            'is_active' => ($request->is_active == 1) ? 1 : 0,
            'in_menu' => (isset($request->in_menu)) ? 1 : 0,
            'in_footer' => (isset($request->in_footer)) ? 1 : 0,
            'is_privacy_page' => (isset($request->is_privacy_page)) ? 1 : 0,
            'is_terms_page' => (isset($request->is_terms_page)) ? 1 : 0,
            'order' => $request->order,
            'updated_by' => auth()->user()->id,
        ]);
        // Return
        if ($resource) {
            return redirect(route('page.index'))->with('message', [
                'type' => 'success',
                'text' => 'Updated successfully'
            ]);
        } else {
            return back()->with('message', [
                'type' => 'error',
                'text' => 'Error!, Please try again.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Page $page
     * @return String
     */
    public function destroy(Page $page)
    {
        // Check Authority
        if (!check_authority('delete.page')) {
            return redirect('/');
        }

        $data['resource'] = $page;

        if ($data['resource']) {
            $data['resource']->delete();

            return redirect()->back()->with('message', [
                'type' => 'success',
                'text' => 'Deleted Successfully.'
            ]);
        } else {
            return redirect()->back()->with('message', [
                'type' => 'danger',
                'text' => 'Sorry! not exists.'
            ]);
        }
    }
}
