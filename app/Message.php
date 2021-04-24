<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table = 'message';
    protected $guarded = array('');

    /*
    * Change Route Key Name
    */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /*
    *  Setup model event hooks
    */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) \Webpatser\Uuid\Uuid::generate(config('vars.uuid_version'));
        });
    }

    public static function add($inputs)
    {
        return self::create($inputs);
    }

    public static function edit($inputs, $id)
    {
        return self::where('id', $id)->update($inputs);
    }

    public static function getAll($inputs = '', $all = false)
    {
        $data = self::where(function($q) use($inputs){
            if($inputs) {
                if(isset($inputs['un_seen']) && $inputs['un_seen']){
                    $q->where('seen', 0);
                }
            }
        });
        if($all){
            $data = $data->get()->toArray();
        } else {
            $data = $data->paginate(50);
        }
        return $data;
    }

    public static function getById($id)
    {
        return self::where('id', $id)->first();
    }

    public static function getName($id)
    {
        return self::where('id', $id)->pluck('name');
    }

    public static function remove($id)
    {
        return self::where('id', $id)->delete();
    }
}
