<?php

namespace App\Http\Requests;

use App\Services\Base\AppGuard;
use Illuminate\Foundation\Http\FormRequest;

class AccountPasswordChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return AppGuard::getAuthCheck();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required|string|password',
            'password' => 'required|string|confirmed'
        ];
    }
}
