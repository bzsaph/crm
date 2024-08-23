<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['client_id', 'report_content'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
