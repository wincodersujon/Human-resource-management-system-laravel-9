<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Manager extends Model
{
    use HasFactory;
    protected $guard = [];

    static public function getRecord($request)
    {
        $return = self::select('managers.*')->orderBy('managers.id', 'desc');

        if (!empty(Request::get('id'))) {
            $return = $return->where('managers.id', '=', Request::get('id') . '%');
        }
        if (!empty(Request::get('manager_name'))) {
            $return = $return->where('managers.manager_name', 'like', '%' . Request::get('manager_name'));
        }
        if (!empty(Request::get('created_at'))) {
            $return = $return->where('managers.created_at', 'like', '%' . Request::get('created_at') . '%');
        }
        if (!empty(Request::get('updated_at'))) {
            $return = $return->where('managers.updated_at', 'like', '%' . Request::get('updated_at') . '%');
        }
        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('managers.created_at', '>=', Request::get('start_date'))->where('managers.created_at', '<=', Request::get('end_date'));
        }
        $return = $return->paginate(5);
        return $return;
    }
}
