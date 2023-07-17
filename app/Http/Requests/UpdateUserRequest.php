<?php

namespace App\Http\Requests;

class UpdateUserRequest extends UserRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules["email"] = ["required", "string","unique:users,email," .$this->id];

        return $rules;
    }
}
