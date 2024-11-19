<?php

namespace App;

use App\Reminder;
use App\Complaint;
use App\Report;
use App\Task;
use App\Billing;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    'name' ,
    'email' ,
    'phone',
    'managed_by',
    'status',
    'client_type', // Validate client_type
    'tinnumber', // Validate client_type
    'address', // Validate client_type
<<<<<<< HEAD
    'logged_in_id',
    'user_id',
    'company_id',
    
=======
>>>>>>> 315a78127a370bed81974f1bb8d45a9a5d03a286
];
    public function billings()
    {
        
        return $this->hasMany(Billing::class);
    }

    public function reminders()
    {
        
        return $this->hasMany(Reminder::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    // Client.php


}
