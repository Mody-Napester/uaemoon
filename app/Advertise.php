<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $guarded = [''];
    protected $table = 'advertise';

    protected $fillable = [
        'category_id',
        'slug',
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
        'cover',
        'images',
        'status',
        'is_featured',
        'approved_at',
        'not_approved_at',
        'not_approved_reason',
        'expired_at',
        'created_by',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        '',
//    ];

    /*
     * Change Route Key Name
     * */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /*
     * Scope pending
     * */
    public function scopePending($query)
    {
        return $query->where('status', 0);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 1);
    }

    public function scopeNotApproved($query)
    {
        return $query->where('status', 2);
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 3);
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
        if (isset($inputs['with']) && $inputs['with']) {
            $data = $data->with($inputs['with']);
        }
        if (isset($inputs['slug']) && $inputs['slug']) {
            $data = $data->where('slug', $inputs['slug']);
        }
        if (isset($inputs['category_id']) && $inputs['category_id']) {
            $data = $data->where('category_id', $inputs['category_id']);
        }
        if (isset($inputs['status'])) {
            $data = $data->where('status', $inputs['status']);
        }
        if (isset($inputs['is_featured'])) {
            $data = $data->where('is_featured', $inputs['is_featured']);
        }
        if (isset($inputs['getFirst'])) {
            $data = $data->first();
        } elseif (isset($inputs['getRandom'])) {
            $data = $data->orderByRaw("RAND()")->limit($inputs['getRandom'])->get();
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
        return self::with('category')->where($field, $value)->first();
    }

    /**
     *  Get All Resource By
     */
    public static function getAllBy($field, $value)
    {
        return self::where($field, $value)->get();
    }

    /**
     *  Created By Relation
     */
    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
