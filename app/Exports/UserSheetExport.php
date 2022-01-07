<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserSheetExport implements FromView, WithStyles, ShouldAutoSize, WithTitle
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('export.excel.user', [
            'data' => $this->data
        ]);
    }

    public function styles(Worksheet $sheet) 
    {
        $sheet->getPageSetup()->setPaperSize(1);
        $sheet->getPageSetup()->setFitToWidth(1);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        foreach ($sheet->getColumnDimensions() as $key => $column) {
            $sheet->getColumnDimension($key)->setAutoSize(false);
            $sheet->getColumnDimension($key)->setWidth(10);
        }
        $sheet->getStyle("A1:$highestColumn$highestRow")->getFont()->setName('Times New Roman');
        $sheet->getStyle("A1:$highestColumn$highestRow")->getFont()->setSize(13);
        $sheet->getStyle("A1:$highestColumn$highestRow")->getAlignment()->setWrapText(true);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        if ($this->data['is_department']) {
            return "Văn phòng phẩm dùng chung";
        } else {
            return "Văn phòng phẩm dùng riêng";
        }
    }
}