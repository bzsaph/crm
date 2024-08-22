<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['client_id', 'complaint_text', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
