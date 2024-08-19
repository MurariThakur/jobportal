<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class createJob extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function jobType()
    {
        return $this->belongsTo(jobType::class, 'job_type_id');
    }

    public function applications()
    {
        return $this->hasMany(jobApplication::class, 'create_job_id');
    }

    public function SavedJob()
    {
        return $this->hasMany(SavedJob::class, 'create_job_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
