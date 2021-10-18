<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BookDayRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = '/\b(0?[1-9]|[12]\d|3[01])\b/';
        if (preg_match($pattern, $value)){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Giá trị :attribute đã nhập không đúng định dạng!';
    }
}
