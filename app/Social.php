<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id','name','link',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];

    /**
     *  Setup model event hooks
     */
//    public static function boot()
//    {
//        parent::boot();
//        self::creating(function ($model) {
//            $model->uuid = (string) \Webpatser\Uuid\Uuid::generate(config('vars.uuid_version'));
//        });
//    }

    /**
     *  Get One Resource By
     */
    public static function getOneBy($field, $value)
    {
        return self::where($field, $value)->first();
    }

    /**
     *  Get All Resource By
     */
    public static function getAllBy($field, $value)
    {
        return self::where($field, $value)->get();
    }

    /**
     *  Provider Relation
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
