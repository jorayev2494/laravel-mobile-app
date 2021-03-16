<?php

namespace App\Http\Requests\Address;

use App\Services\Base\AppGuardInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::guard(AppGuardInterface::USER_GUARD)->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if ($this->method() == "POST") {
            return [
                "name" => "required|unique:addresses,name|max:50",
                "city" => "required|string|max:100",
                "address_street" => " required_unless:address_lane,|string|max:150",
                "address_lane" => "required_unless:address_street,|string|max:150",
                "postal_code" => "nullable|integer|digits_between:4,8",
                "phone_number" => "required|string|max:15"
            ];
        } else {
            return [
                "name" => "required|unique:addresses,name,{$this->address},id|max:50",
                "city" => "required|string|max:100",
                "address_street" => "required_unless:address_lane,|string|max:150",
                "address_lane" => "required_unless:address_street,|string|max:150",
                "postal_code" => "nullable|integer|digits_between:4,8",
                "phone_number" => "required|string|max:15"
            ];
        }
    }
}
