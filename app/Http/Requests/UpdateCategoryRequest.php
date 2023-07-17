<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends CategoryRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules["name"] = ["required", "string","unique:categories,name," .$this->id];

        return $rules;

    }
}
