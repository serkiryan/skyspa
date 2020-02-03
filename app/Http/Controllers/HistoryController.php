<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\History;
use App\Exports\HistoryExport;
use Maatwebsite\Excel\Facades\Excel;

class HistoryController extends Controller
{
    public function index() {
        $user = Auth::user();
        $history = History::where('user_id', $user->id)->paginate(5);
        return view('history.index', ['user' => $user, 'history' => $history]);
    }

    public function export() 
    {
        return Excel::download(new HistoryExport, 'users.xlsx');
    }
}
