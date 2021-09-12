<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Auth
 *
 * @property string $email
 * @property string $password
 */
class LoginRequest extends FormRequest
{
    #[ArrayShape(['email' => "string[]", 'password' => "string[]"])]
    public function rules(): array {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }
}
