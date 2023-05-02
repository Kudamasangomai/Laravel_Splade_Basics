<?php

namespace App\Http\Requests;

use ProtoneMedia\Splade\Components\Form;
use Illuminate\Foundation\Http\FormRequest;

class studentformrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email'=>'required|unique:students,email',
            'age' => 'int',
            'phone'=>'required',
        ];
    }
}
