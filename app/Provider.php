<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public static function getByName($name)
    {
        return self::where('name', $name)->with('social')->first();
    }

    // Relations
    public function social()
    {
        return $this->hasMany(Social::class, 'provider_id');
    }
}
