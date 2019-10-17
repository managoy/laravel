<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|mimes:jpeg,bmp,png|max:5000',
        ];
    }

    public function data(){
       $data =[
            'name' => $this->get('name'),
            'email' => $this->get('email'),
            'active' => $this->get('active'),
            'company_id' => $this->get('company_id'),
            'image' => $this->get('image'),

        ];

       return $data;
    }
}
