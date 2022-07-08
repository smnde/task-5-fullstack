<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "title" => "string|required",
			"content" => "string|required",
			"image" => "image|file|mimes:jpeg,png,jpg,gif,svg|max:2048",
			"category_id" => "required|integer",
			"user_id" => "integer",
        ];
    }
}
