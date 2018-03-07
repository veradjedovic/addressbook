<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgencyRequest extends FormRequest
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
            'agency_name' => 'required|min:2|max:255',
            'address' => 'required|min:2|max:255',
            'phone' => 'required|numeric|min:8',
            'email' => 'required|email|unique:agencies',
            'city_id' => 'required|numeric'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'agency_name.required' => 'The Agency Name field is required!',
            'agency_name.min' => 'The Agency Name field must contain at least 2 characters!',
            'agency_name.max' => 'The Agency Name field must contain a maximum of 2 characters!',
            'address.required' => 'The Address field is required!',
            'address.min' => 'The Address field must contain at least 2 characters!',
            'address.max' => 'The Address field must contain a maximum of 255 characters!',
            'phone.required' => 'The Phone field is required!',
            'phone.numeric' => 'The Phone field must be a numeric!',
            'phone.min' => 'The Phone field must contain at least 8 characters!',
            'email.required' => 'The Email field is required!',
            'email.email' => 'The Email field must be a valid email address!',
            'email.unique' => 'This email already exists!',
            'city_id.required' => 'The city field must be selected!',
            'city_id.numeric' => 'The city field must be numeric!'
        ];
    }
}
