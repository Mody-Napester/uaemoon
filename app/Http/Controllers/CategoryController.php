<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index()
    {
        // Check Authority
        if (!check_authority('list.category')) {
            return redirect('/');
        }

        $data['resources'] = Category::orderBy('order')->paginate(config('vars.pagination'));
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.category')) {
            return redirect('/');
        }

        $data['parents'] = Category::getAllBy('parent_id', 0);
        return view('category.create', $data);
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
        if (!check_authority('store.category')) {
            return redirect('/');
        }

        // Validation
        $rules = [
//            'parent_id' => 'required',
//            'icon' => 'required',
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
//            $rules['details_' . $lang] = 'required';

            $name[$lang] = $request->input('name_' . $lang);
            $details[$lang] = $request->input('details_' . $lang);
        }

        $request->validate($rules);

        if ($request->hasFile('picture')) {
            $upload = upload_file('image', $request->file('picture'), 'public/images/category/picture');
            if ($upload['status'] == true) {
                $picture = $upload['filename'];
            } else {
                return back()->with('message', [
                    'type' => 'danger',
                    'text' => 'Image ' . $upload['message']
                ]);
            }
        }

        if ($request->parent_id) {
            $parent = (Category::getOneBy('uuid', $request->parent_id)) ? Category::getOneBy('uuid', $request->parent_id)->id : 0;
        } else {
            $parent = 0;
        }
        $resource = Category::create([
            'parent_id' => $parent,
            'slug' => Str::slug($name['en'], '-'),
            'name' => json_encode($name),
            'details' => json_encode($details),
//            'icon' => $request->icon,
            'picture' => (isset($picture)) ? $picture : '',
//            'cover' => (isset($cover)) ? $cover : '',
            'is_active' => ($request->is_active == 1) ? 1 : 0,
            'in_menu' => (isset($request->in_menu)) ? 1 : 0,
            'order' => $request->order,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if ($resource) {
            return redirect(route('category.index'))->with('message', [
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
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return String
     */
    public function edit(Category $category)
    {
        // Check Authority
        if (!check_authority('edit.category')) {
            return redirect('/');
        }

        $data['resource'] = $category;
        $data['parents'] = Category::getAllBy('parent_id', 0);
        return view('category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return String
     */
    public function update(Request $request, Category $category)
    {
        // Check Authority
        if (!check_authority('update.category')) {
            return redirect('/');
        }

        $data['resource'] = $category;

        // Return
        if (!$category) {
            return redirect()->back()->with('message', [
                'type' => 'danger',
                'text' => 'Sorry! not exists.'
            ]);
        }

        $rules = [
//            'parent_id' => 'required',
//            'icon' => 'required',
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
//            $rules['details_' . $lang] = 'required';

            $name[$lang] = $request->input('name_' . $lang);
            $details[$lang] = $request->input('details_' . $lang);
        }

        $request->validate($rules);
        $resource = Category::getOneBy('id', $category->id);

        if ($request->hasFile('picture')) {
            if(file_exists(public_path('images/category/picture/' . $resource->picture))) {
                unlink(public_path('images/category/picture/' . $resource->picture));
            }
            $upload = upload_file('image', $request->file('picture'), 'public/images/category/picture');
            if ($upload['status'] == true) {
                $picture = $upload['filename'];
            } else {
                return back()->with('message', [
                    'type' => 'danger',
                    'text' => 'Image ' . $upload['message']
                ]);
            }
        }

        if ($request->parent_id) {
            $parent = (Category::getOneBy('uuid', $request->parent_id)) ? Category::getOneBy('uuid', $request->parent_id)->id : 0;
        } else {
            $parent = 0;
        }
        $resource = $data['resource']->update([
            'parent_id' => $parent,
            'slug' => Str::slug($name['en'], '-'),
            'name' => json_encode($name),
            'details' => json_encode($details),
//            'icon' => $request->icon,
            'picture' => (isset($picture)) ? $picture : $data['resource']->picture,
//            'cover' => (isset($cover)) ? $cover : $data['resource']->cover,
            'is_active' => ($request->is_active == 1) ? 1 : 0,
            'in_menu' => (isset($request->in_menu)) ? 1 : 0,
            'order' => $request->order,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if ($resource) {
            return redirect(route('category.index'))->with('message', [
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
     * @param \App\Category $category
     * @return String
     */
    public function destroy(Category $category)
    {
        // Check Authority
        if (!check_authority('delete.category')) {
            return redirect('/');
        }

        $data['resource'] = $category;

        if ($data['resource']) {
            if(file_exists(public_path('images/category/picture/' . $category->picture))) {
                unlink(public_path('images/category/picture/' . $category->picture));
            }
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
