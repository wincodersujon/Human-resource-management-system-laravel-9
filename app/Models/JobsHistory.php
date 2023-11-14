<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class JobsHistory extends Model
{
    use HasFactory;

    protected $guard = [];

    static public function getRecord($request)
    {
        $return = self::select('jobs_histories.*', 'users.name', 'jobs.job_title')
        ->join('users', 'users.id' ,'=', 'jobs_histories.employee_id' )
        ->join('jobs', 'jobs.id' ,'=', 'jobs_histories.job_id' )
        ->orderBy('jobs_histories.id', 'desc');

        if(!empty(Request::get('id')))
        {
        $return = $return->where('jobs_histories.id', '=', Request::get('id').'%');
        }
        if(!empty(Request::get('name')))
        {
        $return = $return->where('users.name','like','%' .Request::get('name'));
        }
        if(!empty(Request::get('start_date')))
        {
        $return = $return->where('jobs_histories.start_date','like','%' .Request::get('start_date'));
        }
        if(!empty(Request::get('end_date')))
        {
        $return = $return->where('jobs_histories.end_date','like','%' .Request::get('end_date'));
        }
        if(!empty(Request::get('job_title')))
        {
        $return = $return->where('jobs.job_title','like','%' .Request::get('job_title'));
        }

        $return = $return->paginate(10);
        return $return;

    }

    // If you want to show name in list then you will use this function in your blade.php file
    // job_history->list.blade.php
    public function get_user_name_single(){
        return $this->belongsTo(User::class, 'employee_id');
    }
    public function get_job_single(){
        return $this->belongsTo(Jobs::class, 'job_id');
    }
}
