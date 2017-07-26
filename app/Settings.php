<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function __($alias)
    {
        static $list;

        if (!isset($list)) {
            $list = self::getList();
            if ($list) {
                $list = array_pluck($list, 'value', 'key');
            }
        }

        return $list[$alias] ?? $alias;
    }

    protected static function getList()
    {
        return Settings::all();
    }
}
