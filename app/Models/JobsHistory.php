<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsHistory extends Model
{
    use HasFactory;

    protected $guard = [];

    static public function getRecord($request)
    {
        $return = self::select('jobs_histories.*')->orderBy('id', 'desc')->paginate(10);
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
