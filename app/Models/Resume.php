<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        "profession_id",
        "wage",
        "description",
        "city_id",
        "experience_id",
        "type_of_employment_id",
        "schedule_id",
        "author_id",

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class, 'experience_id', 'id');
    }

    public function resume()
    {
        return $this->belongsToMany(Company::class, 'company_resumes', 'resume_id', 'company_id');
    }

    public function employment()
    {
        return $this->belongsTo(Employment::class, 'type_of_employment_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

}
