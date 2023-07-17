<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->hasMany(Company::class, 'type_of_employment_id', 'id');
    }

    public function resume()
    {
        return $this->hasMany(Resume::class, 'type_of_employment_id', 'id');
    }

}
