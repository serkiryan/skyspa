<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use App\History;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class HistoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = Auth::user();
        $query = DB::raw("(CASE WHEN result='1' THEN 'Успешно' ELSE 'Ошибка' END) as result");
        return History::select('created_at', 'action', $query)->where('user_id', $user->id)->get();
    }
}
