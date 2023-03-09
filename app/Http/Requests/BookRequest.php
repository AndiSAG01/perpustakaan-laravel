<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|min:3',
            'isbn' => 'required|digits_between:10,13|integer|unique:books,isbn',
            'category_id'=> 'required|integer',
            'author' => 'string|required|min:3',
            'publisher' => 'min:3|required',
            'publicationYear' => 'Integer|required',
            'stock' => 'min:1|required|integer',
        ];
    }
}
