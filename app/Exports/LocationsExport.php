<?php

namespace App\Exports;

use App\Models\Country;
use App\Models\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class LocationsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{


    public function collection()
    {
        $request = Request::all();
        return Location::getRecord($request);
    }
    protected $index = 0;
    public function map($user): array
    {
        $CreatedAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        $UpdatedAtFormat = date('d-m-Y H:i A', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->street_address,
            $user->postal_code,
            $user->city,
            $user->state_provice,
            $user->country_name,
            $CreatedAtFormat,
            $UpdatedAtFormat
        ];
    }
    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Street Address',
            'Postal Code',
            'City',
            'State Provice',
            'Countries Name',
            'Created At',
            'Updated At'
        ];
    }
}
