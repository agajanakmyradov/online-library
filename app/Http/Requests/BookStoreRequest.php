<?php

namespace App\Http\Requests;

use App\Rules\BookYearRule;
use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'book' => 'required|mimes:pdf,docx,epub|max:30000',
            'name' => 'required',
            'description' => 'nullable|string|min:8',
            'image' => 'required|image',
            'language_id' => 'required',
            'year' => [ 'nullable', 'numeric', "lte:" . date('Y')],
            'category_id' => 'required',
            'author' => 'nullable|string|min:3'
        ];
    }
}
