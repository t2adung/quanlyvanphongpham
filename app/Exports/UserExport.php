<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\UserSheetExport;

class UserExport implements WithMultipleSheets
{
    use Exportable;
    
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        if (!empty($this->data['department_products'])) {
            $sheets_data = [
                'data' => $this->data['department_products'],
                'products' => $this->data['dept_products_arr'],
                'descriptions' => $this->data['descriptions'],
                'users' => $this->data['users'],
                'is_department' => true,
            ];

            $sheets[] = new UserSheetExport($sheets_data);
        }
        if (!empty($this->data['personal_products'])) {
            $sheets_data = [
                'data' => $this->data['personal_products'],
                'products' => $this->data['per_products_arr'],
                'descriptions' => $this->data['descriptions'],
                'users' => $this->data['users'],
                'is_department' => false,
            ];

            $sheets[] = new UserSheetExport($sheets_data);
        }
    
        return $sheets;
    }
}