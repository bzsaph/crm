<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'client_id',
        'complaint_text',
        'status',
        'loged_in_id', // Include this if you want to fill this field
    ];

    public function client()
{
    return $this->belongsTo(Client::class);
}

    public function user() // If you need a relationship with the user
    {
        return $this->belongsTo(User::class, 'loged_in_id');
    }
}
