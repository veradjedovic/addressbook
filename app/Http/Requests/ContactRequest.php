<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        if(isset($_FILES['f_upload']) && $_FILES['f_upload']['name'] != false) {
            $this->request->add(['avatar' => str_replace(' ', '_', uniqid() . $_FILES['f_upload']['name'])]);
        }

        return [
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'phone' => 'required|numeric|min:8',
            'email' => 'required|email|unique:contacts',
            'agency_id' => 'required|numeric'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'The First Name field is required!',
            'first_name.min' => 'The First Name field must contain at least 2 characters!',
            'first_name.max' => 'The First Name field must contain a maximum of 255 characters!',
            'last_name.required' => 'The Last Name field is required!',
            'last_name.min' => 'The Last Name field must contain at least 2 characters!',
            'last_name.max' => 'The Last Name field must contain a maximum of 255 characters!',
            'phone.required' => 'The Phone field is required!',
            'phone.numeric' => 'The Phone field must be a numeric!',
            'phone.min' => 'The Phone field must contain at least 8 characters!',
            'email.required' => 'The Email field is required!',
            'email.email' => 'The Email field must be a valid email address!',
            'email.unique' => 'This email already exists!',
            'agency_id.required' => 'The agency field must be selected!',
            'agency_id.numeric' => 'The agency field must be numeric!'
        ];
    }
}
