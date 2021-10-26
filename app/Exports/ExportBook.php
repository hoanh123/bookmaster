<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportBook implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::all();
    }

    public function headings(): array
    {
        return [
            'Book_id',
            'Book_title',
            'Author_name',
            'Publisher',
            'Publication_day',
            'Created_at',
            'Updated_at',
        ];
    }
}
