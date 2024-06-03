<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Exports\BoardsExport;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\Boards;

class BoardsController extends Controller
{
    public function export()
    {
        try {
            $data = Boards::ToListExcelNotGenerated();
            return Excel::download(new BoardsExport($data), 'Boards.xlsx');           
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
