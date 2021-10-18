<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\BookRequest;
use Validator;

class BookController extends Controller
{
    public function home(Request $request)
    {
        return view('layout/booklayout');
    }

    public function index(BookRequest $request)
    {
        if ($request->has('search')) {
            $book = $this->searchBook($request);
        }

        if ($request->has('add')) {
            $book = $this->addBook($request);
        }

        if ($request->has('update')) {
            $book = $this->updateBook($request);
        }

        if ($request->has('delete')) {
            $book = $this->deleteBook($request);
        }
        return view('layout/booklayout', $book);
    }

    public function addBook($request)
    {
        $data = array();
        $book_id = $request->input('book_id');
        if ($request->has('book_id')) {
            $book = Book::insertBook($request);
            if($book === true) {
                $data['message'] = "Đã thêm thành công book ID : " . $book_id;
            } else if ($book == false){
                $data['error_book_id'] = 'Thêm book ID : ' . $book_id . 'thất bại';
            } else {
                $data['error_system'] = 'Lỗi hệ thống';
            }
        }
        return $data;
    }

    public function updateBook($request)
    {
        $data = array();
        $book_id = $request->input('book_id');
        if ($request->has('book_id')) {
            $book = Book::editBookById($request);
            if($book === true) {
                $data['message'] = "Đã sửa thành công book ID : " . $book_id;
            } else if ($book == false){
                $data['error_book_id'] = 'Book ID : ' . $book_id . ' truyền vào không chính xác';
            } else {
                $data['error_system'] = 'Lỗi hệ thống';
            }
        }
        return $data;
    }

    public function searchBook($request)
    {
        $data = array();
        $book_id = $request->input('book_id');
        if ($request->has('book_id')) {
            $book = Book::searchBookById($book_id);
            if($book == false) {
                $data['error_book_id'] = 'Không tồn tại book ID : ' . $book_id;
            } else if ($book == "error_system"){
                $data['error_system'] = 'Lỗi hệ thống';
            } else {
                $data = $book;
                $date = explode( '-', $book['publication_day'] );
                $data['year'] = $date[0];
                $data['month'] = $date[1];
                $data['day'] = $date[2];
                $data['message'] = "Đã tìm thấy book ID : " . $book_id;
            }
        }
        return $data;
    }

    public function deleteBook($request)
    {
        $data = array();
        $book_id = $request->input('book_id');
        if ($request->has('book_id')) {
            $book = Book::deleteBookById($book_id);
            if($book === true) {
                $data['message'] = "Đã xóa book ID : " . $book_id . ' thành công';
            } else if ($book == false){
                $data['error_book_id'] = 'Không tồn tại book ID : ' . $book_id;
            } else {
                $data['error_system'] = 'Lỗi hệ thống';
            }
        }
        return $data;
    }
}
