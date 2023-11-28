<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use Request;
class Country extends Model
{
    use HasFactory;

    protected $guard = [];

    static public function getRecord($request)
    {
        $return = self::select('countries.*', 'regions.region_name')
        ->join('regions','regions.id', '=','countries.regions_id')
        ->orderBy('id', 'desc');

        if(!empty(Request::get('id')))
        {
        $return = $return->where('countries.id', '=', Request::get('id').'%');
        }
        if(!empty(Request::get('country_name')))
        {
        $return = $return->where('countries.country_name','like','%' .Request::get('country_name'));
        }
        if(!empty(Request::get('region_name')))
        {
        $return = $return->where('regions.region_name','like','%' .Request::get('region_name'));
        }
        if(!empty(Request::get('start_date')) && !empty(Request::get('end_date')))
        {
        $return = $return->where('countries.created_at', '>=', Request::get('start_date'))
        ->where('countries.created_at', '<=', Request::get('end_date'));
        }
        $return = $return->paginate(5);

        return $return;
    }
    public function get_region_name()
    {
        return $this->belongsTo(Region::class,'regions_id');
    }
}
