<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyResume extends Model
{
    use HasFactory;

    protected $table = 'company_resumes';

    protected $fillable = [
        'company_id',
        'resume_id',
        'status_id',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
