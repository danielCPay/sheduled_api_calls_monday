<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{
    public static function ToListExcelNotGenerated(): array
    {
        $res = DB::select("CALL sp_excel_list_not_generated()");
        return $res;
    }
}
