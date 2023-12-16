<?php

namespace App\Http\Requests\Post;

use App\Traits\ApiValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class PostNewRequest extends FormRequest
{
    use ApiValidation;
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
            'title' => 'required|string|max:255',
            'image' => 'required',
            'body' => 'required',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
