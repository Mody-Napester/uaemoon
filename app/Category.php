<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id','slug','name','details','icon','picture','cover','is_active','in_menu','order','created_by','updated_by',
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
            $model->uuid = (string) \Webpatser\Uuid\Uuid::generate(config('vars.uuid_version'));
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
     *  Get One Active Resource By
     */
    public static function getOneActiveBy($field, $value)
    {
        return self::where($field, $value)->active()->first();
    }

    /**
     *  Get All Resource By
     */
    public static function getAllBy($field, $value)
    {
        return self::where($field, $value)->get();
    }

    /**
     *  Get All Active Resource By
     */
    public static function getAllActiveBy($field, $value)
    {
        return self::where($field, $value)->active()->get();
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

    /**
     *  Child Relation
     */
    public function child()
    {
        return $this->belongsTo(Category::class, 'id', 'parent_id');
    }

    /**
     *  Advertise Relation
     */
    public function advertises()
    {
        return $this->hasMany(Advertise::class, 'category_id');
    }
}
