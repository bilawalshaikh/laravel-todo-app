<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;
class StoreTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [ 
    'title' => ['required','min:5',new Uppercase],
    'description' => 'required'            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Ensure the title field is filled.',
            'title.min' => 'Ensure the title field contains a minimum of 5 characters.',
            'title.uppercase' => 'The title must be in uppercase letters.'
        ];
    
    }

}
