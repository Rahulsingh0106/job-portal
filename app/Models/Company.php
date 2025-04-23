<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_address',
        'company_contact',
        'about',
        'employer_id'
    ];
}
