<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'details', 'picture', 'cover', 'is_active', 'in_menu', 'in_footer'
        , 'is_privacy_page', 'is_terms_page', 'order', 'created_by', 'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];

    /*
     * Change Route Key Name
     * */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /*
     * Scope Active
     * */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)\Webpatser\Uuid\Uuid::generate(config('vars.uuid_version'));
        });
    }

    public static function getAll($inputs = [])
    {
        $data = self::whereRaw('1=1');
        if (isset($inputs['slug']) && $inputs['slug']) {
            $data = $data->where('slug', $inputs['slug']);
        }
        if (isset($inputs['is_active'])) {
            $data = $data->where('is_active', $inputs['is_active']);
        }
        if (isset($inputs['in_menu'])) {
            $data = $data->where('in_menu', $inputs['in_menu']);
        }
        if (isset($inputs['in_footer'])) {
            $data = $data->where('in_footer', $inputs['in_footer']);
        }
        if (isset($inputs['is_privacy_page'])) {
            $data = $data->where('is_privacy_page', $inputs['is_privacy_page']);
        }
        if (isset($inputs['is_terms_page'])) {
            $data = $data->where('is_terms_page', $inputs['is_terms_page']);
        }
        $data = $data->orderBy('order');
        if (isset($inputs['getFirst'])) {
            $data = $data->first();
        } else {
            $data = $data->get();
        }
        return $data;
    }

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

    public static function editAll($inputs = [])
    {
        return self::whereRaw('1=1')->update($inputs);
    }

    /**
     *  Created By Relation
     */
    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     *  Updated By Relation
     */
    public function updated_by_user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
