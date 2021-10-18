<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\BookMonthRule;
use App\Rules\BookDayRule;
use App\Rules\BookYearRule;
use App\Rules\BookIdRule;
use Illuminate\Contracts\Validation\Rule;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(\Request::input('search')== 'search' || \Request::input('delete')== 'delete'){
            $data = [
                'book_id'=>['required', 'integer'],
            ];
        } else if(\Request::input('add') == 'add'){
            $data = [
                'book_id'=>'required|integer|unique:book',
                'book_title'=>'required|max:255',
                'author_name'=>'required|max:255',
                'publisher'=>'required|max:500',
                'year'=> ['required', 'regex:/\b(\d{4})\b/'],
                'month'=>['required', 'regex:/\b(0?[1-9]|1[012])\b/'],
                'day'=>['required', new BookDayRule],
            ];
        } else {
            $data = [
                'book_id'=>'required|integer',
                'book_title'=>'required|max:255',
                'author_name'=>'required|max:255',
                'publisher'=>'required|max:500',
                'year'=> ['required', 'regex:/\b(\d{4})\b/'],
                'month'=>['required', 'regex:/\b(0?[1-9]|1[012])\b/'],
                'day'=>['required', new BookDayRule],
            ];
        }
        return $data;
    }

    public function messages()
    {
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được quá :max ký tự',
            'integer' => ':attribute chỉ được nhập số',
            'unique' => ':attribute đã tồn tại',
            'regex' => ':attribute đã nhập không đúng định dạng'
        ];
    }

    public function attributes()
    {
        return [
            'book_id' => 'Book ID',
            'book_title' => 'Book Title',
            'author_name' => 'Author Name',
            'publisher' => 'Publisher',
            'year' => 'Year',
            'month' => 'Month',
            'day' => 'Day',
        ];
    }
}
