<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255'], 
            'cedula' => ['required'], 
            'address' => ['required'],
            'phone' => ['required'], 
            'sexo' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            if($validator->errors()->count()){
                if(!in_array($this->method(),['PUT', 'PATCH'])){
                    $validator->errors()->add('post', true);
                }
            }
        });
    }

}
