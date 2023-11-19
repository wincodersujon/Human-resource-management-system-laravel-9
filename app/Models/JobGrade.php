<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobGrade extends Model
{
    use HasFactory;
    protected $guard = [];

    static public function getRecord($request)
    {
        $return = self::select('job_grades.*');

        if(!empty(Request::get('id')))
        {
        $return = $return->where('job_grades.id', '=', Request::get('id').'%');
        }
        if(!empty(Request::get('grade_level')))
        {
        $return = $return->where('job_grades.grade_level','like','%' .Request::get('grade_level'));
        }
        if(!empty(Request::get('lowest_salary')))
        {
        $return = $return->where('job_grades.lowest_salary','like','%' .Request::get('lowest_salary'));
        }
        if(!empty(Request::get('highest_salary')))
        {
        $return = $return->where('job_grades.highest_salary','like','%' .Request::get('highest_salary'));
        }
        if(!empty(Request::get('created_at')))
        {
        $return = $return->where('job_grades.created_at','like','%' .Request::get('created_at'));
        }
        if(!empty(Request::get('updated_at')))
        {
        $return = $return->where('job_grades.updated_at','like','%' .Request::get('updated_at'));
        }
        $return = $return->orderBy('id', 'desc')
        ->paginate(5);

        return $return;
    }
}
