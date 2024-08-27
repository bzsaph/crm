<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Queryclass extends Model
{
    use HasFactory;
     // In User.php model
     public function companies()
     {
         return new CustomBelongsToMany(
             $this->newQuery(),
             Company::query(),
             'company_users',
             'user_id',
             'company_id'
         );
     }
    public function scopeActiveInSameCompanies($query)
    {
        $loggedInUser = Auth::user();

        return $query->where('status', 'active')
            ->whereHas('companies', function ($query) use ($loggedInUser) {
                $query->whereIn('companies.id', $loggedInUser->companies->pluck('id'));
            });
    }
    public function getLoggedInUserCompanies()
    {
        return Auth::user()->companies;
    }
}
