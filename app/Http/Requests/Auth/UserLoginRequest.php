<?php

namespace App\Http\Requests\Auth;

use App\Services\Base\AppGuard;
use App\Services\Base\AppGuardInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {

        return auth()->guard(AppGuardInterface::USER_GUARD)->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => "required|email|exists:users,email",
            'password' => 'required|string'
        ];
    }
}
