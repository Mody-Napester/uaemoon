<?php

namespace App\Http\Controllers;

use App\Advertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdvertiseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        // Check Authority
        if (!check_authority('list.advertise')) {
            return redirect('/');
        }

        $data['resources'] = Advertise::with(['category', 'created_by_user'])->paginate(config('vars.pagination'));
        return view('advertise.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     */
    public function show(Request $request)
    {
        $data['resource'] = Advertise::getOneBy('uuid', $request->uuid);
        return view('advertise.show', $data);
    }

    public function approved(Request $request)
    {
        $advertise = Advertise::getOneBy('uuid', $request->uuid);
        $advertise->status = 1;
        $advertise->approved_at = date('Y-m-d H:i:s');
        $advertise->save();
        return redirect(route('advertise.list'))->with('message', [
            'type' => 'success',
            'text' => trans('advertise.approved_successfully')
        ]);
    }

    public function not_approved(Request $request)
    {
        $advertise = Advertise::getOneBy('uuid', $request->uuid);
        $advertise->status = 2;
        $advertise->not_approved_at = date('Y-m-d H:i:s');
        $advertise->save();
        return redirect(route('advertise.list'))->with('message', [
            'type' => 'success',
            'text' => trans('advertise.not_approved_successfully')
        ]);
    }
}
