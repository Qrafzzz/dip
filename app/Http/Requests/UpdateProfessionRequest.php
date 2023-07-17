<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfessionRequest extends ProfessionRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules["name"] = ["required", "string","unique:professions,name," .$this->id];
        $rules["category_id"] = ["required", "integer"];

        return $rules;

    }
}
