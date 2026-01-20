<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        /**
         * Specific validation for login requests.
         * uses is('{*}/login') method (the wildcard * search) to match any route ending in /login, removing the dependency on named routes in api.php.
         */
        if ($this->is('*/login')) {
            return [
                'email' => 'required|email',
                'password' => 'required',
            ];
        }

        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
