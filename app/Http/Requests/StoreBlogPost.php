<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
        return [
                'username' => 'bail|required|min:2',
                'email' => 'required',
                'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Khare!, Ma bayad bedonim to ki hasti ya na???!!',
            'password.required' => 'Oskol! har khari miad to alan!',
            'email.required' => 'Azizam! aval bro email besaz bad mesl gav bia enja! affarin',
        ];
    }

}

