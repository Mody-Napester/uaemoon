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
        'parent_id','slug','name','details','icon','picture','cover','is_active','created_by','updated_by',
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
     *  Products Relation
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category')->withTimestamps();
    }
}
