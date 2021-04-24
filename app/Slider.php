<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    protected $table = 'slider';
    protected $guarded = array('');

    /**
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
        return self::where('uuid', $id)->update($inputs);
    }

    public static function getAll()
    {
        return self::orderBy('order')->get();
    }

    public static function getById($id)
    {
        return self::where('id', $id)->first();
    }

    public static function getByUuid($id)
    {
        return self::where('uuid', $id)->first();
    }

    public static function getName($id)
    {
        return self::where('uuid', $id)->pluck('name');
    }

    public static function remove($id)
    {
        return self::where('uuid', $id)->delete();
    }
}
