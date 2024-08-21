<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportinternship extends Model
{
    use HasFactory;

    public function crearedbyname1()
    {
        return $this->belongsTo(User::class,'assigned_to ');
    //    return $this->$this->hasOne('worksinstutions','user_id');
    }
    public function assignedtoname()
    {
        return $this->belongsTo(User::class,'user_id');
    //    return $this->$this->hasOne('worksinstutions','user_id');
    }
}
