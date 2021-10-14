<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $primaryKey = 'book_id';
    public $incrementing = false;
    // public $timestamps = true;

    public static function insertBook($request) 
    {
        try {
            $bookid = $request->input('book_id');
            $book_id = Book::find($bookid);
            $publication_day = $request->input('year') . '-' . $request->input('month') . '-' . $request->input('day');
            if (!$book_id) {
                $successed = Book::insert([
                    'book_id' => $request->input('book_id'),
                    'book_title' => $request->input('book_title'),
                    'author_name' => $request->input('author_name'),
                    'publisher' => $request->input('publisher'),
                    'publication_day' => $publication_day
                ]);
            }
            return $successed;
        } catch (ModelNotFoundException $e) {
            return $e->getMessage();
        }
    }

    public static function editBookById($request) 
    {
        try {
            $bookid = $request->input('book_id');
            $book = Book::find($bookid);
            $publication_day = $request->input('year') . '-' . $request->input('month') . '-' . $request->input('day');
            if ($book) {
                $book->book_id = $request->input('book_id');
                $book->book_title = $request->input('book_title');
                $book->author_name = $request->input('author_name');
                $book->publisher = $request->input('publisher');
                $book->publication_day = $publication_day;
                $book->save();
                return true;
            }
        } catch (ModelNotFoundException $e) {
            return $e->getMessage();
        }
    }

    public static function searchBookById($bookid) 
    {
        try {
            $book = Book::find($bookid);
            if ($book) {
                return $book;
            }
        } catch (ModelNotFoundException $e) {
            return $e->getMessage();
        }
    }

    public static function deleteBookById($bookid) 
    {
        try {
            $book = Book::find($bookid);
            if ($book) {
                $book->delete();
                return true;
            }
        } catch (ModelNotFoundException $e) {
            return $e->getMessage();
        }
    }
}
