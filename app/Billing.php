<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reminder;
class Billing extends Model
{
    protected $fillable = ['client_id', 'subscription_type', 'month_year', 'amount', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
    
}
