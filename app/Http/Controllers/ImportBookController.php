<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportBook;
use App\Exports\ExportBook;
use Maatwebsite\Excel\Facades\Excel;

class ImportBookController extends Controller
{
    public function index()
    {
        return view('import');
    }

    public function import()
    {
        Excel::import(new ImportBook, request()->file('file'));

        return back();
    }

    public function export() 
    {
        return Excel::download(new ExportBook, 'book.xlsx');
    }
}
