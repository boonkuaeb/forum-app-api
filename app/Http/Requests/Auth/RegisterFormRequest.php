<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/20/16
 * Time: 16:34
 */

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterFormRequest extends Request
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
        return  [
            'username'=> 'required|unique:users',
            'email'=> 'required|email|unique:users',
            'password'=> 'required',
        ];
    }
}
