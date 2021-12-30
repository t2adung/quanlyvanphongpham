<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductExport implements FromView, ShouldAutoSize
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('report.inc.product', [
            'data' => $this->data
        ]);
    }

    // public function columnWidths(): array
    /*{
        return [
            'A' => 5,
            'B' => 5, 
            'C' => 10,
            'D' => 15,
            'E' => 10,
            'F' => 20,
            'G' => 20,
            'H' => 5,
            'I' => 5,
            'J' => 5,
        ];
    }*/

}
