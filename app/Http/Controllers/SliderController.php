<?php


namespace App\Http\Controllers;

use App\Slider;
use Http\Client\Exception;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function listSlider()
    {
//        dd(session()->get('locale'), app()->getLocale());
        // Check Authority
        if (!check_authority('list.slider')) {
            return redirect('/');
        }
        $data['resources'] = Slider::getAll();
        return view('slider/list', $data);
    }

    public function addSlider()
    {
        // Check Authority
        if (!check_authority('create.slider')) {
            return redirect('/');
        }
        $data['resources'] = array(
            'image' => '',
        );
        return view('slider/add', $data);
    }

    public function createSlider(Request $request)
    {
        // Check Authority
        if (!check_authority('store.slider')) {
            return redirect('/');
        }
        // Validation
        $rules = [
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'order' => 'required',
        ];
        $request->validate($rules);

        try {
            if ($request->hasFile('image')) {
                $upload = upload_file('image', $request->file('image'), 'public/images/slider');
                if ($upload['status'] == true) {
                    $image = $upload['filename'];
                } else {
                    return back()->with('message', [
                        'type' => 'danger',
                        'text' => 'Image ' . $upload['message']
                    ]);
                }
            }
            $resource = Slider::create([
                'image' => (isset($image)) ? $image : '',
                'order' => $request->order,
                'created_by' => auth()->user()->id,
            ]);
            // Return
            if ($resource) {
                return redirect(route('listSlider'))->with('message', [
                    'type' => 'success',
                    'text' => 'Created successfully'
                ]);
            } else {
                return back()->with('message', [
                    'type' => 'error',
                    'text' => 'Error!, Please try again.'
                ]);
            }
        } catch (Exception $e) {
            return back()->with('message', [
                'type' => 'danger',
                'text' => 'Ops, try again later!'
            ])->withInput($request->all());
        }
    }

    public function editSlider($uuid)
    {
        // Check Authority
        if (!check_authority('edit.slider')) {
            return redirect('/');
        }
        $data['resources'] = Slider::getByUuid($uuid);
        return view('slider/add', $data);
    }

    public function updateSlider(Request $request, $uuid)
    {
        // Check Authority
        if (!check_authority('update.slider')) {
            return redirect('/');
        }
        // Validation
        $rules = [
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'order' => 'required',
        ];
        $request->validate($rules);
        try {
            $resource = Slider::getByUuid($uuid);
            if ($request->hasFile('image')) {
                if(file_exists(public_path('images/slider/' . $resource->image))) {
                    unlink(public_path('images/slider/' . $resource->image));
                }
                $upload = upload_file('image', $request->file('image'), 'public/images/slider');
                if ($upload['status'] == true) {
                    $image = $upload['filename'];
                } else {
                    return back()->with('message', [
                        'type' => 'danger',
                        'text' => 'Image ' . $upload['message']
                    ]);
                }
            }
            $resource->update([
                'image' => isset($image) ? $image : $resource->image,
                'order' => $request->order
            ]);
            return redirect(route('listSlider'))->with('message', [
                'type' => 'success',
                'text' => 'Updated successfully'
            ]);
        } catch (Exception $e) {
            return back()->with('message', [
                'type' => 'danger',
                'text' => 'Ops, try again later!'
            ])->withInput($request->all());
        }
    }

    public function deleteSlider($uuid)
    {
        // Check Authority
        if (!check_authority('delete.slider')) {
            return redirect('/');
        }
        $resource = Slider::getByUuid($uuid);
        if(file_exists(public_path('images/slider/' . $resource->image))) {
            unlink(public_path('images/slider/' . $resource->image));
        }
        Slider::remove($uuid);
        return redirect(route('listSlider'))->with('message', [
            'type' => 'success',
            'text' => 'Deleted successfully'
        ]);
    }

    public function updatedSliderOrder(Request $request)
    {
        Slider::where('uuid', $request->ref_id)->update([
            'order' => $request->order
        ]);
        return [];
    }
}
