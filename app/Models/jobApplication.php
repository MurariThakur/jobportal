<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobApplication extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->belongsTo(CreateJob::class, 'create_job_id');
    }
}
