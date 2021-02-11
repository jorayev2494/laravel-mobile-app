<?php

namespace App\Traits;

use App\Traits\FormatErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

/**
 * Class FormRequest
 * 
 * @package \Illuminate\Foundation\Http\FormRequest
 */
trait APIFormRequestFailValidation
{
    use FormatErrorResponse;

    /**
     * Handle errors in validation
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws HttpResponseException
     */
    public function failedValidation(Validator $validator): void
    {
        $errors = null;
        if ($this->oneMessage) {
            $errors = $validator->errors()->first();
        } else {
            $errors = $validator->errors();
        }
        throw new HttpResponseException(response($this->errorResponse($errors), Response::HTTP_BAD_REQUEST));
    }
}