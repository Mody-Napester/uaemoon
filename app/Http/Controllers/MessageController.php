<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    function __construct()
    {
//        $this->middleware('auth');
    }

    public function listMessage()
    {
        if (!$this->user->hasAccess('message.list') && !$this->user->hasAccess('admin')) {
            Flash::error('You don\'t have a permission to do this action');
            return Redirect::back();
        }
        $inputs = Input::except('_token');
        $data['message'] = Message::getAll($inputs);
        return View::make('message/list', $data);
    }

    public function deleteMessage($id)
    {
        if (!$this->user->hasAccess('message.delete') && !$this->user->hasAccess('admin')) {
            Flash::error('You don\'t have a permission to do this action');
            return Redirect::back();
        }
        Message::remove($id);
        return Redirect::route('listMessage');
    }

    public function statusMessage($id)
    {
        if (!$this->user->hasAccess('message.read') && !$this->user->hasAccess('admin')) {
            Flash::error('You don\'t have a permission to do this action');
            return Redirect::back();
        }
        Message::edit(array(
            'seen' => 1
        ), $id);
        Flash::success('Updated Successfully');
        return Redirect::route('listMessage');
    }
}
