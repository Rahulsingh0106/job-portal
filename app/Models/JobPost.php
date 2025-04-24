<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPost extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'employer_id', 'status'];

    /**
     * Get the employer that owns the job post.
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
