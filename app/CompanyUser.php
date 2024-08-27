<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    use HasFactory;
    // Many-to-Many relationship with Company
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_users', 'user_id', 'company_id');
    }

}
