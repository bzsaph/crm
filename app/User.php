<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function passwordattribute($password)
    {

        $this->attribute['password'] = Hash::make($password);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roless()
    {
        return $this->belongsToMany(Role::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }

    // In User.php model
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_users', 'user_id', 'company_id');
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
