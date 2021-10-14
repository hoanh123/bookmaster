<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $book = $this->searchBook($request);
            $date = explode( '-', $book['publication_day'] );
            $book['year'] = $date[0];
            $book['month'] = $date[1];
            $book['day'] = $date[2];
            return view('layout/booklayout', $book);
        }

        if ($request->has('add')) {
            $book = $this->addBook($request);
            return view('layout/booklayout');
        }

        if ($request->has('update')) {
            $book = $this->updateBook($request);
            return view('layout/booklayout');
        }

        if ($request->has('delete')) {
            $book = $this->deleteBook($request);
            return view('layout/booklayout');
        }

        return view('layout/booklayout');
    }

    public function searchBook($request)
    {
        if ($request->has('book_id')) {
            $bookid = $request->input('book_id');
            $book = Book::searchBookById($bookid);
        }
        return $book;
    }

    public function addBook($request)
    {
        if ($request->has('book_id')) {
            $bookid = $request->input('book_id');
            $book = Book::insertBook($request);
        }
        return $book;
    }

    public function updateBook($request)
    {
        if ($request->has('book_id')) {
            $bookid = $request->input('book_id');
            $book = Book::editBookById($request);
        }
        return $book;
    }

    public function deleteBook($request)
    {
        if ($request->has('book_id')) {
            $bookid = $request->input('book_id');
            $book = Book::deleteBookById($bookid);
        }
        return $book;
    }
}
