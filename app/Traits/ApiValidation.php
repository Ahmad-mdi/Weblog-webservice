<?php
namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

trait ApiValidation{
    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'validation errors',
            'data' => $validator->errors(),
        ]));
    }
}
