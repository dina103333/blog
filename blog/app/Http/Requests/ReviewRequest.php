<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReviewRequest extends FormRequest
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
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ];
    }
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['errors'=>['message'=>$validator->errors(), 'status'=>false]]));
    }
}
