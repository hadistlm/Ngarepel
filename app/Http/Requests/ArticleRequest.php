<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => "required|unique:articles,title|max:255",
            'content' => "required|min:10",
            'file.*' => "image|mimes:jpg,jpeg,png,gif",
            'file' => "max:2048|array",
        ];
    }

    public function messages()
    {
        return[
            'title.required' => "Title is required, Please fill in the blank",
            'title.unique' => "There are same Title in the database",
            'content.required' => "Content is required",
            'content.min' => "Content Must Contain at least 10 character",
            'file.*' => "Only Image files are allowed"
        ];
    }
}
