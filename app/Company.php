<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone', 'logo', 'email', 'website', 'status', 'loged_in_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users', 'company_id', 'user_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'loged_in_id');
    }

}
