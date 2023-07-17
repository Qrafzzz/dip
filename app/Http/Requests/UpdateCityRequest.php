<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends CityRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules["name"] = ["required", "string","unique:cities,name," .$this->id];

        return $rules;

    }
}
