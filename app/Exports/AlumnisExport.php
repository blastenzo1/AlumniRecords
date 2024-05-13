<?php

namespace App\Exports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumnisExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Alumni::with(['address', 'educationAttainment'])->get()->map(function ($alumni) {
            return [
                'First Name' => $alumni->first_name,
                'Middle Name' => $alumni->middle_name,
                'Last Name' => $alumni->last_name,
                'Birthdate' => $alumni->birthdate->format('Y-m-d'),
                'Sex' => $alumni->sex,
                'Nationality' => $alumni->nationality,
                'Status' => $alumni->status,
                'Spouse' => $alumni->spouse,
                'Number' => $alumni->number,
                'Email' => $alumni->email,
                'Current Street' => optional($alumni->address)->current_street,
                'Current City' => optional($alumni->address)->current_city,
                'Current Country' => optional($alumni->address)->current_country,
                'Current ZIP Code' => optional($alumni->address)->current_zip_code,
                'Home Street' => optional($alumni->address)->home_street,
                'Home City' => optional($alumni->address)->home_city,
                'Home Country' => optional($alumni->address)->home_country,
                'Home ZIP Code' => optional($alumni->address)->home_zip_code,
                'Course/Degree' => optional($alumni->educationAttainment)->course,
                'Year Attended/Graduated' => optional($alumni->educationAttainment)->year_attended,
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'First Name',
            'Middle Name',
            'Last Name',
            'Birthdate',
            'Sex',
            'Nationality',
            'Status',
            'Spouse',
            'Number',
            'Email',
            'Current Street',
            'Current City',
            'Current Country',
            'Current ZIP Code',
            'Home Street',
            'Home City',
            'Home Country',
            'Home ZIP Code',
            'Course/Degree',
            'Year Attended/Graduated',
        ];
    }
}
