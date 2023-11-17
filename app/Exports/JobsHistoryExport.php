<?php

namespace App\Exports;

use App\Models\JobsHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class JobsHistoryExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{

    public function collection()
    {
        $request = Request::all();
        return JobsHistory::getRecord($request);
    }
    protected $index = 0;

    public function map($user): array{
    $startDate = date('d-m-Y', strtotime($user->start_date));
    $endtDate = date('d-m-Y', strtotime($user->end_date));
    $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
    if($user->department_id == 1){
        $department = 'Designer Department';
    }else{
        $department = 'Developer Department';
    }

        return [
            $user->id,
            $user->name . ' ' . $user->last_name,
            $startDate,
            $endtDate,
            $user->job_title,
            $department,
            $createdAtFormat
        ];
    }
    public function headings (): array
    {
        return [
            'Table ID',
            'Employee Name',
            'Start Date',
            'End Date',
            'Job Title',
            'Department ID',
            'Created At'
        ];
    }
}
