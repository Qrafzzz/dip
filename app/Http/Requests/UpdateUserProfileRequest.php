<?php

namespace App\Http\Requests;

class UpdateUserProfileRequest extends UserRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules["email"] = ["required", "string","unique:users,email," .$this->id];
        $rules["role_id"] = ["required" .$this->id];
        $rules["gender_id"] = ["required"];
        $rules["image"] = ["nullable", "image"];


        return $rules;
    }
}
