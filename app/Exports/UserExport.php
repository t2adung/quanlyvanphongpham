<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view()
    {
        $data = [];
        return view('exports.user', [
            'data' => $data,
        ]);
    }
}
