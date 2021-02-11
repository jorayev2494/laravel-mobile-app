<?php

namespace App\Http\Requests\Test;

use App\Traits\APIFormRequestFailValidation;
use Illuminate\Foundation\Http\FormRequest;

class TestTwooRequest extends FormRequest
{

    use APIFormRequestFailValidation;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // 'test' => 'required|numeric'
        ];
    }
}
