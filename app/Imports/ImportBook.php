<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportBook implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'book_id' => $row[0],
            'book_title' => $row[1],
            'author_name' => $row[2],
            'publisher' => $row[3],
            'publication_day' => $row[4],
            'created_at' => $row[5],
            'updated_at' => $row[6],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
