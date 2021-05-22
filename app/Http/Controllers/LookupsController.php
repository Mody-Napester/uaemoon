<?php

namespace App\Http\Controllers;

use App\Lookup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LookupsController extends Controller
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
    public function index(){
        // Check Authority
        if (!check_authority('list.lookups')){
            return redirect('/');
        }

        $data['resources'] = Lookup::with('child')->where('parent_id', 0)->get();
        return view('lookup.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('add.lookups')){
            return redirect('/');
        }

        $data['parents'] = Lookup::getAllBy('parent_id', 0);
        return view('lookup.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function store(Request $request)
    {
        // Check Authority
        if (!check_authority('add.lookups')){
            return redirect('/');
        }

        // Validation
        $rules = [
            'parent_id' => 'required',
            'is_active' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['name_' . $lang] = 'required|unique:lookups,name';
        }

        $request->validate($rules);

        // Code
        $name = [];

        foreach (langs("short_name") as $lang) {
            $name[$lang] = $request->input('name_' . $lang);
        }

        $parent = (Lookup::getOneBy('uuid', $request->parent_id))? Lookup::getOneBy('uuid', $request->parent_id)->id : 0;
        $resource = Lookup::create([
            'parent_id' => $parent,
            'key' => Str::slug($name['en'], '-'),
            'name' => json_encode($name),
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('lookup.index'))->with('message', [
                'type' => 'success',
                'text' => 'Created successfully'
            ]);
        }else{
            return back()->with('message', [
                'type' => 'error',
                'text' => 'Error!, Please try again.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookup  $lookup
     * @return \Illuminate\Http\Response
     */
    public function show(Lookup $lookup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lookup  $lookup
     * @return String
     */
    public function edit(Lookup $lookup)
    {
        // Check Authority
        if (!check_authority('edit.lookups')){
            return redirect('/');
        }

        $data['resource'] = $lookup;
        $data['parents'] = Lookup::getAllBy('parent_id', 0);
        return view('lookup.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookup  $lookup
     * @return String
     */
    public function update(Request $request, Lookup $lookup)
    {
        // Check Authority
        if (!check_authority('edit.lookups')){
            return redirect('/');
        }

        $data['resource'] = $lookup;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

        $rules = [
            'parent_id' => 'required',
            'is_active' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['name_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $name = [];

        foreach (langs("short_name") as $lang) {
            $name[$lang] = $request->input('name_' . $lang);
        }

        $parent = (Lookup::getOneBy('uuid', $request->parent_id))? Lookup::getOneBy('uuid', $request->parent_id)->id : 0;

        $resource = $data['resource']->update([
            'parent_id' => $parent,
            'key' => Str::slug($name['en'], '-'),
            'name' => json_encode($name),
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('lookup.index'))->with('message', [
                'type' => 'success',
                'text' => 'Updated successfully'
            ]);
        }else{
            return back()->with('message', [
                'type' => 'error',
                'text' => 'Error!, Please try again.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookup  $lookup
     * @return String
     */
    public function destroy(Lookup $lookup)
    {
        // Check Authority
        if (!check_authority('delete.lookups')){
            return redirect('/');
        }

        $data['resource'] = $lookup;

        if($data['resource']){
            $data['resource']->delete();

            return redirect()->back()->with('message',[
                'type'=>'success',
                'text'=>'Deleted Successfully.'
            ]);
        }else{
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }
    }
}
