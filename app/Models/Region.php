<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Region extends Model
{
    use HasFactory;

    protected $guard = [];

    static public function getRecord($request)
    {
        $return = self::select('regions.*');

        if(!empty(Request::get('id')))
        {
        $return = $return->where('regions.id', '=', Request::get('id').'%');
        }
        if(!empty(Request::get('region_name')))
        {
        $return = $return->where('regions.region_name','like','%' .Request::get('region_name'));
        }
        $return = $return->orderBy('id', 'desc')
        ->paginate(5);

        return $return;
    }
}
