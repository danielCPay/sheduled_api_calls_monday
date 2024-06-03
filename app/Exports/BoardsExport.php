<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BoardsExport implements FromArray, WithHeadings, WithStyles
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function array(): array
    {
        foreach ($this->data as $items) {
            $newrecords[] = array(
                "item_id" => $items->item_id,
                "status" => $items->status,
                "text4" => $items->text4,
                "person" => $items->person,
                "text7" => $items->text7,
                "text9" => $items->text9,
                "location" => $items->location,
                "date4" => $items->date4,
                "date_1" => $items->date_1,
                "files" => $items->files
            );
        }

        return [$newrecords];
    }
    public function headings(): array
    {
        return [
            'item_id',
            'status',
            'text4',
            'person',
            'text7',
            'text9',
            'location',
            'date4',
            'date_1',
            'files'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]]
        ];
    }
}
