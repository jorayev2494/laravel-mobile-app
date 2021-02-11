<?php

namespace App\Http\Requests;

use App\Services\Base\AppGuard;
use App\Services\Base\AppGuardInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
{
    /**
    * @var Model $authAccount
    */
    private Model $authAccount;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $this->authAccount = auth()->guard(AppGuard::getAuthGuard())->user();
        return auth()->guard(AppGuard::getAuthGuard())->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|alpha|string|max:50',
            'last_name' => 'required|alpha|string|max:50',
            'email' => "email|unique:{$this->authAccount->getTable()},email,{$this->authAccount->id},id",
            'phone' => "string|unique:{$this->authAccount->getTable()},phone,{$this->authAccount->id},id",
            'avatar' => 'file|mimetypes:image/*',
        ];
    }
}
