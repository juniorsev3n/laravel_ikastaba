<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    public static function getHome($take = 3)
    {
    	return self::where('status',1)->where('is_home',1)->take($take);
    }
}
