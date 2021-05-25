<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements Rule

{
    /**
     * Determine if the validation rule passes.
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)

    {
        return Hash::check($value, auth()->user()->password);
    }

    /**
     * Get the validation error message.
     * @return string
     */

    public function message()
    {
        if (lang() == 'ar') {
            return 'حقل :attribute غير صحيح.';
        } else {
            return 'The :attribute doesn\'t match with old password.';
        }
    }
}
