<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = ['client_id', 'billing_id', 'reminder_date', 'email_sent'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }
}
