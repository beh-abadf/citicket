<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AtLeastOneCheckboxRequired implements Rule
{
    public function passes($attribute, $value)
    {
        return is_array($value) && count(array_filter($value)) > 0;
    }
    public function message()
    {
        return " حداقل یک گزینه زا انتخاب کنید .";
    }
}
