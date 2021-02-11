<?php

namespace App\Http\Requests;

use App\Traits\FormatErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

/**
 * Class FormRequest
 * 
 * @package \Illuminate\Foundation\Http\FormRequest
 */
class APIFormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    use FormatErrorResponse;

    // /**
    // * @var bool $oneMessage
    // */
    // private bool $oneMessage = false;

    // protected function returnOneMessage(): void 
    // {
    //     $this->oneMessage = true;
    // }

    // /**
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  */
    // abstract public function authorize(): bool;

    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array
    //  */
    // abstract public function rules(): array;

    /**
     * Handle errors in validation
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
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