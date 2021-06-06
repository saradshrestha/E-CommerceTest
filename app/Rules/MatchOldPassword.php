<?php

  

namespace App\Rules;

  

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Support\Facades\Hash;
use Auth;

  

class MatchOldPassword implements Rule

{

    /**

     * Determine if the validation rule passes.

     *

     * @param  string  $attribute

     * @param  mixed  $value

     * @return bool

     */

    public function passes($attribute, $value)

    {
        if(Auth::guard('admin')->check ()){
            return Hash::check($value, Auth::guard('admin')->user()->password);
        }
        else { 
            return Hash::check($value, Auth::guard('web')->user()->password);
        }
        

    }

   

    /**

     * Get the validation error message.

     *

     * @return string

     */

    public function message()

    {

        return 'The :attribute is match with old password.';

    }

}
