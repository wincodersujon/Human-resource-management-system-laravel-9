<?php

namespace App\Exports;

use App\Models\Manager;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class ManagersExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{


    public function collection()
    {
        $request = Request::all();
        return Manager::getRecord($request);
    }
    protected $index = 0;
    public function map($user): array
    {
        $CreatedAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        $UpdatedAtFormat = date('d-m-Y H:i A', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->manager_name,
            $user->manager_email,
            $user->manager_mobile,
            $CreatedAtFormat,
            $UpdatedAtFormat
        ];
    }
    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Manager Name',
            'Manager Email',
            'Manager Mobile',
            'Created At',
            'Updated At'
        ];
    }
}
