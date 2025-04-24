<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = ['resume_file', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
