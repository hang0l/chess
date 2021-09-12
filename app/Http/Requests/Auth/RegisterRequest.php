<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterRequest
 * @package App\Http\Requests\Auth
 *
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $password
 */
class RegisterRequest extends FormRequest
{
    public function rules() {
        return [
            'firstName' => ['required', 'string'],
            'lastName' => ['string'],
            'email' => ['required', 'email', 'unique:player,email'],
            'password' => ['required', 'string'],
        ];
    }
}
