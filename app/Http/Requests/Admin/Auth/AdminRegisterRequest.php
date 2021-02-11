<?php

namespace App\Http\Requests\Admin\Auth;

use App\Services\Base\AppGuardInterface;
use App\Traits\FormatErrorResponse;
use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
{

    // use FormatErrorResponse;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->guard(AppGuardInterface::ADMIN_GUARD)->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|confirmed'
        ];
    }
}
