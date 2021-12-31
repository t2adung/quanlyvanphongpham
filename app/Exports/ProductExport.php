<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductExport implements FromView, WithColumnWidths, WithStyles, ShouldAutoSize
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        if (!empty($this->data['export_pdf'])) {
            return view('export.pdf.product', [
                'data' => $this->data
            ]);
        } else {
            return view('export.excel.product', [
                'data' => $this->data
            ]);
        }
        
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 5, 
            'C' => 10,
            'D' => 20,
            'E' => 15,
            'F' => 25,
            'G' => 25,
            'H' => 5,
            'I' => 5,
            'J' => 5,
        ];
    }

    public function styles(Worksheet $sheet) 
    {
        $highestRow = $sheet->getHighestRow();
        $sheet->getStyle("A1:I$highestRow")->getFont()->setName('Times New Roman');
        $sheet->getStyle("A1:I$highestRow")->getFont()->setSize(13);

        $sheet->getRowDimension($highestRow)->setRowHeight(20);

        $sheet->getStyle("A1:I$highestRow")->getAlignment()->setWrapText(true);
    }
}
