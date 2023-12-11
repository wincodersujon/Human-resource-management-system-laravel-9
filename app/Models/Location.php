<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class Location extends Model
{
    use HasFactory;

    protected $guard = [];

    static public function getRecord($request)
    {
        $return = self::select('locations.*', 'countries.country_name')
        ->join('countries','countries.id', '=','locations.countries_id')
        ->orderBy('id', 'desc');

        if(!empty(Request::get('id')))
        {
        $return = $return->where('locations.id', '=', Request::get('id').'%');
        }
        if(!empty(Request::get('street_address')))
        {
        $return = $return->where('locations.street_address','like','%' .Request::get('street_address'));
        }
        if(!empty(Request::get('postal_code')))
        {
        $return = $return->where('locations.postal_code','like','%' .Request::get('postal_code'));
        }
        if(!empty(Request::get('city')))
        {
        $return = $return->where('locations.city','=', Request::get('city'));
        }
        if(!empty(Request::get('state_provice')))
        {
        $return = $return->where('locations.state_provice','=',Request::get('state_provice'));
        }
        if(!empty(Request::get('country_name')))
        {
        $return = $return->where('countries.country_name','like','%' .Request::get('country_name'));
        }
        if(!empty(Request::get('created_at')))
        {
        $return = $return->where('locations.created_at','like','%' .Request::get('created_at').'%');
        }
        if(!empty(Request::get('updated_at')))
        {
        $return = $return->where('locations.updated_at','like','%' .Request::get('updated_at').'%');
        }
        if(!empty(Request::get('start_date')) && !empty(Request::get('end_date')))
        {
        $return = $return->where('locations.created_at','>=',Request::get('start_date'))->where('locations.created_at','<=',Request::get('end_date'));
        }

        $return = $return->paginate(5);
        return $return;

    }

}
