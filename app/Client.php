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
    protected $fillable = ['name', 'email', 'phone'];

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
