<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $primaryKey = 'book_id';
    public $incrementing = false;

    protected $fillable = [
        'book_id', 'book_title', 'author_name', 'publisher', 'publication_day'
    ];

    public static function insertBook($request) 
    {
        try {
            $book_id = $request->input('book_id');
            $book = Book::find($book_id);
            $publication_day = $request->input('year') . '-' . $request->input('month') . '-' . $request->input('day');
            if (empty($book)) {
                $successed = Book::insert([
                    'book_id' => $request->input('book_id'),
                    'book_title' => $request->input('book_title'),
                    'author_name' => $request->input('author_name'),
                    'publisher' => $request->input('publisher'),
                    'publication_day' => $publication_day
                ]);
            }
            return $successed;
        } catch (QueryException $e) {
            return "error_system";
        }
    }

    public static function editBookById($request) 
    {
        try {
            $book_id = $request->input('book_id');
            $book = Book::find($book_id);
            $publication_day = $request->input('year') . '-' . $request->input('month') . '-' . $request->input('day');
            if ($book) {
                $book->book_title = $request->input('book_title');
                $book->author_name = $request->input('author_name');
                $book->publisher = $request->input('publisher');
                $book->publication_day = $publication_day;
                $book->save();
                return true;
            } else {
                return false;
            }
        } catch (QueryException $e) {
            return "error_system";
        }
    }

    public static function searchBookById($bookid) 
    {
        try {
            $book = Book::find($bookid);
            if ($book) {
                return $book;
            } else {
                return false;
            }
        } catch (QueryException $e) {
            return "error_system";
        }
    }

    public static function deleteBookById($bookid) 
    {
        try {
            $book = Book::find($bookid);
            if ($book) {
                $book->delete();
                return true;
            } else {
                return false;
            }
        } catch (QueryException $e) {
            return "error_system";
        }
    }
}
